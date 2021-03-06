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

Route::get('/', function () {
    return view('welcome');
});



/////// for Localization//////////
Route::group(['middleware'=>'Localization'], function(){
	Route::get('locale/{locale}',function($locale){
	    Session::put('locale',$locale);
	    return redirect()->back();
	})->name('switchLan');


});


/////////subscribers//////////
Route::get('/subscribe','Subscribers@show');
Route::post('/subscribe/store','Subscribers@store');
Route::get('admin/subscribers','Subscribers@admin_show');
Route::post('/add-role','Subscribers@send_message');


//////// For sent one mail list///////
Route::get('send/message', function(){
	Mail::to(['test@example.com', 'fatma@test.com' , 'nona@yahoo.com'])->send(new App\Mail\TestMailable('custom message'));
	return 'hello';
});
 
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/posts','PostController@posts');
Route::get('posts/{post}','PostController@post');
Route::post('/posts/store','PostController@store'); // admin
Route::Post('posts/{post}/store','CommentsController@store');
Route::get('category/{name}','PostController@category'); // editor


///////// Manual Auth/////////

//register
Route::get('register','RegistrationController@create');
Route::post('register','RegistrationController@store');
//or use this for one function Route::match(['get','post'],'RegistrationController@store');

//login
Route::get('login','SessionController@create');
Route::Post('login','SessionController@store');

//logout
Route::get('logout','SessionController@destroy');

Route::get('accsess-denied','PostController@accsessDenied');
Route::get('statistics','PostController@statistics');

//users roles 
Route::group(['middleware'=>'roles','roles'=>['Admin']], function()
{
	Route::get('/admin','PostController@admin');
	Route::post('/add-role','PostController@addRole');
	Route::post('settings','PostController@settings');


});
 Route::group(['middleware'=>'roles','roles'=>['Editor','Admin']], function()
{
	Route::get('/editor','PostController@editor');
	

});

 Route::group(['middleware'=>'roles','roles'=>['User']], function()
{
	

});









// Route::get('/admin',
// 	[
// 		"uses"      =>"PostController@admin",
// 		'as'        =>'content.admin',
// 		'middleware'=>'roles',
// 		'roles'     =>['admin']

// 	]);
// Route::post('/add-role',
// 	[
// 		"uses"      =>"PostController@addRole",
// 		'as'        =>'content.admin',
// 		'middleware'=>'roles',
// 		'roles'     =>['admin']

//  	]);

// Route::get('/editor',
// 	[
// 		"uses"      =>"PostController@editor",
// 		'as'        =>'content.editor',
// 		'middleware'=>'roles',
// 		'roles'     =>['admin', 'editor']

// 	]);

