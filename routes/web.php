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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/inserate', 'InseratController@index')->name('inserate');

Route::get('/inserate/search/{role?}/{subject?}', 'InseratController@search');

// Loggedin Routes
Route::group(['middleware' => 'auth'], function () {

	Route::post('/inserate', 'InseratController@store');

	Route::get('/inserate/create', 'InseratController@create');

	Route::get('/inserate/own', 'InseratController@showOwn')->name('inserate_own');

	Route::get('/inserate/{id}/edit', 'InseratController@edit');

	Route::patch('/inserate/{id}', 'InseratController@update');

	Route::delete('/inserate/{id}', 'InseratController@destroy');

});

Route::get('/inserate/{id}', 'InseratController@show');



