<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\sellsModel;
use App\Models\preordersModel;
use App\Models\customersModel;
use Llgp\LlgpSdkPhp\LLPayClient;
use Llgp\LlgpSdkPhp\Request\QRPromptPayRequest;
use Llgp\LlgpSdkPhp\Constants\LLPayConstant;
use Llgp\LlgpSdkPhp\Model\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class LianlianController extends Controller
{
    public function paymentPage(Request $request, $type, $order)
    {
        // $rr = 'test';

        $orderdata = '';
        if($type=='sell'){
            $orderdata = sellsModel::find($order); 
            $lasttotal = $orderdata->total;
        }elseif($type=='preorder'){
            $orderdata = preordersModel::find($order);
            $lasttotal = $orderdata->total_price;
        }

        if($orderdata['customers_id']){
            $customer = customersModel::find($orderdata['customers_id']);
        }
        // dd($customer);
        $data = new \stdClass(); // Create an empty object
        // $data->apikey = env('CHILLPAY_API_KEY');
        $data->apikey = 'RJlFW2fmhMTOBWyTNffFhrBCTJPlfUuEL5IpsP7Z8kbucl4PQvPBsDTg5Hk3zlTY';
        $data->merchantid = 'M035329';
        $data->orderno = $orderdata['number'];
        $data->customerid = $orderdata['customers_id'];
        $data->mobileno = $customer->phone;
        $data->clientip = '182.53.98.30';
        $data->routeno = 1;
        $data->currency = "764";
        $data->description = 'test';
        $data->amount = $lasttotal;

        return view('frontend/payment', [
            'default_pagename' => 'ชำระเงิน',
            'data' => $data,
            // 'qrCodeUrl' => $qrCodeUrl,
        ]);
    }
    public function paymentcallbackPage(Request $request)
    {
        $orderNo = $request->orderNo;
        $order_id = null;
        $order_type = "";
        $currentTimestamp = Carbon::now(); // Get the current timestamp
    
        // Search for the order in the sellsModel
        $sellOrder = sellsModel::where('number', $orderNo)->first();
        if ($sellOrder) {
            $order_id = $sellOrder->id;
            $order_type = 'sells';
        } else {
            // If not found in sellsModel, search in the preordersModel
            $preorderOrder = preordersModel::where('number', $orderNo)->first();
            if ($preorderOrder) {
                $order_id = $preorderOrder->id;
                $order_type = 'preorders';
            }
        }
        // Check if the response code and status are as expected
        if ($request->respCode == '0' && $request->status == 'complete') {
            if ($order_type == 'sells') {
                if ($sellOrder) {
                    // Update payment_status and payment_date for sellsModel
                    $sellOrder->update([
                        'status' => 'paid',
                        'payment_status' => 'success',
                        'payment_date' => $currentTimestamp
                    ]);
                    return redirect(route('thankPage', ['sells_id' => $sellOrder->id]))->with('success', 'สร้างสำเร็จ !!!');
                }
            } elseif ($order_type == 'preorders') {
                if ($preorderOrder) {
                    // Update payment_status and payment_date for preordersModel
                    $preorderOrder->update([
                        'status' => 'paid',
                        'payment_status' => 'success',
                        'payment_date' => $currentTimestamp
                    ]);
                    return redirect(route('thankPage', ['preorders_id' => $preorderOrder->id]))->with('success', 'สร้างสำเร็จ !!!');
                }
            }
        }
    }

    public function paymentcallbackPageget(Request $request)
    {
        dd($request);
        return view('frontend/paymenttest', [
            'default_pagename' => 'paymenttest',
        ]);
    }
    public function paymenttestPage(Request $request)
    {
        // dd($request);
        return view('frontend/paymenttest', [
            'default_pagename' => 'paymenttest',
        ]);
    }

    

    public function lianliantest() {
        // Function to recursively sort an array
        function recursiveKsort(&$array) {
            ksort($array);
            foreach ($array as &$value) {
                if (is_array($value)) {
                    recursiveKsort($value);
                }
            }
        }
    
        $data = [
            'Content-Type' => 'application/json',
            'sign-type' => 'RSA',
            'sign' => '', // The sign will be added later
            'service' => 'llpth.checkout.apply',
            'version' => 'v1',
            'merchant_id' => '142024072300753032',
            'store_id' => '',
            'merchant_order_id' => 'ORDER_202301010001',
            'order_amount' => '88.99',
            'order_currency' => 'THB',
            'order_desc' => 'display your order info',
            'notify_url' => url('/callback/notify'),
            'redirect_url' => url('/callback/redirect')
        ];
    
        // Sort the array recursively
        recursiveKsort($data);
    
        // Build the sorted string
        $sortedString = http_build_query($data);
    
        // Load the private key
        $privateKey = '-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQBY3AEHZxQ8tFW34CTQSXwrHvrF20hk1jEhqEZiktmTtqfyHhFi
vJ/rFaJbgdAcOqZWA49C/3Br21aVz/lh90Yl1nAKD9HQmZ2TukVGIkwOUJFEJGT4
8FPpVECmCBs0UtH9nd/Z1YftrMzv85i5ADpPknMpFm8FLzP9h9FXD7nDTXOEyu01
gWDHaxZOL7lWg8EXGHncQXvwRa02K0b6PKKDkGjMUkyLsZEOJEZlTqJgvGoBNTAM
wG1grxeymAL+z1GZw5yxjcJ3dxh2ScRBx+sawTpTHpi9zkEQ2hRCg8VhZc0NNFC3
02rXndSIzg+TjOwEqOMAT58RnXKATu/vC4gzAgMBAAECggEANDifNi2C/CXzFkvY
9rupCGJ9eBfl1LT4TNJrAvVQfvnie2zmRMObq/mb3/FLT7u8E2KmJ/acqBZQLVz7
L3K1u/jpAVDIurH8pFvc6FmxntwEcyp8WLxMZBzKnYi4DCj8FfNZIdjWuHxMOFxN
jbOvkSH9IdF4T3CtOjs+cM7iGf9R/2YDJoIpcZZzPZ7ll1Y4eG+CB9ijwMOxL9hb
vftdvogdKtduAVFdJ/t3bF6ISZILA3y2083yXmaarIANNr5WXy1dBzwCfELv3G+z
FcNVYaxOVKvdW3+Hvvycr7w1iNOcPVxo8KngXf+zvHmYQeNcTUDC/C2yX+ptFXbM
9CQmGQKBgQCeTYV0fB+BVwgWK3r2lpMZx0TQopRXhihahSDSRJIiXUe6zIU4TEkW
IZoT5UXdTSvynUfobQtdCB3IR0Oo4trGWH1bu0mmIZqXY6NAPEh0m+7h+8Y2BEA2
Vke3Wp0r1fb9im/KzPPPx3l9P8cnPrzk5WfmtdEry2K1VKliLC2CjwKBgQCPswVM
01KSgSFwIg3F016qVqBnnpHYvr6qtFPOPvKPWD+g+MxPIFodBdwfXzFiQiLPlSr6
xUNSxXmYFmz0G/+EWisWSt2jseO8LGILQN7iAARPCuLiTpbamJ4hPgKgnCRQMTo/
oKMSzicHK7FP9S56HsnEgwNyw94rZPuAEAdiHQKBgCdeC/Q98e/OXvp0ca3lIEvm
3FwuMknZ2Ss5tEHWP6lAHVh9CBxKDFrunEyaVdeFG4rIRlus0oiePhnSbycO021E
EFjBqL0h2joP00dkNniZVrzoShCg2f8pUchtRmziVvwSc16xvWhMqQ/WzoYZ+gvK
aR5c1NnZSIDjvwPlDKRNAoGAdZrKB6obthNAzojQRMtMepQTCzrXmk/hs8uJmw4h
bfeHe7KjY07S8VXOZU5/GC+QVdt7JWk0RBWiAjq4SMBxSlyRTtlOs53vCB46z4Lz
5nqlDBuYvCYdiCHHqOUbOV8QySDAzzokvEtD3baAkzPSKdfwwYeH1vE+br1ip9h2
cnECgYEAiVdGC2ZZ3+hkK0ZoSh1i9XccuKD453EMguqqEs+69Pfn/aFxBjqz1w8x
5fSr4G9rGW6dbrhZL2Nv60Hs3Ljp1eHkT+hAuvbwmvF6LR9b6ZHYCwbYvY1Dh6ty
EdRdNS9/h4J1oY45byxigpfPjusjSwgb86d7TLMiYxI1e3ab2Hk=
-----END RSA PRIVATE KEY-----';
    
        // Get the private key resource
        $privateKeyResource = openssl_pkey_get_private($privateKey);
    
        if ($privateKeyResource === false) {
            die('Private key loading failed');
        }
    
        // Sign the sorted string using SHA1withRSA
        openssl_sign($sortedString, $signature, $privateKeyResource, OPENSSL_ALGO_SHA1);
    
        // Free the private key resource
        openssl_free_key($privateKeyResource);
    
        // Encode the signature in Base64 format
        $signatureBase64 = base64_encode($signature);
    
        // Ensure the signature is exactly 128 characters
        $signatureBase64128 = substr($signatureBase64, 0, 128);
    
        // Add the generated signature to the data array
        // $data['sign'] = $signatureBase64128;
        $data['sign'] = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApYdbpngru28fjTy3c+Q/pWayAhFhEV/gQacotcBPf0Ayjrwnl8Aguoe6N5/8vWoBovr5H39/Os8t7B2ZgfgTOLWFw6G9xciPdBHq8o66LqsmZeim36Y0qOjfcq36kV7rDStv0ThEwn5A0vfa9bMcQMAOueu5bf66EqR90ea1NqB1+UlxSYEmhxrmkD5N+TtqbLs2xH3MH10bDF92KRKKw7SSTi1HXdj4i5wNY17/qVsSc+RjHRlvygkLCq8u8CyHAVHgqMBgLOKLNP43pd06o67egLVZJMaMycAxS8x0MIvmY7f5GHVZiipl42k/FLoezwpAPhpOZwW0bht8K9bkNQIDAQAB';

        // return strlen('LBLodfpk74T7dr5NllfxYwYmi5nnijmFNCaZE/sMfqDjmUHDH1tTpGtZP7NqlosF6yKJcF+L4tLsmp2+3uV0XV8j7sPLfm+4GctbOKxNQPlMkeqfO7TUSS01PuVAqgpZe4eecXGcgAUi4VQrsgw7AgqrW5mNWw2BrIt1U8jiCgUEwXa+Gbmq36HbLLxIFX4UNOL4Kbb3VEAIah3N48GytNWoh8wG8TKRgJuntMsAijHXxMsV332mPmBivxKSkZLLQgAzJwr9T4UOQb7e5GBE997vZ7zQ+i9ACSMHTVZlLVahAZArxUcjuuwjEV7Zec9v1Po3y86dQc+Ymtlk4PwzBg==');
    
        // Send the POST request with the signed data
        $response = Http::post('https://sandbox-th.lianlianpay-inc.com/gateway', $data);
    
        return $response;
    }

    private $payClient;

    public function __construct()
    {
        $this->payClient = new LLPayClient(env('LIANLIAN_MERCHANT_NO'), env('LIANLIAN_PRIVATE_KEY'), env('LIANLIAN_PUBLIC_KEY'));
    }

    public function processPayment(Request $request)
    {
        $time = date('YmdHis', time());
        $payRequest = new QRPromptPayRequest();
        $payRequest->merchant_id = env('LIANLIAN_MERCHANT_NO');
        $payRequest->service = LLPayConstant::QR_PROMPT_SERVICE;
        $payRequest->version = LLPayConstant::SERVICE_VERSION;
        $payRequest->merchant_order_id = 'P' . $time;
        $payRequest->order_currency = 'THB';
        $payRequest->order_amount = '1.00';
        $payRequest->order_desc = 'test qr-prompt pay order';
        $payRequest->payment_method = LLPayConstant::THAI_QR;
        $payRequest->notify_url = env('LIANLIAN_NOTIFY_URL');
        $payRequest->redirect_url = env('LIANLIAN_NOTIFY_URL');
        $customer = new Customer();
        $customer->full_name = 'Joe.Ye';
        $customer->merchant_user_id = '10086';
        $payRequest->customer = $customer;

        $payRequestJson = json_encode($payRequest);
        file_put_contents("log.txt", "qrPromptPayRequest=$payRequestJson\n", FILE_APPEND);

        $result = $this->payClient->execute($payRequest);

        $resultJson = json_encode($result);
        file_put_contents("log.txt", "result=$resultJson\n", FILE_APPEND);

        if ($result['code'] == 200000 && $result['message'] == 'Success') {
            if ($result['sign_verify'] === true) {
                $qrPromptPayResponse = QRPromptPayResponse::fromMap($result['data']);
                return json_encode($qrPromptPayResponse, JSON_PRETTY_PRINT);
            } else {
                return 'please check the `$lianLianPublicKey` configuration is correct';
            }
        } else {
            return $resultJson;
        }
    }

    public function lianlianqr() {
        return view('frontend.lianlian-qr');
    }

    public function setCookieExample(Request $request)
    {
        $response = response('Cookie Set!');
        $response->cookie('name', 'value', 60); // ตั้งค่า cookie 'name' กับค่า 'value' ใช้งานได้ 60 นาที
        return $response;
    }
}
