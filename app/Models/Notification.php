<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable =['user_form','user_to','row_id','seen','table'];


    public function userTo(){
        return $this->belongsTo( User::class, 'user_to' );

    }
    public function userForm(){
        return $this->belongsTo( User::class, 'user_form' );

    }
    public function order(){
        return $this->belongsTo( Order::class, 'row_id' );

    }
    public function contactUs(){
        return $this->belongsTo( ContactUS::class, 'row_id' );

    }

}
