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
Auth::routes();

Route::get('/', 'AppController@index')->name('app');
Route::get('/metrics', 'AppController@index')->name('app');
Route::get('/issues', 'AppController@index')->name('app');
Route::get('/main', 'AppController@index')->name('app');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/api/issues/add', 'IssuesController@add');
Route::get('/api/issues', 'IssuesController@getAll');
