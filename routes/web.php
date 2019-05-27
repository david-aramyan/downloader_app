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

Route::get('/resources', 'ResourcesController@index')->name('resources');
Route::get('/resources/add', 'ResourcesController@create')->name('resources.create');
