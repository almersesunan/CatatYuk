<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CashflowController;

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

// PageRoutes
Route::get('/dashboard', [PagesController::class, 'dashboard']);
Route::get('/cashflow', [CashflowController::class, 'index']);
Route::get('/stock', [PagesController::class, 'stock']);
Route::get('/debt', [PagesController::class, 'debt']);
Route::get('/profile', [PagesController::class, 'profile']);
Route::get('/feedback', [PagesController::class, 'feedback']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
