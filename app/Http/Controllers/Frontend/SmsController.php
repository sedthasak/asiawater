<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\SessionLoginController;
use App\Models\Customer;
use App\Models\Sms_session;

class SmsController extends Controller
{
    public function store($messages, Request $request) {
        // $data = ['messages' => $request->phone.'-'.$request->text.'-'.$request->sim.'--'.'-'];
        // Sms::create($data);
        $return = 'Empty!';
        if (strlen($request->text) == 6 && is_numeric($request->text)) {
            // insert phone to customer
            $phone = $request->phone;
            $qry = Customer::where("phone", $phone)->first();
            if (isset($qry->phone)) {
                $customer_id = $qry->id; 
            }
            else {
                $customer = Customer::create(['phone' => $phone]);
                $customer_id = $customer->id;
            }

            // insert customer_id and browserFingerprint to sms_session
            $browserFingerprint = $request->text;
            $qry2 = Sms_session::where("browserFingerprint", $browserFingerprint)->first();
            if (isset($qry2->browserFingerprint)) {

            }
            else {
                $data2 = [
                    'customer_id'           => $customer_id,
                    'browserFingerprint'    => $browserFingerprint,
                    'messages'              => $browserFingerprint
                ];
                Sms_session::create($data2);
            }
            $return = 'OK';
        }
        return $return;
    }

    public function sendsms(Request $request)
    {
        $phone = '+'.$request->phone; // เบอร์โทรศัพท์ที่ต้องการส่ง SMS
        $message = $request->text; // ข้อความที่ต้องการส่ง

        // ส่ง SMS
        $url = "sms:{$phone}?&body=".urlencode($message);
        return Redirect::to($url);
    }

    public function destroy(Request $request) {
        $browserFingerprint = $request->browserFingerprint;
        Sms_session::where('browserFingerprint', $browserFingerprint)->delete();
        return redirect('/');
    }

    public function destoryall(Request $request) {
        $customer_id = $request->customer_id;
        Sms_session::where('customer_id', $customer_id)->delete();
        return redirect('/');
    }
}