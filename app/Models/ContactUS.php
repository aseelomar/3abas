<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class ContactUS extends Model
{
    use Notifiable;

    protected $table="contact_us";

    public $fillable = ['address', 'email_reply','email', 'phone', 'subject', 'message', 'status','row_id'];



    public function user(){
        return $this->belongsTo(User::class,'email','email');
    }
    public function userReplay(){
        return $this->belongsTo(User::class,'email_reply','email');
    }
    public function child(): HasMany
    {
        return $this->HasMany(self::class, 'row_id', 'id');
    }

}
