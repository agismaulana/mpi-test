<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Transaction\CheckoutController;
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
Route::get('/checkout', [PagesController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CheckoutController::class])->name('checkout.post');
