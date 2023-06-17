<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory,Notifiable;
    protected $fillable=['number_order','client_id','note','total','phone','country','created_by','image','payment_method_id','transfer_at','shipment_id','status_id','address1','address2','street','near_place','discount','price_before_discount'];
    protected $dates=['transfer_at'];


    public function user(){
        return $this->belongsTo(User::class,'client_id');
    }
    public function product(){
        return $this->belongsToMany(Product::class,'order_product')->withPivot('product_price', 'count');;
    }
    public function paymentMethod(){
        return $this->belongsTo(PaymentsMethods::class,'payment_method_id');
    }
    public function status(){
        return $this->belongsTo(Status::class,'status_id');
    }
    public function shipment(){
        return $this->belongsTo(User::class,'shipment_id');

    }
    public function orderProduct(){

        return $this->hasMany(OrderProduct::class,'order_id','id');
    }

    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        return $this->user->email;


    }
    public function orderTracking(){

        return $this->hasMany(OrderTracking::class);
    }

}
