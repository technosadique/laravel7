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

Route::get('/', 'Main@login');
Route::get('dashboard', 'Main@dashboard');
Route::get('logout', 'Main@logout');
Route::get('register', 'Main@register');
Route::post('loginuser', 'Main@loginuser');
Route::post('registeruser', 'Main@registeruser');
