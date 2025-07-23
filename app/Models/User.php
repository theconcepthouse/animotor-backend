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
        'last_location_update' => 'datetime',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = ['documents','car','region','service','company','bank'];

    protected $appends = ['is_avatar_set','unapproved_documents','latest_transactions','name','status_text','account_balance','full_phone','currency'];

    public function getFormsWithData()
    {
        return $this->formDatas()->with('form')->get();
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id');
    }
    public function trips(): HasMany
    {
        return $this->hasMany(TripRequest::class,'customer_id');
    }

    public function transaction_records(): HasMany
    {
        return $this->hasMany(TransactionRecord::class);
    }

    public function driver_trips(): HasMany
    {
        return $this->hasMany(TripRequest::class,'driver_id');
    }

    public function driver_rejected_trips(): HasMany
    {
        return $this->hasMany(RejectedRequest::class,'driver_id');
    }

    public function completed_trips(): HasMany
    {
        return $this->hasMany(TripRequest::class,'customer_id')->where('completed', true);
    }
    public function cancelled_trips(): HasMany
    {
        return $this->hasMany(TripRequest::class,'customer_id')->where('cancelled', true);
    }
    public function driver_cancelled_trips(): HasMany
    {
        return $this->hasMany(TripRequest::class,'driver_id')->where('cancelled', true);
    }
    public function driver_completed_trips(): HasMany
    {
        return $this->hasMany(TripRequest::class,'driver_id')->where('completed', true);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class,'customer_id');
    }
    public function all_bookings(): HasMany
    {
        return $this->hasMany(Booking::class,'customer_id');
    }
    public function completed_bookings(): HasMany
    {
        return $this->hasMany(Booking::class,'customer_id')->where('completed', true);
    }

    public function cancelled_bookings(): HasMany
    {
        return $this->hasMany(Booking::class,'customer_id')->where('cancelled', true);
    }
    public function bank(): hasOne
    {
        return $this->hasOne(Bank::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id');
    }
    public function note(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function driver_pcn(): HasMany
    {
        return $this->hasMany(DriverPcn::class, 'driver_id');
    }

    public function fullname()
    {
        $fullname = $this->first_name." ".$this->last_name;
        return $fullname ?? '';
    }

    public function status()
    {
        $status = $this->getAttribute('status');
        if ($status == "unapproved")
        {
            return '<span class="badge badge-sm badge-dim bg-outline-warning ">Unapproved <em class="ni ni-edit"></em></span>';
        }elseif ($status == "approved"){
            return '<span class="badge badge-sm bg-success ">Approved <em class="ni ni-edit"></em></span>';
        }
        return '<span class="badge badge-sm bg-danger ">Not Set</span>';
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

    public function totalWithdrawal(): ?string
    {
        return $this->region?->currency_symbol;
    }
    public function totalSpent(): float|int
    {
        $total_spent = 0;
        if(count($this->trips) > 0){
            $total_rides = $this->trips->where('payment_status','paid')->sum('grand_total');

            $total_spent += $total_rides;
        }
        if(count($this->all_bookings) > 0){
            $total_spent =+ $this->all_bookings->where('payment_status','paid')->sum('grand_total');
        }
        return  $total_spent;
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

    public function vehicle_mileage(): HasOne
    {
        return $this->hasOne(VehicleMileage::class,'user_id');
    }

    public function role(){
        return $this->getRoles()[0];
    }

    public function getAvatarAttribute($value): string
    {
        if(!$value) {
            return asset('default/avatar.png');
        }
        return $value;
    }
    public function getIsAvatarSetAttribute(): string
    {
        if(!$this->avatar) {
            return false;
        }
        return true;
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

    public function recordTransaction($amount, $description = null, $method = null, $type = 'debit', $detail = null): void
    {
        $this->transaction_records()->create([
            'amount' => $amount,
            'type' => $type,
            'description' => $description,
            'method' => $method,
            'detail' => $detail,
        ]);

    }

}
