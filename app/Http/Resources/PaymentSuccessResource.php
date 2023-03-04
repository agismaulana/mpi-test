<?php

namespace App\Http\Resources;

use Spatie\WebhookClient\WebhookConfig;
use Spatie\WebhookClient\WebhookResponse\RespondsToWebhook;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentSuccessResource implements RespondsToWebhook
{
    public function respondToValidWebhook(Request $request, WebhookConfig $config): Response
    {
        return response()->json($request->all());
    }
}
