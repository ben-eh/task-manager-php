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

// Route::match(['get', 'post'], '/', 'TasksController@index');


Route::get('/', 'TasksController@index');

Route::post('/', 'TasksController@store');

Route::get('/home', 'TasksController@index');

Route::any('/tasks/prioritize/{id}', 'TasksController@prioritize');

Route::resource('tasks', 'TasksController');

Route::any('/tasks/delete/{id}', 'TasksController@destroy');

Route::any('/tasks/finish/{id}', 'TasksController@finish');

Route::any('/tasks/remove', 'TasksController@removeFinished');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
