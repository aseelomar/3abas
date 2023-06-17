<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_title_ar',
        'page_title_en',
        'page_body_ar',
        'page_body_en',
        'page_image',
        'is_visible',
        'is_delete',
        'created_by'
    ];
    const STATIC_PAGE_TECHNICAL_SUPPORT   = 1;
    const STATIC_PAGE_SHOP_CONFIDENCE   = 2;
    const STATIC_PAGE_WHO_ARE_WE   = 3;
    const STATIC_PAGE_OUR_LOCATION   = 4;
    const STATIC_PAGE_COMPETITIVE_PRICE  = 5;
    const STATIC_PAGE_USER_AGREEMENT  = 6;
    const STATIC_PAGE_MARKETER  = 7;
    const STATIC_PAGE_SECURE_PAYMENT  = 8;
    const STATIC_PAGE_CALL_US  = 9;
    const STATIC_PAGE_TERMS_SERVICE  = 10;

}
