<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mainPages = Page::orderBy('rank','asc')->where('parent_id','0')->get();
        $subPages  = Page::orderBy('rank','asc')->where('parent_id','!=','0')->get();

        return view('admin.home')->with(compact('mainPages','subPages'));
    }


}
