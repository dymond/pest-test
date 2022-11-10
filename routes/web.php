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

Route::get('/', \App\Http\Controllers\HomeController::class);
Route::get('/auth/register', \App\Http\Controllers\RegisterController::class);
Route::get('/auth/login', \App\Http\Controllers\LoginController::class);
Route::post('/stuffs', \App\Http\Controllers\StuffController::class);
Route::get('/stuff/add', \App\Http\Controllers\StuffCreateController::class);
