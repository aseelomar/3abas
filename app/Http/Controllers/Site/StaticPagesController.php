<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\StaticPages;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{

    public function index($id){
        $information = StaticPages::findOrFail( $id );
        return view('site.pages.staticPage.index')->with(compact('information'));
    }
}
