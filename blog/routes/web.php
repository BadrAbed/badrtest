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
  //  return view('view');
});
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('taskes',function(){
$taskes=DB::table('taskes')->get();
return view('task',compact('taskes'));

});

Route::get('task/{task}',function($id){
$taskes=DB::table('taskes')->find($id);
return view('index',compact('taskes'));

});

Route::get('/mail',['as'=>'mail','uses'=>'LoginController@index']);
Route::POST('/mail',['as'=>'mail','uses'=>'LoginController@mail']);

Route::get('/create','PostController@create');
Route::get('/',['as'=>'view','uses'=>'PostController@show']);
Route::get('/view',['as'=>'viewall','uses'=>'PostController@show']);
Route::POST('/delete',['as'=>'delete','uses'=>'PostController@destroy']);
Route::POST('/edit',['as'=>'edit','uses'=>'PostController@edit']);
Route::POST('/update',['as'=>'update','uses'=>'PostController@update']);
Route::get('/viewpost',['as'=>'viewpost','uses'=>'PostController@showpost']);
Route::POST('/ctreatecomment',['as'=>'createcomment','uses'=>'CommentesController@store']);
Route::POST('/deletecomment',['as'=>'deletecomment','uses'=>'CommentesController@destroy']);
Route::POST('/editcomment',['as'=>'editcomment','uses'=>'CommentesController@edit']);
Route::POST('/updatecomment',['as'=>'updatecomment','uses'=>'CommentesController@update']);

//Route::get('/view','PostController@show');
Route::POST('/post',['as'=>'post','uses'=>'PostController@store']);

Route::get('/login',['as'=>'login','uses'=>'LoginController@create']);
Route::post('/login',['as'=>'login','uses'=>'LoginController@store']);
Route::get('/logout',['as'=>'logout','uses'=>'LoginController@destroy']);
Route::get('/register',['as'=>'register','uses'=>'RgisterController@create']);
Route::post('/register',['as'=>'register','uses'=>'RgisterController@store']);
