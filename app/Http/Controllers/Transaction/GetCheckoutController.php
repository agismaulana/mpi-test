<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class GetCheckoutController extends Controller
{
    public function __invoke(Request $request) {
        $checkout = Transaction::query()->where('code_transaction', $request->route('code'))->first();
        if(empty($checkout))
            return $this->sendError(__("checkout not found"));

        return $this->sendSuccess([
            'data' => $checkout,
            'message' => __("Get Checkout successfully")
        ]);
    }
}
