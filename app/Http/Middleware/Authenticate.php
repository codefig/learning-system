<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        // echo "this is the route";
        if (!$request->expectsJson()) {
            if (Auth::guard('admin')) {
                return 'lecturer/login';
            } else {
                return 'user/login';
            }
        }
    }
}
