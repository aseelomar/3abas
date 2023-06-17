<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $fillable =['name','country_id','mobile','created_by','status'];

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function order(){

        return $this->hasMany(Order::class);

    }

}
