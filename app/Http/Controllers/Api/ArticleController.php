<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Article as ArticleModel;

class ArticleController extends Controller
{
    /**
     * 列表及其搜索
     */
    public function articleList()
    {
        $model = new ArticleModel();
        //搜索条件
        $list = $model->paginate(2);
        return $list;
    }

    /**
     * 归档接口 按年来分
     */
    public function archives()
    {
        $request = request();
        $model =  ArticleModel::query();
        if (isset($request->category_id)){
            $model->where('category_id',$request->category_id);
        }

        if (isset($request->tag_id)){
            $model->whereRaw("JSON_CONTAINS(tag_id,'$request->tag_id')");
        }
        $articles = $model->orderByDesc('created_at')->get();
        //分割形成数组
        $times = [];
        $articles->map(function($item)use(&$times){
            $time = $item->created_at->year;
            $item->date = $item->created_at->month.'/'.$item->created_at->day;
            $times[$time][] = $item;
        });
        return $times;
    }
}
