<?php

namespace App\Actions;

use Exception;
use GuzzleHttp\Client;

class AppAction {
    public function sendUrl($data) {
        $header = [
            'Accept' => 'application/json',
            'Authorization' => 'Basic '.$this->base64SecretKey(),
            'Content-Type' => 'application/json'
        ];

        try {
            $client = new Client();
            $response = $client->post(env('MIDTRANS_URL'), [
                "headers" => $header,
                "json" => $data,
            ]);
            $result = json_decode($response->getBody()->getContents());
            return $result;
        } catch (Exception $e) {
            $result = json_decode($e->getMessage());
            return $result;
        }
    }

    public function setMidtransBCA($request) {
        $data = [
            "payment_type" => "bank_transfer",
            "transaction_details" => [
                "order_id" => $request->route('code'),
                "gross_amount" => $request->input('price'),
            ],
            "bank_transfer" => [
                "bank" => "bca",
            ]
        ];

        $data = $this->sendUrl($data);
        return $data;
    }
    public function setMidtransBNI($request) {
        $data = [
            "payment_type" => "bank_transfer",
            "transaction_details" => [
                'order_id' => $request->route('code'),
                'gross_amount' => $request->input('price'),
            ],
            "bank_transfer" => [
                'bank' => "bni",
            ]
        ];

        $data = $this->sendUrl($data);
        return $data;
    }
    public function setMidtransBRI($request) {
        $data = [
            "payment_type" => "bank_transfer",
            "transaction_details" => [
                'order_id' => $request->route('code'),
                'gross_amount' => $request->input('price'),
            ],
            "bank_transfer" => [
                'bank' => "bri",
            ]
        ];

        $data = $this->sendUrl($data);
        return $data;
    }
    public function setMidtransMandiri($request) {
    }
    public function setMidtransPermata($request) {

    }
    public function base64SecretKey() {
        $secret_key = env('MIDTRANS_SERVER_KEY');
        $secret_base64 = base64_encode($secret_key.":");
        return $secret_base64;
    }
}
