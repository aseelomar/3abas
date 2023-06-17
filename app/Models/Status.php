<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar','name_en','visible'];

    const STATUS_ACCEPT   = 1;
    const STATUS_REJECT   = 2;
    const STATUS_SENT_SHIPMENT  = 3;
    const STATUS_DELIVERY  = 4;
    const STATUS_PREPARATION  = 5;
    const STATUS_PENDING = 6;
    const STATUS_CANCEL= 7;
    const STATUS_CANCEL_FROM_USER=8;





    protected $appends = ['name'];

    public function getNameAttribute()
    {
        if(session('locale') == 'en') {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }

    public function scopeVisible($query){
        $query->where('visible', 1);

    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
