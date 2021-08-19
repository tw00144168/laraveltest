<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () { return Redirect('login'); });
Route::get('login', 'LoginController@show');
Route::post('login', 'LoginController@login');

Route::group(['prefix' => 'orders'], function () {
    Route::get('/', 'OrdersController@index');
    Route::get('orderscreate', 'OrdersController@create');
	Route::post('insert', 'OrdersController@insert');
	Route::get('{id}/edit', 'OrdersController@edit');
	Route::post('update', 'OrdersController@update');
    Route::get('{id}/delete', 'OrdersController@delete');
});


Route::group(['prefix' => 'menus'], function () {
    Route::get('{id}/', 'MenusController@index');
    Route::get('{id}/menuscreate', 'MenusController@create');
	Route::post('insert', 'MenusController@insert');
	Route::get('{id}/edit', 'MenusController@edit');
	Route::post('update', 'MenusController@update');
    Route::get('{id}/delete', 'MenusController@delete');
});
