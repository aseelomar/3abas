<?php

namespace App\Http\Middleware;

use App\Models\Confiq;
use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorMidleware
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
        if($request->ip()== Confiq::getValue('admin_ip','127.0.0.1')){
            return $next($request);

        }
        if($request->ip()== '127.0.0.1'){
            return $next($request);

        }
        try {
            $visitor =  Visitor::where('visitor_ip', $request->ip())->first();
            if ($visitor && $visitor->status == '3') {
                abort(403);
            }elseif(!$visitor){
                Visitor::create(['visitor_ip'=>$request->ip()]);
                return $next($request);
            }else{
                return $next($request);

            }

        } catch (\Throwable $th) {
            abort(403);
            return $th;
        }
    }
}
