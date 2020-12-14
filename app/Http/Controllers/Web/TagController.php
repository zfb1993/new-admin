<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Tag;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);
        $res = Tag::create(['name'=>$request->name]);
        if ($res){
            return ['state'=>0,'message'=>'操作成功'];
        }
        return ['state'=>1,'message'=>'操作失败'];
    }

    public function lists()
    {
        return Tag::paginate(15);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id'   => 'required',
            'name' => 'required|unique:tags|max:255',
        ]);
        $model = Tag::find($request->id);
        if ($model){
            $model->name = $request->name;
            $model->save();
            return ['state'=>0,'message'=>'操作成功'];
        }
        return ['state'=>1,'message'=>'操作失败'];
    }
}
