<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','title_en','type','visible','rank','icon','url','parent_id'
    ];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        if(session('locale') == 'en') {
            return $this->title_en;
        } else {
            return $this->title;
        }
    }
}
