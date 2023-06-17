<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confiq extends Model
{
    use HasFactory ;
    protected $primaryKey = 'name';
    protected $keyType = 'stirng';
    public $incrementing = false ;
    
    protected $fillable = ['name','value' , 'is_delete','is_visible'];

    public static function getValue($name,$default = null)
    {
        $confiq = static::find($name);
        if(!$confiq){
            return $default;

        }
        return $confiq->value ;
    }
    public static function setValue($name,$value)
    {
       return static::query()->updateOrCreate(
            ['name'=>$name ],
            ['value'=>$value]
        );

    }

}
