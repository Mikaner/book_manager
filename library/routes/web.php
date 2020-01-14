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
#main
Route::get('main', 'PageController@index');
Route::get('book', 'BookController@index');

#add
Route::get('add', 'AddController@add');
Route::post('add', 'AddController@test_create');

#remove
Route::get('main/del', 'RemoveController@del');
Route::post('main/del', 'RemoveController@remove');

#search
Route::get('search', 'SearchController@index');

#test
Route::get('test', 'PageController@test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
