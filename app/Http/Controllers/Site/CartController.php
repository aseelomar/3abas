<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CouponProduct;
use App\Models\Product;
use App\Models\ProductDetails;
use Carbon\Carbon;
use Carbon\Traits\Serialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;

class CartController extends Controller
{
    public function add( Request $request )
    {


        $request->validate( [
                                'product_id' => 'required|exists:products,id',

                            ] );

        if ( request()->has( 'color_id' ) )
        {
            $request->validate( [
                                    'color_id' => 'required',
                                    'size'     => 'required',

                                ] );
        }
        $product = Product::findOrFail( $request->product_id );

        if(request()->has( 'color_id' ) && $cartProductWithDetails = Cart::where( 'product_id', $request->product_id )->where( function ( $q ) {
                $q->where( 'user_id', Auth::id() )->orWhere( 'ip', \Request::ip() );} )->where('color_id',$request->color_id)->where('size',$request->size)->where( 'status', 0 )->where( 'is_delete', 0 )->first() )
        {


            $productInInventory = ProductDetails::where( 'product_id', $request->product_id )->where( 'color_id', $request->color_id )->where( 'size', $request->size )->first();

            if ( $productInInventory->count - ($cartProductWithDetails->count + 1) >= 0 )
            {
//                      return $productInInventory->count - $cartProduct->count+1 >= 0;

                $array = [
                    'tb_name' => 'carts',
                    'sql'     => [
                        'id'    => $cartProductWithDetails->id,
                        'count' => $cartProductWithDetails->count + 1,
                        'total_price'=>$cartProductWithDetails->product_sale_price * ($cartProductWithDetails->count + 1),
                        'price_before_discount'=>$cartProductWithDetails->product_sale_price * ($cartProductWithDetails->count + 1),
                    ],
                ];

                CRUDcontroller::updateOrCreate( $array );

                return response()->json( [ 'message' => 'تم الاضافة الى السلة بنجاح', ], 200 );

            } else if ( $productInInventory->count - ($cartProductWithDetails->count + 1) < 0  )
            {
                return response()->json( [
                                             'message' => 'لا يوجد قطع اضافة في المخزن',
                                         ], 422 );

            }
          }elseif ($cartProduct = Cart::where( 'product_id', $request->product_id )->where( function ( $q ) {
                $q->where( 'user_id', Auth::id() )->orWhere( 'ip', \Request::ip() );
                 } )->where('color_id',null)->where('size',null)->where( 'status', 0 )->where( 'is_delete', 0 )->first()){



                 $producTInventory = Product::where('id',$request->product_id)->active()->first();
                    if($producTInventory->inventory - ($cartProduct->count+1) >=0)
                    {

                        $array = [
                            'tb_name' => 'carts',
                            'sql'     => [
                                'id'    => $cartProduct->id,
                                'count' => $cartProduct->count + 1,
                                'total_price'=>$cartProduct->product_sale_price * ($cartProduct->count + 1),
                                'price_before_discount'=>$cartProduct->product_sale_price * ($cartProduct->count + 1),

                            ],
                        ];

                        return  CRUDcontroller::updateOrCreate( $array );
                    }
                    elseif($producTInventory->inventory - ($cartProduct->count+1) < 0 )
                    {

                        return response()->json( [
                                                     'message' => 'لا يوجد قطع اضافة في المخزن',
                                                 ], 422 );
                    }

        } else{

              if(Auth::id()){
                  $user_id= Auth::id();
              }else{
                  $ip = $request->ip();
                  $user_id=0;
              }


              $array = [
                  'tb_name' => 'carts',
                  'sql'     => [
                      'product_sale_price' => $product->product_sale_price,
                      'total_price'        => $product->product_sale_price,
                      'price_before_discount'=>$product->product_sale_price,
                      'user_id'            => $user_id,
                      'ip'                   =>$ip ??null,
                  ],
              ];

              CRUDcontroller::updateOrCreate( $array, $request );

          }




        return response()->json( [ 'message' => 'تم الاضافة الى السلة بنجاح', ], 200 );

    }


    public function showCart()
    {


        if(Auth::id())
        {
            $products = Cart::where( function ( $q ) {
                $q->where( 'user_id', Auth::id() )->orWhere( 'ip', \Request::ip() );

            } )->where( 'status', 0 )->where( 'is_delete', 0 )->with(
                [
                    'product.mainPhoto',
                ] )->get();

        }else{

            $products = Cart::where( 'user_id', 0 )->where('ip', \Request::ip())->where('status',0)->where( 'is_delete', 0 )->with(
                [
                    'product.mainPhoto',
                ] )->get();

        }


//        $products = Cart::where('user_id',Auth::id())->where('is_delete',0)->with(
//            ['product'=> function($q) {
//                $q->select(['id','category_name_ar']);},
//        ])->get();

        $total = Cart::total();
        $discountAllProduct=0;
        $total_before_cart= $total;
        $final_total =0;
        return view( 'site.pages.cart.showCart' )->with( compact( [ 'products', 'total' ,'final_total','discountAllProduct','total_before_cart'] ) );
    }


    public function updateCount( Request $request )
    {
        $product= Cart::where( 'id', $request->cart_id )->where('status',0)->where( 'is_delete', 0 )->first();



        if ( $product->color_id !== null && $product->size !== null )
        {

          $productDetilse = ProductDetails::where( 'product_id', $product->product_id )->
            where( 'color_id', $product->color_id )
                                            ->where( 'size', $product->size )
                                            ->first();


            $request->validate( [

                                    'count' => 'required|integer|min:1|max:' . $productDetilse->count,

                                ] );

        } else
        {
            $productOldCount = Product::where( 'id', $product->product_id )->first();
            $request->validate( [

                                    'count' => 'required|integer|min:1|max:' . $productOldCount->inventory,

                                ] );
        }
        $total_price = $product->product_sale_price * $request->count;

        if(Auth::id()){
            $user_id= Auth::id();
        }else{
            $ip = $request->ip();
            $user_id=0;
        }

        $array       = [
            'tb_name' => 'carts',
            'sql'     => [
                'id'                 => $request->cart_id,
                'product_sale_price' => $product->product_sale_price,
                'total_price'        => $total_price,
                'price_before_discount'=>$total_price,
                'count'              => $request->count,
                'user_id'            => $user_id,

            ],
        ];

        $id = CRUDcontroller::updateOrCreate( $array );


        if(Auth::id()){
            $products = Cart::where( function ($q){
                $q->where('user_id', Auth::id())->orWhere('ip', \Request::ip());
            } )->where('status',0)->where( 'is_delete', 0 )->with(
                [
                    'product.mainPhoto',
                ] )->get();

        }else{

            $products = Cart::where( 'user_id', 0 )->where('ip', \Request::ip())->where('status',0)->where( 'is_delete', 0 )->with(
                [
                    'product.mainPhoto',
                ] )->get();

        }

        $total    = Cart::total();

        $discountAllProduct=0;
        $total_before_cart= $total;
        $final_total =0;
        echo view( 'site.pages.cart.showCart', compact( 'products', 'total','discountAllProduct','total_before_cart' ,'final_total') )
                 ->renderSections()['content'];

    }


    public function setDiscount( Request $request )
    {

        $today=Carbon::now();
      $coupon         = Coupon::where( 'code', $request->code )->whereDate('start_date','<=', $today)->whereDate('end_date','>=', $today)->where( 'status', 1 )->first();
        if(Auth::id()){
            $products = Cart::where( function ($q){
                $q->where('user_id', Auth::id())->
                orWhere('ip', \Request::ip());})->where( 'is_delete', 0 )->where('status',0)->with(
                [
                    'product.mainPhoto',
                ] )->get();

        }else{

            $products = Cart::where( 'user_id', 0 )->where('ip', \Request::ip())->where('status',0)->where( 'is_delete', 0 )->with(
                [
                    'product.mainPhoto',
                ] )->get();

        }
        $total_before_cart = Cart::total();
        $total          = Cart::total();
        $discount_total = 0;
        $discount =0;
        $discountAllProduct=0;

        if ( $coupon )
        {

//            $coupone_id = $coupon->id;
            $codeCouponProduct = CouponProduct::where( 'coupon_id', $coupon->id )->where( 'product_id', 0 )->first();

            if ( $codeCouponProduct )
            {


                if ( $coupon->type_value == Coupon::TYPE_PERCENTAGE )
                {
                     $discount =$total * $coupon->value / 100;
                     $total = $total - $discount;
                    $discountAllProduct=$discount;
                } else
                {
                    $discountAllProduct= $coupon->value;
                    $total = $total - $coupon->value;
                }
            }
            else{


                $couponProductsIds = CouponProduct::query()->where( 'coupon_id', $coupon->id )
                                                  ->where( 'product_id', '!=', 0 )
                                                  ->pluck( 'product_id' )
                                                  ->toArray();

                foreach ( $products as $index => $item )
                {

                    // check if cart item supported by coupon discount // else set to zero
                    if ( in_array( $item->product_id, $couponProductsIds ) )
                    {

                        if ( $coupon->type_value == Coupon::TYPE_PERCENTAGE )
                        {

                            $discount               = $item->total_price * $coupon->value / 100;
                            $discount_total_product = $item->total_price - $discount;
                            $products[ $index ]['discount_total_product'] = $discount_total_product;
                            $total = $total - $discount;
//                            $cartProduct    = $products->WHERE( 'product_id', $item->product_id )->first();
//
//                            $array = [
//                                'tb_name' => 'carts',
//                                'sql'     => [
//                                    'id'             => $cartProduct->id,
//                                    'discount'       => $discount,
//                                    'total_discount' => $discount_total,
//                                    'total_price'      =>$discount_total,
//                                    'updated_at'     => Carbon::now(),
//                                ],
//                            ];
//                            CRUDcontroller::updateOrCreate( $array );
                        }
                        elseif($coupon->type_value == Coupon::TYPE_AMOUNT)
                        {
                            $discount                                     = $coupon->value;
                            $discount_total_product                       = $item->total_price - $discount;
                            $products[ $index ]['discount_total_product'] = $discount_total_product;

                            $total = $total - $discount;
                            //
////                            $cartProduct    = $products->WHERE( 'product_id', $item->product_id )->first();
////
////                            $array = [
////                                'tb_name' => 'carts',
////                                'sql'     => [
////                                    'id'             => $cartProduct->id,
////                                    'discount'       => $discount,
////                                    'total_discount' => $discount_total,
////                                    'total_price'      =>$discount_total,
////                                    'updated_at'     => Carbon::now(),
////                                ],
////                            ];
////                            CRUDcontroller::updateOrCreate( $array );
////                        }

                        }
                        else{
                            $products[ $index ]['discount_total_product'] =0;

                        }
                    }
                }
                if(   $total_before_cart == $total  ){
                    return response()->json( [
                                                 'message' => 'لا يوجد منتج لهذا الكود',
                                             ], 422 );
                }
            }

            echo view( 'site.pages.cart.showCart', compact( ['products', 'total','discountAllProduct', 'discount_total','discount','total_before_cart'] ) )
                     ->renderSections()['content'];

        } else
        {
            return response()->json( [
                                         'message' => 'قم بادخال كود صالح',
                                     ], 422 );
        }

    }


    public function deleteProduct(Request $request){
        $cartProduct = Cart::findOrFail($request->id);
         $cartProduct->delete();

        if(Auth::id()){
            $products = Cart::where( function ($q){
                $q->where('user_id', Auth::id())->orWhere('ip', \Request::ip());
            } )->where('status',0)->where( 'is_delete', 0 )->with(
                [
                    'product.mainPhoto',
                ] )->get();

        }else{

            $products = Cart::where( 'user_id', 0 )->where('ip', \Request::ip())->where('status',0)->where( 'is_delete', 0 )->with(
                [
                    'product.mainPhoto',
                ] )->get();

        }

        $total    = Cart::total();

        $discountAllProduct=0;
        $total_before_cart= $total;
        $final_total =0;
        echo view( 'site.pages.cart.showCart', compact( 'products', 'total','discountAllProduct','total_before_cart' ,'final_total') )
                 ->renderSections()['content'];


    }
}
