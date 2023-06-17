<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponProduct extends Model
{

    use HasFactory ,SoftDeletes;
    protected $table ='coupon_product';
    protected $fillable =['coupon_id','product_id'];



}
