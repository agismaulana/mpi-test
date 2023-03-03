<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckoutController extends Controller
{
    public function __invoke(Request $request) {
        $transaction = new Transaction();
        $transaction->fill($request->all());
        $transaction->status = 'checkout';
        $transaction->user_id = auth('api')->user()->id;
        $transaction->save();

        foreach($request->input('products') as $product) {
            $transaction_detail = new TransactionDetail();
            $transaction_detail->fill($product);
            $transaction_detail->transaction_id = $transaction->id;
            $transaction_detail->save();
        }

        return $this->sendSuccess([
            'data' => [
                'code' => $transaction->code_transaction,
            ],
            'message' => __("checkout created successfully")
        ], Response::HTTP_CREATED);
    }
}
