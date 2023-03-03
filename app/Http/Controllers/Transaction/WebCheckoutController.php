<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\ProductCart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WebCheckoutController extends Controller
{
    public function store(Request $request) {
        $current_user = auth('web')->user();
        $transaction = new Transaction();
        $transaction->fill($request->all());
        $transaction->status = 'checkout';
        $transaction->user_id = $current_user->id;
        $transaction->save();

        foreach($request->input('products') as $product) {
            $transaction_detail = new TransactionDetail();
            $transaction_detail->fill($product);
            $transaction_detail->transaction_id = $transaction->id;
            $transaction_detail->save();

            ProductCart::where('product_id', $product['product_id'])
            ->where('user_id', $current_user->id)
            ->first()
            ->delete();
        }

        return redirect(route('checkout', $transaction->code_transaction))->with(['message' => 'Checkout Successfully']);
    }
}
