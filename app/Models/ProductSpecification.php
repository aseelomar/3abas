<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id','brand_name','certificate','type','metal_stamp','main_stone','type_certificate','occasion','pattern','item_type',
        'pattern_shape','chain_length','origin','weight','metal_type','gender','diameter','personalization','fashion','side_stone',
        'certificate_number','model_number','stamp','created_by'
    ];

    public function Product()
    {
        return $this->belongsToMany(Product::class,);
    }
}
