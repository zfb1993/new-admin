<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);
        $res = Category::create(['name'=>$request->name]);
        if ($res){
            return ['state'=>0,'message'=>'操作成功'];
        }
        return ['state'=>1,'message'=>'操作失败'];
    }

    /**
     * @return mixed
     * http中的page参数自动传入paginate中
     */
    public function lists()
    {
        return Category::paginate(15);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id'   => 'required',
            'name' => 'required|unique:tags|max:255',
        ]);
        $model = Category::find($request->id);
        if ($model){
            $model->name = $request->name;
            $model->save();
            return ['state'=>0,'message'=>'操作成功'];
        }
        return ['state'=>1,'message'=>'操作失败'];
    }
}
