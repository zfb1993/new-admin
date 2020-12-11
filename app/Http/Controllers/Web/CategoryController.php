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
        return Category::create(['name'=>$request->name]);
    }

    /**
     * @return mixed
     * http中的page参数自动传入paginate中
     */
    public function lists()
    {
        return Category::paginate(15);
    }

    public function edit()
    {

    }
}
