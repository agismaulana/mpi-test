<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ListTransactionController extends Controller
{
    public function __invoke(Request $request) {
        $current_user = auth('api')->user();
        $transaction = Transaction::query()->with(['detail', 'detail.product', 'latestPayment', 'user'])->where('user_id', $current_user->id)->get();
        if($transaction->isEmpty())
            return $this->sendError(__("Data not found"));

        return $this->sendSuccess([
            'data' => $transaction,
            'message' => __("Transaction list successfully")
        ]);
    }
}
