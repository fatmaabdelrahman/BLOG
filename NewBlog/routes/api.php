<?php

use Illuminate\Http\Request;

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
Route::group(['namespace'=>'Api'],function()
{

	// Route::group(['middleware'=>'auth:api'], function()
	// {
		Route::get('posts','PostController@posts');
		Route::get('posts/{post_id}','PostController@post');
		
		Route::post('add/comment','PostController@add_comment');
		Route::get('/user', function (Request $request) {
		    return $request->user();});

	
	// });
	 
    // ]);
    Route::post('add/post','PostController@add_post');
	Route::post('login','UsersController@login');
	Route::post('register', 'UsersController@register');




});
