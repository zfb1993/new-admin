<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Article as ArticleModel;

class Article extends Controller
{
    /**
     * 列表及其搜索
     */
    public function articleList()
    {
        $model = new ArticleModel();
        //搜索条件
        $list = $model->paginate(10);
        return $list;
    }

}
