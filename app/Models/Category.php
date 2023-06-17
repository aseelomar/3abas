<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'category_name_ar',
        'category_name_en',
        'status',
        'is_delete',
        'category_image'
    ];


    protected $appends = ['name'];




    /**
     * Get the perant that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }
    public function child(): HasMany
    {
        return $this->HasMany(self::class, 'parent_id', 'id');
    }
    public function product()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
    public function getNameAttribute()
    {
        if (session('locale') == 'en') {
            return $this->category_name_en;
        } else {
            return $this->category_name_ar;
        }
    }
    public function scopeActive($query)
    {
        return $query->where('status','active')->where('is_delete',0);

    }
}
