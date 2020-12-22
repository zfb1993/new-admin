<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('signDecode')->group(function (){
    Route::post('articles','Api\ArticleController@articleList');
    Route::post('categories','Api\CategoryController@categoryList');
    Route::post('tags','Api\TagController@tagList');

    Route::post('allCategories','Api\CategoryController@allCategories');
    Route::post('allTags','Api\TagController@allTags');
});
