<?php

namespace App\Services;

use Llgp\LlgpSdkPhp\Request\LLPayRequest;

class PaymentRequest implements LLPayRequest
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function httpMethod(): string
    {
        return 'POST'; // หรือ 'GET' ตามที่ต้องการ
    }

    public function getRequestData()
    {
        return $this->data;
    }
}
