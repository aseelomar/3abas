<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\Cart;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PaymentsMethods;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Throwable;

class OrderController extends Controller
{
    public function createOrder( Request $request )
    {
        if ( Auth::id() )
        {
            $products             = json_decode( $request->product_cart );
            $discount_all_product = $request->discount_all_product;
            $final_total          = $request->final_total;
            $total_before_cart    = $request->total_before_cart;
            $payments             = PaymentsMethods::where( 'visible', 1 )->where( 'is_delete', 0 )->get();

            return view( 'site.pages.order.completeOrder' )->with( compact( [
                                                                                'products',
                                                                                'final_total',
                                                                                'discount_all_product',
                                                                                'total_before_cart',
                                                                                'payments'
                                                                            ] ) );

        }

        return redirect()->route( 'login' );
    }

    public function completeCreateOrder( Request $request )
    {

        if ( Auth::id() )
        {
            $product = json_decode( $request->product_cart[0] );
            try
            {
                DB::beginTransaction();

                if ( $request->discount_all_product < 0 )
                {

                    $discount              = $request->discount_all_product;
                    $total                 = $request->final_total;
                    $price_before_discount = $request->total_before_cart;

                    foreach ( $product as $item )
                    {


                            $array = [
                                'tb_name' => 'carts',
                                'sql'     => [
                                    'id'         => $item->id,
                                    'status'     => 1,
                                    'updated_at' => Carbon::now(),
                                    'user_id'    => Auth::id(),
                                ],
                            ];
                            CRUDcontroller::updateOrCreate( $array );

                    }

                } else
                {
//            if($request->final_total !== $request->total_before_cart  && $request->discount_all_product == 0 ({
                    foreach ( $product as $item )
                    {

                        if ( isset( $item->discount_total_product ) )
                        {
                            $dicount        = $item->price_before_discount - $item->discount_total_product;
                            $total_discount = $item->discount_total_product;

                            $array = [
                                'tb_name' => 'carts',
                                'sql'     => [
                                    'id'             => $item->id,
                                    'discount'       => $dicount,
                                    'total_discount' => $total_discount,
                                    'total_price'    => $total_discount,
                                    'status'         => 1,
                                    'updated_at'     => Carbon::now(),
                                    'user_id'        => Auth::id(),
                                ],
                            ];
                            CRUDcontroller::updateOrCreate( $array );
                        } else
                        {

                            $array = [
                                'tb_name' => 'carts',
                                'sql'     => [
                                    'id'         => $item->id,
                                    'status'     => 1,
                                    'updated_at' => Carbon::now(),
                                    'user_id'    => Auth::id(),
                                ],
                            ];
                            CRUDcontroller::updateOrCreate( $array );
                        }
                    }

                    $discount              = $request->total_before_cart - $request->final_total;
                    $total                 = $request->final_total;
                    $price_before_discount = $request->total_before_cart;

                }

                $year  = date( "y" );
                $month = date( "m" );
                $day   = date( "d" );

                $prefix       = $year . $month . $day;
                $number_order = $prefix . unique_random( 'orders', 'number_order', 4, $prefix );

                $user    = User::where( 'id', Auth::id() )->with( 'country' )->first();
                $country = $user->country->country_name;

                $array    = [
                    'tb_name' => 'orders',
                    'sql'     => [
                        'number_order'          => $number_order,
                        'status_id'             => Status::STATUS_PENDING,
                        'client_id'             => Auth::id(),
                        'phone'                 => $request->phone_number,
                        'country'               => $country,
                        'payment_method_id'     => $request->payment_way,
                        'created_by'            => Auth::id(),
                        'shipment_id'           => 28,
                        'total'                 => $total,
                        'sub_price'             => $price_before_discount,
                        'address1'              => $request->address1,
                        'near_place'            => $request->near_place,
                        'street'                => $request->street,
                        'client_note'           => $request->client_note ?? null,
                        'price_before_discount' => $price_before_discount,
                        'discount'              => $discount,

                    ],
                ];
                $order_id = CRUDcontroller::updateOrCreate( $array );


                $array    = [
                    'tb_name' => 'order_tracking',
                    'sql'     => [

                        'order_id'              => $order_id,
                        'status_id'             =>Status::STATUS_PENDING,
                        'created_by'            => Auth::id(),

                    ],
                ];

                CRUDcontroller::updateOrCreate( $array );

                $products = Cart::where( function ( $q ) {
                    $q->where( 'user_id', Auth::id() )->orWhere( 'ip', \Request::ip() );
                })->where( 'status', 1 )->where( 'is_delete', 0 )->get();

                foreach ( $product as $item )
                {
                    $cartProduct = $products->find($item->id);

                    $array = [
                        'tb_name' => 'order_product',
                        'sql'     => [
                            'order_id'      => $order_id,
                            'product_id'    => $cartProduct->product_id,
                            'cart_id'       =>$cartProduct->id,
                            'count'         => $cartProduct->count,
                            'product_price' => $cartProduct->total_price,
                            'created_by'    => Auth::id(),
                        ],
                    ];
                    CRUDcontroller::updateOrCreate( $array );


                }

              foreach ($product as $item){
                $cartProduct = $products->find($item->id);
              $productIitem = Product::where('id',$cartProduct->product_id)->with('details')->first();
            $details=$productIitem->details;
                    if( $details->isEmpty() ){

                           $count=  intval($productIitem->inventory) - intval($item->count);

                        $array1 = [
                            'tb_name' => 'products',
                            'sql'=> [
                                'id'      => $productIitem->id,
                                'inventory'    => $count,
                                'updated_at' => Carbon::now(),
                                'created_by'    => Auth::user()->id,
                                'best_seller'=>$productIitem->best_seller +intval($item->count),
                            ],
                        ];

                        CRUDcontroller::updateOrCreate( $array1 );
                   }
                    else{
                        $productIitemDetails =   ProductDetails::where( 'product_id', $cartProduct->product_id )->
                                         where( 'color_id', $cartProduct->color_id )
                                      ->where( 'size', $cartProduct->size )
                                      ->first();
                        if($productIitemDetails) {
                                    $count=  intval($productIitemDetails->count) - intval($item->count)  ;
                            $productIitemDetails->count = intval($productIitemDetails->count) - intval($item->count)  ;
                            $productIitemDetails->save();
                           }
                       $best_seller =$productIitem->best_seller +intval($item->count);
                        $array1 = [
                            'tb_name' => 'products',
                            'sql'=> [
                                'id'      => $cartProduct->product_id,
                                'updated_at' => Carbon::now(),
                                'created_by'    => Auth::user()->id,
                                'best_seller'=>$best_seller,
                            ],
                        ];

                    CRUDcontroller::updateOrCreate( $array1 );

                    }
              }


                DB::commit();

            } catch ( \Throwable $e )
            {
                dd($e);
                DB::rollback();
            }
            return redirect()->route( 'site.cart.show' ) ->with('success', 'تم انشاء الطلب بنجاح وتفريغ السلة');

        }
        return redirect()->route( 'login' );

    }

    public function orderHistory(){
        if(Auth::id()){
            $user= User::where('id',Auth::id())->select(['id','name','mobile'])->first();

       $orders = Order::where('client_id',Auth::id())->where('is_delete',0)
                                                          ->with([
                                                            'orderProduct.cart.product' => function($q) {
                                                            $q->select(['id','product_name_ar']);},
                                                              'orderTracking.status'])
                                                              ->orderBy('created_at', 'DESC')->get();
            $countNotSeen =Notification::where('user_to',Auth::id())->where('seen',0)->count();

            return view('site.pages.order.orderHistory')->with(compact(['orders','user','countNotSeen']));
        }
        return redirect()->route( 'login' );

    }

     public function deleteOrder(Request $request){

         $order = Order::findOrFail( $request->id );
         try
         {
             DB::beginTransaction();

         if ( $request->status == Status::STATUS_PENDING )
         {
            $status = Status::STATUS_CANCEL_FROM_USER;
             $array  = [
                 'tb_name' => 'orders',
                 'sql'     => [
                     'id'          => $request->id,
                     'status_id'   => $status,
                     'transfer_at' => now(),
                     'updated_at'  => now(),
                      'created_at'=>$order->created_at,

                 ],
             ];
             CRUDcontroller::updateOrCreate( $array, null, null );
             $array    = [
                 'tb_name' => 'order_tracking',
                 'sql'     => [

                     'order_id'              => $request->id,
                     'status_id'             =>$status,
                     'created_by'            => Auth::id(),

                 ],
             ];

             CRUDcontroller::updateOrCreate( $array );
          $orderProduct =OrderProduct::where('order_id',$request->id)->with('cart.product.details')->get();
          foreach ($orderProduct as $item){
              if($item->cart->color_id == null){
                  $count = $item->cart->product->inventory + $item->cart->count;
                  $array1 = [
                      'tb_name' => 'products',
                      'sql'=> [
                          'id'      => $item->cart->product->id,
                          'inventory'    => $count,
                          'updated_at' => Carbon::now(),
                          'created_by'    => Auth::user()->id,
                          'best_seller'=>$item->cart->product->best_seller -$item->cart->count,
                      ],
                  ];

                  CRUDcontroller::updateOrCreate( $array1 );

              }elseif($item->cart->color_id !== null && $item->cart->size !== null){
                  $product = ProductDetails::where('product_id',$item->cart->product_id)->where('color_id',$item->cart->color_id)->where('size',$item->cart->size)->first();
                  if($product) {
                      $count = $product->count + $item->cart->count;

                      $product->count = $count  ;
                      $product->save();
                  }
                  $array1 = [
                      'tb_name' => 'products',
                      'sql'=> [
                          'id'      => $item->cart->product->id,
                          'updated_at' => Carbon::now(),
                          'created_by'    => Auth::user()->id,
                          'best_seller'=>$item->cart->product->best_seller -$item->cart->count,
                      ],
                  ];

                  CRUDcontroller::updateOrCreate( $array1 );
              }
          }
         }
             DB::commit();

         } catch ( \Throwable $e )
         {

             DB::rollback();

         }
             return redirect()->route( 'site.order.orderHistory' ) ->with('success', 'تم الحف بنجاح');

         }


     


}
