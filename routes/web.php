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
Route::get('main', 'PageController@index');
Route::get('main/add', 'PageController@add');
Route::post('main/add', 'PageController@create');
Route::get('main/login', 'PageController@login');
Route::post('main/login', 'PageController@login_post');
Route::get('test', 'PageController@test');
