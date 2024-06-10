<?php

namespace App\Http\Middleware;
use App\Http\Controllers\LogsController;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {

            // $role_set = [];
            // $role_set['admin'] = array('devider','dashboard','customers','posts','car','cat','tag','news','users','contacts','setting','logs','dev',);
            // $role_set['manager'] = array('devider','dashboard','customers','posts','car','cat','tag','news','contacts','logs',);
            // $role_set['assistance'] = array('devider','dashboard','customers','posts','car','cat','tag',);
            // $role_set['editor'] = array('devider','dashboard','news',);
            // $role_set['marketing'] = array('devider','dashboard','customers',);
        }
        // View::share('role_set', $role_set);
        return $request->expectsJson() ? null : route('backendLogin');
    }
}
