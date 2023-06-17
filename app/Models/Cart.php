<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    use HasFactory;
    protected $fillable =['product_id','discount','total_discount','product_sale_price','ip','total_price','status','count','size','color_id','user_id','created_by','is_delete'];
//    protected $appends = [ 'total' ];

    public function product()
    {
        return $this->belongsTo( Product::class, 'product_id' );
    }

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public static function total()
    {
        return collect( self::items() )->map( function ( $item, $key ) {
            return $item['product_sale_price'] * $item['count'];
        } )->sum();
    }
    public static function items()
    {
        $cart_items = [];

        if(Auth::id()){

            $cart_items = self::query()-> where( function ($q){
                $q->where('user_id', Auth::id())->
                orWhere('ip', \Request::ip());})->where('status',0)->where( 'is_delete', 0 )->get();
        }else{
            $cart_items = self::query()->where('ip',\Request::ip())->where( 'user_id', 0)->where('status',0)->where( 'is_delete', 0 )->get();

        }

        return $cart_items;
    }


}
