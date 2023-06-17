<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(  )
    {
        $this->setPage();
        $product = Product::where('is_delete', 0)->paginate(10);
        $products = $product->load('details.color');


        return $this->setView('admin.cart.productCart')->with(compact('products'));
    }

    public function store(Request $request){



        $request->validate([
                               'product_id'=>'required|exists:products,id',

                                'count'=>'required',

                           ]);


        if($request->color_id){
            $request->validate([
                                   'color_id'=>'required',
                                   'size'=>'required',

                               ]);
        }
        $product = Product::findOrFail($request->product_id);

        $array = [
            'tb_name' => 'carts',
            'sql'     => [
            'product_sale_price' => $product->product_sale_price,
            'total_price'=>$product->product_sale_price,
            ],
        ];

     CRUDcontroller::updateOrCreate( $array, $request );


            return response()->json( [
                                         'message' => 'admin.update_success',

                                     ], 200 );




    }


}
