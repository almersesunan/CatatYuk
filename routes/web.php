<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CashflowController;
use App\Http\Controllers\LendingController;
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
Route::get('/profile', [PagesController::class, 'profile']);
Route::get('/feedback', [PagesController::class, 'feedback']);

// Cashflow
Route::get('/cashflow', [CashflowController::class, 'index']);
Route::post('/cashflow', [CashflowController::class, 'store']);
Route::delete('/cashflow/{cashflow}', [CashflowController::class, 'destroy']);
Route::patch('/cashflow/{id}', [CashflowController::class, 'update']);
// Route::resource('cashflow', [CashflowController::class]);

// Stock
Route::get('/stock', [StockController::class, 'index']);
Route::post('/stock', [StockController::class, 'store']);
Route::delete('/stock/{stock}', [StockController::class, 'destroy']);
Route::patch('/stock/{id}', [StockController::class, 'update']);
// Route::resource('stock', [StockController::class]);

// Lending = Payable & Receivable
Route::get('/lending', [LendingController::class, 'index']);

Route::post('/lending/payable', [LendingController::class, 'storePayable']);
Route::post('/lending/receivable', [LendingController::class, 'storeReceivable']);

Route::put('/lending/payable/update/{id}', [LendingController::class, 'updatePayable'])->name('payable-update');
Route::put('/lending/receivable/update/{id}', [LendingController::class, 'updateReceivable'])->name('receivable-update');

Route::delete('/lending/payable/{payable}', [LendingController::class, 'destroyPayable']);
Route::delete('/lending/receivable/{receivable}', [LendingController::class, 'destroyReceivable']);


//changepassword



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
