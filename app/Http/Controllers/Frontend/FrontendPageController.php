<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
// use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Transactions;

class FrontendPageController extends Controller
{
    public function detailwaterro() {
        return view('frontend.detailwater-ro');
    }

    public function detailwateralkaline() {
        return view('frontend.detailwater-alkaline');
    }

    public function detailwateroxygen() {
        return view('frontend.detailwater-oxygen');
    }

    public function selectpayment() {
        return view('frontend.select-payment');
    }

    public function push() {
        return view('frontend.push');
    }

    public function qrcode() {
        // return dd(Auth::guard('store')->user()->id);
        $orderdata = '';
        // if($type=='sell'){
        //     $orderdata = sellsModel::find($order); 
        //     $lasttotal = $orderdata->total;
        // }elseif($type=='preorder'){
        //     $orderdata = preordersModel::find($order);
        //     $lasttotal = $orderdata->total_price;
        // }
        $lasttotal = 20;

        // if($orderdata['customers_id']){
        //     $customer = customersModel::find($orderdata['customers_id']);
        // }
        // $customer = ["phone" => "0846385566"];
        // $orderdata['number'] = 1;
        // $orderdata['customers_id'] = intval(Auth::guard('store')->user()->id);
        // dd($customer);
        $data = new \stdClass(); // Create an empty object
        // $data->apikey = env('CHILLPAY_API_KEY');
        $data->apikey = 'opqCqCgVZXAeDO8IJmQeMUetKk1BJQPEXKN7oqe4VVa2ka0CgHlmQqd4KCWxoNSN';
        $data->merchantid = 'M035190';
        $data->orderno = 2;
        $data->customerid = Auth::guard('store')->user()->id;
        $data->mobileno = "0846385566";
        $data->clientip = '182.53.98.30';
        $data->routeno = 1;
        $data->currency = "764";
        $data->description = 'test';
        $data->amount = $lasttotal;

        return view('frontend.payment', [
            'default_pagename' => 'ชำระเงิน',
            'data' => $data,
        ]);
    }

    public function callback(Request $request) {
        // $data = [""];
        // Transactions::create();
        // return redirect('thank');

        return $request;


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
                    
                }
            }
        }
    }

    public function chillpaytest() {
        return view('frontend.chillpay-test');
    }

    public function quantity(Request $request) {
        $request->validate([
            'watertype' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // เก็บประเภทน้ำลงใน session
        session(['watertype' => $request->watertype]);
        session(['quantity' => $request->quantity]);

        $store = DB::table('stores')->where('id', Auth::guard('store')->id())->first();
        if (session('watertype') == 'ro') {
            session(['price' => $store->ro * session('quantity')]);
        }
        elseif (session('watertype') == 'alkaline') {
            session(['price' => $store->alkaline * session('quantity')]);
        }
        elseif (session('watertype') == 'oxygen') {
            session(['price' => $store->oxygen * session('quantity')]);
        }
        return redirect('select-payment');
    }
}
