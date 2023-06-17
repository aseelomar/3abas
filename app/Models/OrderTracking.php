<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTracking extends Model
{
    use HasFactory;
    protected $table='order_tracking';
    protected $fillable =['order_id' ,'status_id','created_by'];

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
