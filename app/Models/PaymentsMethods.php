<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsMethods extends Model
{
    use HasFactory;

    protected $table = 'payments_methods';
    protected $fillable=['title_ar','title_en','value','rank','is_delete','created_by','visible'];
//
//    const TYPE_UNVISIBLE = 0;
//    const TYPE_INVISIBLE = 1;
//
//
//
//    const TYPE_VALUE_EN = [
//        self::TYPE_INVISIBLE => 'Invisible',
//        self::TYPE_VISIBLE => 'visible',
//    ];
//    const TYPE_VALUE_AR = [
//        self::TYPE_INVISIBLE => 'غير ظاهر',
//        self::TYPE_VISIBLE => 'ظاهر',
//    ];
//
//    protected $appends = ['visible_name'];
//
//    public function getVisibleNameAttribute()
//    {
//        if (session('locale') == 'en') {
//            return self::TYPE_VALUE_EN[$this->visible_name];
//        } else {
//            return self::TYPE_VALUE_AR[$this->visible_name];
//        }
//    }

    public function getNameAttribute()
    {
        if(session('locale') == 'en') {
            return $this->title_en;
        } else {
            return $this->title_ar;
        }
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function order(){

        return $this->hasMany(Order::class);

    }
    public function scopeActive($query)
    {
        return $query->where('visible', 1);
    }

}
