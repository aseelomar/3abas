<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Page;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function index()
    {
        $this->setPage();
        $count =   $order= Order::where('is_delete',0)->count();
       $order = Order::where('is_delete',0)->with('status')->orderBy('created_at', 'DESC')->take(5)->get();

  $bestSellerThisWeek=OrderProduct::where('created_at','>=',Carbon::today()->subDays(7))
                                        ->selectRaw('order_product.*,sum(count) as  total')
                                        ->groupBy('product_id')
                                        ->orderBy('total','desc')
                                        ->take(6)
                                        ->with('product')->get();
        $visitorSee = Product::orderBy('visitor', 'DESC')->active()->take(6)->get();
        $bestSellerProduct = Product::orderBy('best_seller', 'DESC')->active()->take(3)->get();
        $totalRevenueThisDay = Order::where('created_at', '>=', Carbon::today())->where('is_delete',0)->where('status_id',Status::STATUS_DELIVERY)->sum('total');
         $totalRevenueThisMonth = Order::where('created_at', '>=',Carbon::now()->subMonth()->toDateTimeString())->where('is_delete',0)->where('status_id',Status::STATUS_DELIVERY)->sum('total');
        return $this->setView('admin.home')->with(compact('count','order','bestSellerThisWeek','visitorSee','bestSellerProduct','totalRevenueThisDay','totalRevenueThisMonth'));
    }

    public function clients()
    {
        $this->setPage();
        $clients = [];

        return $this->setView('admin.clients')->with(compact('clients'));
    }


}
