<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'provider',
        'mobile',
        'location',
        'country_id',
        'is_deleted',
        'latitude',
        'longitude',
        'user_image',
        'google_id'
    ];
    protected $appends = [
        'image', 'fav_product'
    ];
    /**
     * The attributes that shou hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token', 'is_deleted'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * The permission that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permission(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'model_has_permissions', 'model_id', 'permission_id');
    }
    public function coupon()
    {

        return $this->hasMany(Coupon::class);
    }
    public function paymentsMethods()
    {

        return $this->hasMany(PaymentsMethods::class);
    }
    public function order()
    {

        return $this->hasMany(Order::class);
    }
    public function shipment()
    {

        return $this->hasMany(Shipment::class);
    }
    public function scopeShipping($query)
    {
        return $query->where('type', '=', 'shipping');
    }

    public function country()
    {

        return $this->belongsTo(Country::class, 'country_id');
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }
    /**
     * Get all of the favorite for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorite(): HasMany
    {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }


    /**
     * Get all of the premissions_id for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function getImageAttribute()
    {
        if ($this->user_image) {
            return asset('images/user/' . $this->user_image);
        }
        return asset('profile.jpg');
    }
    public function getFavProductAttribute()
    {

        return    $this->favorite()->pluck('product_id') ->toArray();
    }
}
