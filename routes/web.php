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

Route::get('/', 'TaskController@index');
Route::get('/tasks', 'TaskController@showAll');
Route::post('/tasks', 'TaskController@store');
Route::post('/tasks/{task}/completed', 'TaskController@setCompleted');
Route::delete('/tasks/{task}', 'TaskController@destroy');