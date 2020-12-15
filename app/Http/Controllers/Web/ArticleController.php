<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
            ]);

    }

    public function lists()
    {

    }

    public function edit()
    {

    }
}
