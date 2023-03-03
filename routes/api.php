<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Product\GetProductController;
use App\Http\Controllers\Transaction\GetProductCartController;
use App\Http\Controllers\Transaction\AddToCartController;
use App\Http\Controllers\Transaction\CheckoutController;
use App\Http\Controllers\Transaction\CreatePaymentController;
use App\Http\Controllers\Transaction\GetCheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::webhooks('payment-success', 'payment-success');

Route::post('login', [LoginController::class, 'api'])->name('api.login');
Route::get('product', GetProductController::class)->name('api.product');
Route::post('add-to-cart', AddToCartController::class)->name('api.product-cart.store');
Route::get('product-cart', GetProductCartController::class)->name('api.product-cart.list');
Route::post('checkout', CheckoutController::class)->name('api.checkout.store');
Route::get('checkout/{code}', GetCheckoutController::class)->name('api.checkout.index');
Route::post('checkout/{code}/payment', CreatePaymentController::class)->name('api.payment.store');
// Route::get('waiting')
