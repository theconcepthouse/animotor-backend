<?php

namespace App\Models;


use App\Traits\FillableTraits;
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

    use HasRolesAndPermissions, HasWallet, HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasUuids, FillableTraits;

    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = $this->user;
    }


    protected $casts = [
        'is_online' => 'bool',
        'last_location_update' => 'date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = ['documents','car','region','service','company','bank'];

    protected $appends = ['unapproved_documents','latest_transactions','name','status_text','account_balance','full_phone','currency'];


    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id');
    }
    public function bank(): hasOne
    {
        return $this->hasOne(Bank::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id');
    }


    public function getMonifyAccountAttribute($val)
    {
        if($val){
            return json_decode($val);
        }
        return null;
    }


    public function getCurrencyAttribute(): ?string
    {
        return $this->region?->currency_symbol;
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

    public function role(){
        return $this->getRoles()[0];
    }

    public function getAvatarAttribute($value): string
    {
        if(!$this->attributes['avatar']) {
            return asset('default/avatar.png');
        }
        return $this->attributes['avatar'];
    }

    public function getNameAttribute(): string
    {
        return $this->first_name." ".$this->last_name;
    }
    public function getFullPhoneAttribute(): string
    {
        return $this->country_code.$this->phone;
    }

   public function getLatestTransactionsAttribute(): \Illuminate\Database\Eloquent\Collection
   {
        return $this->transactions()->latest()->limit(5)->get();
    }

    public function getAccountBalanceAttribute() : int | float
    {
        $wallet = $this->wallet()->first();
        if($wallet){
            return $wallet?->balance ?? 0;
        }else{
            return 0;
        }
    }

    public function getStatusTextAttribute(): string
    {
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

}
