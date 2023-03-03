<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\ProductCart;
use Illuminate\Http\Request;

class GetProductCartController extends Controller
{
    public function __invoke(Request $request) {
        $current_user = auth('api')->user();
        $product_cart = ProductCart::query()->with('product');
        if($current_user->role == 'user')
            $product_cart->where('user_id', $current_user->id);

        $result = $product_cart->get();
        return $this->sendSuccess([
            'data' => $result,
            'message' => __("Get Product Cart Successfully")
        ]);
    }
}
