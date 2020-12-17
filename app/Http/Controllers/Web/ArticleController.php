<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Article;

class ArticleController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
                'title' => 'required|max:255',
                'article' => 'required',
            ]);
        $res =  Article::create([
            'title'=> $request->title,
            'article'=> $request->article,
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id,
        ]);
        if (isset($res['id'])){
            return ['state'=>0,'message'=>'操作成功'];
        }else{
            return ['state'=>1,'message'=>'操作失败'];
        }
    }

    public function lists()
    {
        return Article::paginate(15);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id'   => 'required',
            'title' => 'required|unique:tags|max:255',
            'article' => 'required',
        ]);
        $model = Article::find($request->id);
        if ($model){
            $model->title = $request->title;
            $model->article = $request->article;
            $model->save();
            return ['state'=>0,'message'=>'操作成功'];
        }
        return ['state'=>1,'message'=>'操作失败'];
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id'   => 'required',
        ]);
        $res = Article::where(['id'=>$request->id])->delete();
        if ($res){
            return ['state'=>0,'msg'=>'删除成功'];
        }
        return ['state'=>1,'message'=>'删除失败'];
    }

    public function uploadImg(Request $request)
    {
        $path = $request->file('chatu')->store('articles');
        $file_names = explode('/',$path);
        return array_pop($file_names);
    }

    function browse($file_name){
        return response()->file(storage_path('app/articles/').$file_name);
    }
}
