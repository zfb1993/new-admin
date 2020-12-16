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

    public function uploadImage(Request $request)
    {
        $path = $request->file('chatu')->store('articles');
        $file_names = explode('/',$path);
        return array_pop($file_names);
    }

    function browse($file_name){
        return response()->file(storage_path('app/articles/').$file_name);
    }
}
