<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Oauth
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (!$request->session()->has('user')) {
            return redirect()->route('oauth');
        }

        return $next($request);
    }
}