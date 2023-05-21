<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSessionToken
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('token') == "") {
            return redirect('login-index');
        }

        return $next($request);
    }
}
