<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator; // Import Validator class

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        Validator::extend('video', function ($attribute, $value, $parameters, $validator) {
            $allowedExtensions = ['mp4', 'avi', 'mov', 'wmv']; // Add more extensions if needed
            $extension = $value->getClientOriginalExtension();
            return in_array($extension, $allowedExtensions);
        });
    }
}
