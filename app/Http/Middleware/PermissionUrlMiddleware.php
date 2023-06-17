<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CRUDcontroller;
use App\Models\Page;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Url;

class PermissionUrlMiddleware
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
        // dd($request->all());
        // dd(Page::where('visible',0)->delete());
        // $not = Page::where('url','LIKE','%shipping')->orWhere('url','LIKE','%admincp')->orWhere('url','#')->get()->pluck('id');
        // $all = Page::whereNotIn('id',$not)->get();
        // foreach($all as $update){
        //      $url = 'admincp/'.$update->url  ;
        //      $update->url = $url ;
        //      $update->save();

        // }
        // dd( Page::whereNotIn('id',$not)->get());

        if (Auth::check() || $request->url() == route('admincp')) {
            $string = '';
            if (Auth::check()) {
                $last = request()->segment(count(request()->segments()));

                if (gettype($last) == 'string') {
                    foreach (request()->segments() as $seq) {
                        if (gettype($seq) == 'integer') {
                            abort(403);
                        }
                        $string .= '/' . $seq;
                    }
                    // dd(substr($string, 1));
                    if (sizeof(request()->segments()) > 1) {
                        $page = Page::where('url', substr($string, 1))->first();
                        if (!$page) {
                            $array = [
                                'tb_name' => 'pages',
                                'sql' => [
                                    'url' => substr($string, 1),
                                    'title' => substr($string, 1),
                                    'title_en' => substr($string, 1),
                                    'type' => Auth::user()->type == 'admin' ? null : Auth::user()->type,
                                    'visible' => 0,
                                    'rank' => null,
                                    'created_by' => Auth::id(),

                                ],
                            ];
                            $plusArray = [
                                'check_by' => 'url',
                                'id' => substr($string, 1)
                            ];

                            CRUDcontroller::updateOrCreate($array, null, $plusArray);
                        }

                        // Page::firstOrCreate([
                        //     'url' => substr($string, 1)
                        // ], [
                        // 'title' => substr($string, 1),
                        // 'title_en' => substr($string, 1),
                        // 'type' => Auth::user()->type == 'admin' ? null : Auth::user()->type,
                        // 'visible' => 0,
                        // 'rank' => null,
                        // 'created_by' => Auth::id(),
                        // ]);
                    }
                }
            }
            if (Auth::user()->type == 'admin') {
                return $next($request);
            } else {

                if (Auth::user()->type == 'shipping') {
                    if (request()->segment(1) == 'admincp') {
                        abort(403);
                    }
                    if(Page::where('type','shipping')->where('url',substr($string, 1))->first()){

                            return $next($request);
                    }else{

                        if (request()->segment(1) != 'login' && count(request()->segments()) == 1) {
                            return $next($request);
                        } else {
                            return redirect(RouteServiceProvider::SHIP);
                        }

                        abort(403);
                    }
                    // if (request()->segment(count(request()->segments()))) {
                    //     return $next($request);
                    // }
                }
                if (sizeof(request()->segments()) == 1) {
                }
                return $next($request);
                $name_of_pages =   Auth::user()->permissions()->pluck('name');
                // dd($name_of_pages);

                $get_pages = Page::where(
                    function ($q) {
                        if (sizeof(request()->segments()) == 4) {
                            $q->where('url',request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/' . request()->segment(4));
                        } elseif (sizeof(request()->segments()) == 3) {
                            $q->where('url',request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3));
                        } elseif (sizeof(request()->segments()) == 2) {
                            $q->where('url', request()->segment(1) . '/' .request()->segment(2));
                        }
                    }
                )->whereIn('title', $name_of_pages)->first();
                if ($get_pages) {

                    return $next($request);
                } else {
                    return $next($request);
                    //   return $next($request);
                    abort(403);
                }
            }
        }
        return $next($request);
    }
}
