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

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts/{id}',['as'=>'home.post','uses'=>'HomeController@post']);

Route::group(['middleware'=>'admin'], function(){


    Route::get('/admin', 'AdminController@index');



    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');

    Route::resource('admin/media', 'AdminMediasController');

    Route::delete('admin/delete/media','AdminMediasController@deleteMedia');


    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comment/replies', 'CommentRepliesController');


   // Route::get('admin/media/upload',['as'=>'admin.media.upload', 'uses'=> 'AdminMediasController@store']);

});

Route::group(['middleware'=>'auth'], function(){

Route::post('comment/reply', 'CommentRepliesController@createReply');

});

