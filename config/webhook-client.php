<?php

use App\Http\Resources\PaymentSuccessResource;
use App\Jobs\processPaymentSuccessJob;
use App\Signature\ProcessSignature;

return [
    'configs' => [
        [
            'name' => 'payment-success',
            'signing_secret' => env('WEBHOOK_CLIENT_SECRET'),
            'signature_header_name' => 'Signature',
            'signature_validator' => ProcessSignature::class,
            'webhook_profile' => \Spatie\WebhookClient\WebhookProfile\ProcessEverythingWebhookProfile::class,
            'webhook_response' => PaymentSuccessResource::class,
            'webhook_model' => \Spatie\WebhookClient\Models\WebhookCall::class,
            'process_webhook_job' => processPaymentSuccessJob::class,
        ],
    ],
];
