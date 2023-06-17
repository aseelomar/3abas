<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
                if (Auth::guard($guard)->check()) {
                    switch (Auth::guard($guard)->user()->type) {
                        case "shipping":

                            return redirect(RouteServiceProvider::SHIP);

                            //Design a page for blocked!
                            break;
                        case 'admin_emp':
                        case "admin":
                        return redirect(RouteServiceProvider::HOME);

                            break;


                        case "inactive":
                            return redirect()->route('error-404');

                            //Design a page for blocked!
                            break;
                    }
                }else{
                    return $next($request);

                    return redirect()->route('login');
                }

    }
}
