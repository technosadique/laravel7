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


Route::get('/', 'Task@index');
Route::get('/index', 'Task@index');
Route::get('add', 'Task@add');
Route::get('edit/{id}', 'Task@edit');
Route::get('delete/{id}', 'Task@delete');
Route::post('update', 'Task@update');
Route::post('store', 'Task@store');
Route::post('/task/reorder', 'Task@reorder')->name('task.reorder');


