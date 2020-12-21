<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Tag as TagModel;

class Tag extends Controller
{
    public function tagList()
    {
        return TagModel::all();
    }
}
