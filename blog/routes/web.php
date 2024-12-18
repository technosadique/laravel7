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

Route::get('/', 'blog@index');
Route::get('create', 'blog@create');
//Route::get('edit/{id}', 'blog@edit');
Route::get('edit/{id}', 'blog@edit')->name('edit');
Route::get('delete/{id}', 'blog@delete')->name('delete');
//Route::get('delete/{id}', 'blog@delete');
Route::post('update', 'blog@update');
Route::post('store', 'blog@store');
