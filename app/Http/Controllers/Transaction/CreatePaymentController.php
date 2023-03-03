<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Actions\AppAction;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CreatePaymentController extends Controller
{
    public function __invoke(Request $request, AppAction $action) {
        $transaction = Transaction::where('code_transaction', $request->route('code'))->first();

        $va = [];
        switch($request->input('bank_type')) {
            case 'bca':
                $va = $action->setMidtransBCA($request);
                break;
            case 'bni':
                $va = $action->setMidtransBNI($request);
                break;
            case 'bri':
                $va = $action->setMidtransBRI($request);
                break;
            case 'mandiri':
                $va = $action->setMidtransMandiri($request);
                break;
            case 'permata':
                $va = $action->setMidtransPermata($request);
                break;
        }

        if($va->status_code != 201) {
            return $this->sendError($va->status_message, $va->status_code);
        }

        $payment = new Payment();
        $payment->transaction_id = $transaction->id;
        $payment->virtual_number = $va->va_numbers[0]->va_number;
        $payment->total_price = $va->gross_amount;
        $payment->code_payment = $va->order_id;
        $payment->status = $va->transaction_status;
        $payment->transaction_time = $va->transaction_time;
        $payment->bank_type = $va->va_numbers[0]->bank;
        $payment->save();

        return $this->sendSuccess([
            'data' => [
                'code' => $request->route('code')
            ],
            'message' => __($va->status_message)
        ], $va->status_code);
    }
}
