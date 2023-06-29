<?php

namespace App\Models;


use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWallet;
use Carbon\Carbon;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Collection;
use Laratrust\Contracts\LaratrustUser;

use Laratrust\Traits\HasRolesAndPermissions;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements LaratrustUser, Wallet
{

    use HasRolesAndPermissions;
    use HasWallet;
    use HasApiTokens;
    use HasFactory, Notifiable, SoftDeletes;
    use HasUuids;




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
        'is_online',
        'map_lat',
        'map_lng',
        'email_verified_at',
        'password',
        'comment',
        'status',
        'address',
        'country_code',
        'country',
        'city',
        'region_id',
        'service_id',


    ];

    protected $casts = [
        'is_online' => 'bool'
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

    protected $with = ['documents','car','region','service','wallet'];

    protected $appends = ['unapproved_documents','name','status_text','account_balance','full_phone'];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class,'service_id')->select('id', 'name');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(DriverDocument::class,'driver_id');
    }

    public function car(): HasOne
    {
        return $this->hasOne(Car::class,'driver_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


    public function role(){
        return $this->getRoles()[0];
    }

    public function getAvatarAttribute($value) {
        if(!$this->attributes['avatar']) {
            return asset('default/avatar.png');
        }
        return $this->attributes['avatar'];
    }

    public function getNameAttribute() {
        return $this->first_name." ".$this->last_name;
    }
    public function getFullPhoneAttribute(): string
    {
        return $this->country_code.$this->phone;
    }

    public function getAccountBalanceAttribute()
    {
        $wallet = $this->wallet()->first();
        if($wallet){
            return $wallet?->balance ?? 0;
        }else{
            return 0;
        }
    }

    public function getStatusTextAttribute() {
        $status = $this->status;
        if($status == 'pending'){
            return "Account pending approval";
        }
        if($status == 'unapproved'){
            return "Account unapproved";
        }
        if($status == 'blocked'){
            return "Account Blocked";
        }
        return 'Account '.$status;
    }

//    public function getCommentAttribute() {
//        if(strlen($this->comment) > 3){
//            return $this->comment;
//        }
//        $status = $this->status;
//        if($status == 'pending'){
//            return "Your account is pending approval, you will be notified once approved";
//        }
//        if($status == 'unapproved'){
//            return "Account unapproved";
//        }
//        if($status == 'blocked'){
//            return "Account Blocked";
//        }
//        return 'Account '.$status;
//    }

    public function getUnapprovedDocumentsAttribute(): int
    {
        if($this->hasRole('driver')){
            return $this->documents()->where('is_approved',0)->count();
        }
        return 0;
    }
    public function getMessingDocumentsAttribute(): int
    {
        if($this->hasRole('driver')){
            return $this->documents()->where('is_approved',0)->count();
        }
        return 0;
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
