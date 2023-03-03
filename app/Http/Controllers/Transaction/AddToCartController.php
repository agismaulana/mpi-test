<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCart;

class AddToCartController extends Controller
{
    public function __invoke(Request $request) {
        $product_cart = new ProductCart();
        $product_cart->fill($request->all());
        $product_cart->user_id = auth('api')->user()->id;
        $product_cart->save();

        return $this->sendSuccess(__("Add to cart successfully"));
    }
}
