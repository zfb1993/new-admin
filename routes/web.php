<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin');
});
Route::group([

    'prefix' => 'web'

], function ($router) {
    Route::post('register','Web\AuthController@register');
    Route::post('login', 'Web\AuthController@login');
    Route::group(['middleware' => 'api'],function (){
        Route::post('logout', 'Web\AuthController@logout');
        Route::post('refresh', 'Web\AuthController@refresh');
        Route::post('me', 'Web\AuthController@me');
        Route::post('tag_add','Web\TagController@create');
        Route::post('tag_list','Web\TagController@lists');
        Route::post('category_add','Web\CategoryController@create');
        Route::post('category_list','Web\CategoryController@lists');
    });
});
