<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['web','admin']], function () {
    Route::get('data',['as'=>'data','uses'=> 'userscontroller@anyData']);
    Route::get('search',['as'=>'search','uses'=> 'userscontroller@show']);
    Route::get('/adminpanle',['as'=>'adminpanle','uses'=> 'admin@index']);
    Route::get('user',['as'=>'user','uses'=> 'userscontroller@index']);
      Route::get('adduser',['as'=>'adduser','uses'=> 'userscontroller@create']);
        Route::post('adduser',['as'=>'adduser','uses'=> 'userscontroller@store']);
        Route::get('export',['as'=>'export','uses'=> 'userscontroller@excel']);
        Route::get('deleteuser',['as'=>'deleteuser','uses'=> 'userscontroller@destroy']);
        Route::get('edituser',['as'=>'edituser','uses'=> 'userscontroller@edit']);
        Route::post('edituser',['as'=>'edituser','uses'=> 'userscontroller@update']);
        Route::get('mainsitting',['as'=>'mainsitting','uses'=> 'sitesittingscontroller@index']);
        Route::post('editsite',['as'=>'editsite','uses'=> 'sitesittingscontroller@update']);
        Route::get('viewbu',['as'=>'viewbu','uses'=> 'builldingcontroller@index']);
          Route::get('addbu',['as'=>'addbu','uses'=> 'builldingcontroller@create']);
            Route::post('addbu',['as'=>'addbu','uses'=> 'builldingcontroller@store']);
            Route::get('viewall',['as'=>'viewall','uses'=> 'builldingcontroller@showall']);

});

Route::auth();

Route::get('/home', 'HomeController@index');
