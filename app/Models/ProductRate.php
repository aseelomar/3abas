<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductRate extends Model
{
    use HasFactory;
    protected $table = 'product_rates';
    protected $fillable = [
        'product_id',
        'user_id',
        'rate_value',
        'status',
        'comment',
        'is_delete',
    ];

    /**
     * Get the user that owns the ProductRate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
