<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\LogsSaveController;
use App\Models\Sms_session;
use App\Models\Customer;
use App\Models\brandsModel;
use App\Models\contacts_backModel;
use App\Models\noticeModel;
use Illuminate\Support\Facades\View;

class SessionLogin
{

    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $customer_session = $request->session()->get('customer_session');
        // if(isset($customer_session)){
        //     $session = Sms_session::where("customer_session", $customer_session)->first();
        //     if(isset($session)){
        //         $customerdata = Customer::where("id", $session->customer_id)->first();
        //         if(isset($customerdata)){
        //             $request->session()->put('customer', $customerdata);

        //             // $contacts_back = contacts_backModel::where("customer_id", $session->customer_id)->get();
        //             // View::share('contacts_back', $contacts_back);

        //             $notice = noticeModel::orderBy('id', 'desc')
        //             ->where([
        //                 ["customer_id", $session->customer_id],
        //                 ["status", 'create'],
        //             ])
        //             ->get();
        //             View::share('notice', $notice);
        //         }
        //     }
        //     else {
        //         session()->forget('customer_session');
        //         session()->flush();
        //         return redirect('/login');
        //     }
        // }
        // else {
        //     return redirect('/login');
        // }

        // $qrybrand = brandsModel::get();
        // View::share('brand', $qrybrand);

        return $next($request);
    }
}
