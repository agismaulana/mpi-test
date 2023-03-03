<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Transaction\CheckoutController;
use App\Http\Controllers\Transaction\WebCheckoutController;
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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/login', [PagesController::class, 'login'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'web'])->name('login');
Route::get('/checkout/{code}', [PagesController::class, 'checkout'])->name('checkout');
Route::post('/checkout-store', [WebCheckoutController::class, 'store'])->name('checkout.post');
Route::get('/payment/{code}/waiting', [PagesController::class, 'waiting'])->name('waiting');
