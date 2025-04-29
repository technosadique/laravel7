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

// Route::get('/', function () {
    // return view('welcome');
// });


Route::get('/', 'Person@index');
Route::get('add', 'Person@add');
Route::get('generate_pdf', 'Person@generate_pdf');
Route::get('download_csv', 'Person@generate_csv');
Route::get('edit/{id}', 'Person@edit');
Route::get('delete/{id}', 'Person@delete');
Route::get('view/{id}', 'Person@show');
Route::post('update', 'Person@update');
Route::post('store', 'Person@store');

