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
Route::get('/addest',['as'=>'addest', 'uses'=>'estebyanscontroller@create']);
Route::get('/deleteest',['as'=>'deleteest', 'uses'=>'estebyanscontroller@destroy']);
Route::post('/addest',['as'=>'addest', 'uses'=>'estebyanscontroller@store']);
Route::get('/addquest',['as'=>'addquest', 'uses'=>'questioncontroller@create']);
Route::post('/addquest',['as'=>'addquest', 'uses'=>'questioncontroller@store']);
Route::get('/addans',['as'=>'addans', 'uses'=>'questanswercontroller@create']);
Route::post('/addans',['as'=>'addans', 'uses'=>'questanswercontroller@store']);
Route::get('/deletequest',['as'=>'deletequest', 'uses'=>'questioncontroller@destroy']);

Route::get('/',['as'=>'/', 'uses'=>'useranswercontroller@index']);
Route::post('/viewest',['as'=>'viewest', 'uses'=>'useranswercontroller@show']);
Route::get('/view',['as'=>'view', 'uses'=>'useranswercontroller@showone']);
//Route::get('/index',['as'=>'index', 'uses'=>'usercontroller@index']);

//Route::get('/userans',['as'=>'userans', 'uses'=>'useranswercontroller@index']);
Route::post('/userans',['as'=>'userans', 'uses'=>'useranswercontroller@store']);


Route::post('/viewres',['as'=>'viewres', 'uses'=>'estebyanscontroller@show']);
Route::auth();
