<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;

class WaitingPaymentController extends Controller
{
    public function __invoke(Request $request)
    {
        $transaction = Transaction::query()
        ->with(['detail', 'detail.product', 'latestPayment'])
        ->where('code_transaction', $request->route('code'))
        ->first();

        if(empty($transaction))
            return $this->sendError(__("Transaction not found"));

        return $this->sendSuccess([
            'data' => $transaction,
            'message' => __("Waiting Payment successfully")
        ]);
    }
}
