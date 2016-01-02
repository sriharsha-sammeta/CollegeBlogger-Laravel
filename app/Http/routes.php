<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::get('/', function () {
    return view('welcome');
});

/*Route::group(['prefix' => 'articles',], function () {
    Route::get('', 'ArticlesController@index');
    Route::get('create', 'ArticlesController@create');
    Route::get('{id}', 'ArticlesController@show')->where(['id' => '[0-9]+'])->name('article_using_id');
    Route::post('', 'ArticlesController@store');
});*/

/*Route::get('articles', 'ArticlesController@index');
Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{id}', 'ArticlesController@show')->where(['id' => '[0-9]+'])->name('article_using_id');
Route::post('articles', 'ArticlesController@store');
Route::get('articles/{id}/edit','ArticlesController@edit');*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('foo',['middleware'=>['web','auth','manager'],function(){
    return "this page may only be viewed by managers";
}]);

Route::group(['middleware' => ['web']], function () {
    Route::resource('articles', 'ArticlesController');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('home', 'HomeController@index');
});
