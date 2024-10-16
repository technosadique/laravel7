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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', 'product@index');
Route::get('add', 'product@add');
Route::get('edit/{id}', 'product@edit');
Route::get('delete/{id}', 'product@delete');
Route::post('update', 'product@update');
Route::post('store', 'product@store');
Route::post('search', 'product@index');
