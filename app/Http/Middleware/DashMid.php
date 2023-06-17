<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashMid
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
        if (Auth::check() ) {
            if(Auth::user()->type == 'shipping'){
                return $next($request);


            }
            if (
                Auth::user()->type == 'admin' ||
                Auth::user()->type == 'admin_emp'
            ) {
                return $next($request);
            }
            Auth::logout();
        }

        abort(403);
    }
}
