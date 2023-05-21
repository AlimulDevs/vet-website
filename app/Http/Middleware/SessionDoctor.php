<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('token') == "") {
            return redirect('login-index');
        }

        if ($request->session()->get('role') != "doctor") {
            return redirect('login-index');
        }

        return $next($request);
    }
}
