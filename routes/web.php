<?php

use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [AdController::class, 'index'])->name('welcome');
Route::get('/single-ad/{id}', [AdController::class, 'show'])->name('singleAd');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/add-deposit', [App\Http\Controllers\HomeController::class, 'addDeposit'])->name('home.addDeposit');
Route::post('/home/add-deposit', [App\Http\Controllers\HomeController::class, 'updateDeposit'])->name('home.addDeposit');
Route::get('/home/show-ad-form', [App\Http\Controllers\HomeController::class, 'showAdForm'])->name('home.showAdForm');
Route::post('/home/save-ad', [App\Http\Controllers\HomeController::class, 'saveAd'])->name('home.saveAd');
Route::get('/home/ad/{id}', [App\Http\Controllers\HomeController::class, 'showSingleAd'])->name('home.singleAd');