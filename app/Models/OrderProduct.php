<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable =['order_id','product_id','count','product_price','created_by','cart_id'];

    protected $table = 'order_product';

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function order(){

        return $this->belongsToMany(Order::class);
    }
}
