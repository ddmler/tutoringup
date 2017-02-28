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

Route::get('/inserate/filter/{art?}/{role?}/{subject?}', 'InseratController@filter');

// Loggedin Routes
Route::group(['middleware' => 'auth'], function () {

	Route::get('/altklausuren/own', 'UploadController@showOwn')->name('upload_own');

	Route::delete('/altklausuren/{id}', 'UploadController@destroy');

	Route::post('/altklausuren', 'UploadController@store');

	Route::get('/altklausuren/create', 'UploadController@create');

	Route::post('/inserate', 'InseratController@store');

	Route::get('/inserate/create', 'InseratController@create');

	Route::get('/inserate/own', 'InseratController@showOwn')->name('inserate_own');

	Route::get('/inserate/{id}/edit', 'InseratController@edit');

	Route::patch('/inserate/{id}', 'InseratController@update');

	Route::delete('/inserate/{id}', 'InseratController@destroy');

});

Route::get('/inserate/{id}', 'InseratController@show');

Route::get('/altklausuren/{subject?}', 'UploadController@index')->name('uploads');

