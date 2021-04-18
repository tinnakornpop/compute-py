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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ComController@index')->name('root');
Route::get('/test', 'ComController@test')->name('test');

Route::get('/form', 'FormController@index')->name('form.index');
Route::post('/form', 'FormController@index')->name('form.index');
Route::get('/form/confirm1', 'FormController@confirm1')->name('form.confirm1');
Route::post('/form/confirm1', 'FormController@confirm1')->name('form.confirm1');
