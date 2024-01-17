<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostProcess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // $customer_idsession = $request->session()->get('customer_id');
        // if (is_null($customer_idsession)) {
        //     $request->session()->put('customer_id', 99);
        //     return redirect(route('loginPage'));
        // } else {
        //     return $next($request);
        // }
        
        return $next($request);
    }

    public function terminate($request, $response) {
        //Your code here 

        // $customer_idsession = $request->session()->get('customer_id');
        // if (is_null($customer_idsession)) {
        //     $request->session()->put('customer_id', 99);
        //     return redirect(route('loginPage'));
        // }
        // return redirect(route('loginPage'));
    }
}
