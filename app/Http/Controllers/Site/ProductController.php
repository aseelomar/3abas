<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\OrderProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function offerProduct(){
          $featuredProduct=Product::where('featured',1)->with('details')->active()->orderBy('created_at', 'DESC')->paginate(10);
        return view('site.pages.product.offerProduct')->with(compact(['featuredProduct']));
    }
     public function bestSellerProduct(){
         $bestSellerProduct = Product::orderBy('best_seller', 'DESC')->with('details')->active()->paginate(10);
        return view('site.pages.product.bestSellerProduct')->with(compact(['bestSellerProduct']));
    }
    public function featuredProduct(){
        $featuredProduct=Product::where('featured',1)->with('details')->active()->orderBy('created_at', 'DESC')->paginate(10);
        return view('site.pages.product.featuredProduct')->with(compact(['featuredProduct']));
    }
    public function visitorSee(){
        $visitorSee = Product::orderBy('visitor', 'DESC')->with('details')->active()->take(8)->paginate(10);
        return view('site.pages.product.visitorSee')->with(compact(['visitorSee']));
    }
    public function bestSellerThisWeek(){
        $bestSellerThisWeek=OrderProduct::where('created_at','>=',Carbon::today()->subDays(7))
                                        ->whereHas( 'product', function ( $query )  {
                                         $query->active();})
                                        ->selectRaw('order_product.*,sum(count) as  total')
                                        ->groupBy('product_id')
                                        ->orderBy('total','desc')
                                        ->with('product.details')->paginate(10);

        return view('site.pages.product.bestSellerThisWeek')->with(compact(['bestSellerThisWeek']));
    }
    public function syncFavorite(Request $request)
    {

        $request['user_id']=Auth::id();
        $this->validate(
            $request,
            [
                'product_id' => 'required|exists:products,id',
                'user_id' => 'required|exists:users,id'
            ]
        );
        $fav = Favorite::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();
        if($fav){
            $fav->delete();
        }else{
            Favorite::create($request->all());

        }
        return ['message' =>'تم الاضافة الى المفضلة بنجاح', 'code' => 200];
    }
    public function favProduct()
    {
        $array = [];
        if(Auth::user()){
            $array = Auth::user()->fav_product;
        }
        $favs = Product::whereIn('id', $array)->active()->orderBy('created_at', 'DESC')->get();
        return view('site.pages.product.favortieProduct')->with(compact(['favs']));
    }

    public function searchProduct(Request $request){

      $name= $request->search;
        if($name !== null)
        {

        $products = Product::where( function ( $q ) use ( $name ) {
        $q->where( 'product_name_ar', 'like', "%" . $name . "%" )
          ->orWhere( 'product_name_en', 'like', "%" . $name . "%" )
          ->orWhere( 'product_description_en', 'like', "%" . $name . "%" )
          ->orWhere( 'product_description_ar', 'like', "%" . $name . "%" );
          } )->active()->orderBy( 'created_at', 'DESC' )->paginate( 10 );

            return view('site.pages.product.searchProduct')->with(compact(['products']));

        }
        return redirect()->back();

    }

}
