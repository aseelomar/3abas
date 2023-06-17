<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Slider;
use App\Models\StaticPages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories =Category::where('parent_id',0)->active()->take(8)->get();
        $bestSellerProduct = Product::orderBy('best_seller', 'DESC')->active()->take(3)->get();
        $featuredProduct=Product::where('featured',1)->active()->orderBy('created_at', 'DESC')->take(8)->get();

        $bestSellerThisWeek=OrderProduct::where('created_at','>=',Carbon::today()->subDays(7))
                                         ->whereHas( 'product', function ( $query )  {
                                         $query->active();
                                         })
                                        ->selectRaw('order_product.*,sum(count) as  total')
                                        ->groupBy('product_id')
                                        ->orderBy('total','desc')
                                        ->take(8)
                                        ->with('product')->get();
        $visitorSee = Product::orderBy('visitor', 'DESC')->active()->take(8)->get();
        $idBestSellerProduct = $bestSellerProduct->pluck('id');
        $bestSeller= Product::orderBy('best_seller', 'DESC')->active()->whereNotIn('id',$idBestSellerProduct)->take(8)->get();
        $slider = Slider::where('is_delete', 0)->orderBy('created_at', 'DESC')->take(4)->get();
        $ads= Ads::where('is_visible',1)->orderBy('created_at', 'DESC')->first();
        $staticPage = StaticPages::where('is_visible',1)->where('is_delete',0)->whereNotIn('id',[StaticPages::STATIC_PAGE_CALL_US,StaticPages::STATIC_PAGE_TERMS_SERVICE])->get();
        return  view('site.home.index')->with(compact(['categories','bestSellerProduct','featuredProduct','bestSellerThisWeek','visitorSee','bestSeller','slider','ads','staticPage']));
    }

}
