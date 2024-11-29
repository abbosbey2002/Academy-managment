<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymeService
{
    protected $merchantId;
    protected $secretKey;

    public function __construct()
    {
        $this->merchantId = env('PAYME_MERCHANT_ID');
        $this->secretKey = env('PAYME_SECRET_KEY');
    }

    public function createTransaction($amount, $account)
    {
        $data = [
            'method' => 'receipts.create',
            'params' => [
                'amount' => $amount * 100, // so'mni tiyinga aylantirish
                'account' => [
                    "course_id" => 6,
                    "user_id" => 6
                ],
            ],
        ];
        
        return $this->sendRequest($data);
    }

    protected function sendRequest($data)
    {
        
        $response = Http::withHeaders([
            'X-Auth' => base64_encode($this->merchantId . ':' . $this->secretKey)
        ])->post('https://checkout.test.paycom.uz/api', $data);
        return $response->json();
    }
}
