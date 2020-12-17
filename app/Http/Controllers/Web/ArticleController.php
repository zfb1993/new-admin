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
        return Article::create([
            'title'=> $request->title,
            'content'=> $request->article,
        ]);
    }

    public function lists()
    {

    }

    public function edit()
    {

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
