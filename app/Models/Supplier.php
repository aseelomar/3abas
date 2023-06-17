<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public function Methods()
    {
        return $this->belongsTo(PaymentsMethods::class, 'pay_method', 'id');
    }
}
