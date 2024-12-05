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

Route::get('/', 'Post@index');
Route::get('create', 'Post@create');
Route::get('edit/{id}', 'Post@edit');
Route::get('delete/{id}', 'Post@destroy');
Route::post('update', 'Post@update');
Route::post('store', 'Post@store');

Route::get('/setsession', 'Post@setsession');
Route::get('/getsession', 'Post@getsession');
Route::get('/deletesession', 'Post@deletesession');
Route::get('generate_pdf', 'Post@generate_pdf');
Route::get('generate_csv', 'Post@generate_csv');
Route::get('download_csv', 'Post@download_csv');

