<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\sellsModel;
use App\Models\preordersModel;
use App\Models\customersModel;

use Carbon\Carbon;

class PaymentController extends Controller
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
}
