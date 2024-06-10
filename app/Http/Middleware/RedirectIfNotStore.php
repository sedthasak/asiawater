<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotStore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated as a store
        if (!Auth::guard('store')->check()) {
            // If not authenticated, redirect to login or appropriate route
            // return redirect()->route('store.login'); // Assuming you have a named route for store login
            return view('frontend.login');
        }

        // If authenticated, proceed with the request
        return $next($request);
    }
}
