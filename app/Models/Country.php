<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = ['name','iso2','iso3','phone_code','timezone','flag','is_active'];
    protected $hidden = [
    'name'
    ];
    protected $casts = ['name' => 'array'];
    protected $appends = ['country_name'];

    public function getCountryNameAttribute()
    {
        // $language = request()->header('lang') ? request()->header('lang'): 'en';
        if(session('locale') == 'en') {
           $language = 'en';
        } else {
           $language = 'ar';

        }

        return $this->name[$language];
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }


}
