<?php

namespace App\Models;


use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWallet;
use Carbon\Carbon;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laratrust\Contracts\LaratrustUser;

use Laratrust\Traits\HasRolesAndPermissions;

class User extends Authenticatable implements LaratrustUser, Wallet
{

    use HasRolesAndPermissions;
    use HasWallet;
    use HasFactory, Notifiable, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
        'email',
        'phone',
        'email_verified_at',
        'password',
        'address',
        'country_code',
        'country',
        'city',
        'region_id',

    ];

    protected $casts = [

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = ['documents'];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(DriverDocument::class,'driver_id');
    }

    public function car(): HasOne
    {
        return $this->hasOne(Car::class,'driver_id');
    }


    protected $appends = ['name'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


    public function role(){
        return $this->getRoles()[0];
    }




//    public function pendingWashes(): HasMany
//    {
//        return $this->hasMany(Wash::class,'washer_id')->where('completed',0);
//    }





    public function getAvatarAttribute($value) {
        if(!$this->attributes['avatar']) {
            $colors = ['E91E63', '9C27B0', '673AB7', '3F51B5', '0D47A1', '01579B', '00BCD4', '009688', '33691E', '1B5E20', '33691E', '827717', 'E65100',  'E65100', '3E2723', 'F44336', '212121'];
            $background = $colors[strlen($this->first_name)%count($colors)];
            return "https://ui-avatars.com/api/?size=256&background=".$background."&color=fff&name=".urlencode($this->full_name);
        }
        return $this->attributes['avatar'];
    }

    public function getNameAttribute() {
        return $this->title.' '.$this->first_name." ".$this->last_name;
    }

//    public function getPhoneAttribute($value) {
//        if (str_starts_with($value, "+")) {
//            return $value;
//        } else {
//            return "0".$value;
//        }
//
//    }

}
