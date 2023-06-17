<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name_ar',
        'featured',
        'product_name_en',
        'product_description_en',
        'product_description_ar',
        'status',
        'product_price',
        'product_sale_price',
        'inventory',
        'created_by',
        'is_delete',
        'serial_number',
        'category_id',
        'sub_category_id',
    ];


//    protected static function booted()
//    {
//        static::creating(function(Product $item) {
//            $item->serial_number = $this->quickRandom();
//        });
//    }


    /**
     * Get the mainPhoto associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function getDescriptionAttribute()
    {
        if(session('locale') == 'en') {
            return $this->product_description_en;
        } else {
            return $this->product_description_ar;
        }
    }
    public function getNameAttribute ()
    {
        if(session('locale') == 'en') {
            return $this->product_name_en;
        } else {
            return $this->product_name_ar;
        }
    }
    public function mainPhoto(): HasOne
    {
        return $this->hasOne(ProductImage::class, 'product_id', 'id')->where('is_main',1);
    }
    public function morePhoto(): HasMany
    {
        return $this->HasMany(ProductImage::class, 'product_id', 'id')->where('is_main',0);
    }
    public function coupon(){

        return $this->belongsToMany(Coupon::class);
    }
    public function details(): HasMany
    {
        return $this->hasMany(ProductDetails::class, 'product_id', 'id');
    }
    public function order(){

        return $this->belongsToMany(Order::class,'order_product')->withPivot('price', 'count');

    }
    public function productSpecification()
    {
        return $this->belongsTo(ProductSpecification::class,);
    }
    public  function mainCategory()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public  function subCategory()
    {
        return $this->belongsTo(Category::class,'sub_category_id','id');
    }
    public function scopeActive($query)
    {
        return $query->where('status','active')->where('is_delete',0);
    }

    public function reviews()
    {

        return $this->hasMany(ProductRate::class,'product_id','id');
    }

}
