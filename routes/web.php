<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CashflowController;
use App\Http\Controllers\PayableController;
use App\Http\Controllers\ReceivableController;
use App\Http\Controllers\StockController;

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

Route::get('/debt', [PagesController::class, 'debt']);
Route::get('/profile', [PagesController::class, 'profile']);
Route::get('/feedback', [PagesController::class, 'feedback']);

// Cashflow
Route::get('/cashflow', [CashflowController::class, 'index']);
Route::post('/cashflow', [CashflowController::class, 'store']);
Route::delete('/cashflow/{cashflow}', [CashflowController::class, 'destroy']);

// Stock
Route::get('/stock', [StockController::class, 'index']);
Route::post('/stock', [StockController::class, 'store']);
Route::delete('/stock/{stock}', [StockController::class, 'destroy']);

// Payable 
Route::get('/debt', [PayableController::class, 'index']);
Route::post('/debt', [PayableController::class, 'store']);
Route::delete('/debt/{payable}', [PayableController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
