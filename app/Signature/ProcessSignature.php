<?php

namespace App\Signature;

use Spatie\WebhookClient\WebhookConfig;
use Illuminate\Http\Request;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;

class ProcessSignature implements SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        return true;
    }
}
