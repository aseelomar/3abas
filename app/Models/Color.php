<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = ['color_name_ar',
    'color_name_en',
    'color_code',
    'rank',
    'is_delete',];
protected $appends=['name'];

    public function getNameAttribute()
    {
        if(session('locale') == 'en') {
            return $this->color_name_ar;
        } else {
            return $this->color_name_en;
        }
    }
}
