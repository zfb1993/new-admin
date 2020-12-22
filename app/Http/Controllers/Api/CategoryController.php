<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Category as CategoryModel;
use App\Model\Article;

class CategoryController extends Controller
{
    //获取文章分类列表和对应的文章数量
    public function categoryList()
    {

    }

    public function allCategories()
    {
        return CategoryModel::all();
    }
}
