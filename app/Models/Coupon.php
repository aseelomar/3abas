<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['code', 'start_date', 'end_date', 'user_id',
        'status', 'number', 'type_value', 'value','coupon_id'];

    protected $dates = ['start_date', 'end_date'];

    const TYPE_PERCENTAGE = 0;
    const TYPE_AMOUNT = 1;


    const TYPE_VALUE_EN = [
        self::TYPE_PERCENTAGE => 'percentage',
        self::TYPE_AMOUNT => 'amount',
    ];
    const TYPE_VALUE_AR = [
        self::TYPE_PERCENTAGE => 'نسبة',
        self::TYPE_AMOUNT => 'مبلغ',
    ];

    protected $appends = ['type_name'];

    public function getTypeNameAttribute()
    {
        if(session('locale') == 'en') {
            return self::TYPE_VALUE_EN[$this->type_value];
        } else {
            return self::TYPE_VALUE_AR[$this->type_value];
        }

    }

    public function Product()
    {
        return $this->belongsToMany(Product::class,);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
