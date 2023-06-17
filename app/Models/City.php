<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory ,SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'country',
        'code',
        'is_active'

    ];

    protected $casts = ['name' => 'array'];

    protected $appends = ['city_name'];

    public function getCityNameAttribute()
    {
        // $language = request()->header('lang') ? request()->header('lang'): 'en';

        try {
            //code...

        if(session('locale') == 'en') {
           $language = 'en';
        } else {
           $language = 'en';

        }

        return $this->name[$language];
    } catch (\Throwable $th) {
        //throw $th;
        return "";
    }
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'iso2', 'country');
    }
}
