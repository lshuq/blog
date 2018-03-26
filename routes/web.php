<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' =>'admin'], function(){
	Route::get('/','HomeController@index');
	Route::resource('/articles','ArticleController');
});

Route::get('article/{id}','ArticleController@show');

Route::post('comment','CommentController@store');

Route::group(['middleware' => 'auth', 'namespace'=>'Admin\Articles','prefix' =>'admin/articles/{c_id}'], function(){
	Route::resource('/comments','CommentController');
	Route::get('/comments','CommentController@show');
});

