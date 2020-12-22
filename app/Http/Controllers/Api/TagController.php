<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Tag as TagModel;

class TagController extends Controller
{
    public function tagList()
    {
        return TagModel::all();
    }

    public function allTags()
    {
        return TagModel::all();
    }
}
