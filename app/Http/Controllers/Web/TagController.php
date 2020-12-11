<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Tag;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);
        return Tag::create(['name'=>$request->name]);
    }

    public function lists()
    {
        return Tag::paginate(15);
    }

    public function edit()
    {

    }
}
