<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class job_customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $access = [
            'admin' =>['customers'],
            'manager' =>[],
            'assistance' =>[],
            'marketing' =>[],
        ];
        $role = auth()->user()->role;

        $request->segment(2);

        

        if(isset($access[$role])){
            if(!in_array($request->segment(2), $access[$role])){
                return redirect(route('backendDashboard'));
            }
            return $next($request);
            // dd($access[$role]);
        }else{
            return redirect(route('backendDashboard'));
        }

        // if(in_array($role, $access)){
        //     return $next($request);
        // }else{
        //     return redirect(route('backendDashboard'));
        // }
        // if(Auth::guard('Member')->check()){
        //     return $next($request);
        // }
        // $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        // $uri_segments = explode('/', $uri_path);
        // $url = '';
        // foreach($uri_segments as $us){
        //     if($us!=''){
        //         $url = "$url/$us";
        //     }
        // }
        // return redirect('/login?url='.$url);
    }
}
























