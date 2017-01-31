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

Route::get('/inserate/{role?}/{subject?}', 'InseratController@list');

Route::get('/inserat/{id}', 'InseratController@view');


// Loggedin Routes
Route::group(['middleware' => 'auth'], function () {

	Route::get('/new_inserat', 'InseratController@createForm');

	Route::post('/new_inserat', 'InseratController@createNew');

	Route::get('/eigene_inserate', 'InseratController@viewOwn');

});
