<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'color_id',
        'size',
        'count'
    ];

    public function color(){

        return $this->belongsTo(Color::class);
    }
}
