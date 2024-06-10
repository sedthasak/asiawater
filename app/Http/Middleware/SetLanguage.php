<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    public function handle($request, Closure $next)
    {
        // Check if the language is set in the session
        if (session()->has('locale')) {
            $locale = session('locale');
            // Log the current locale
            \Log::info('Current locale: ' . $locale);
            App::setLocale($locale);
        }

        return $next($request);
    }
}