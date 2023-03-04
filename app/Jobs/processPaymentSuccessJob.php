<?php

namespace App\Jobs;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\ProcessWebhookJob;

class processPaymentSuccessJob extends ProcessWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {

        $data = json_decode($this->webhookCall, true);
        $payload = $data['payload'];

        if($payload['status_code'] == 200 && $payload['transaction_status'] == 'settlement') {
            $transaction = Transaction::where('code_transaction', $payload['order_id'])->first();
            if($payload['fraud_status'] == 'accept') {
                $transaction->status = 'success';
                $transaction->save();
            }

            $payment = Payment::where('virtual_number', $payload['va_numbers'][0]['va_number'])
            ->where('code_payment', $payload['order_id'])
            ->first();

            $payment->status = 'success';
            $payment->save();

            logger($payload['order_id'], $payload);
            http_response_code(200);
            return;
        }

        logger($payload['order_id'], $payload);
        http_response_code(201);
        return;
    }
}
