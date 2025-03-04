<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Traits\FillableTraits;

class Booking extends Model
{
    use HasFactory, HasUuids;

    use FillableTraits;

    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = $this->bookings;
    }

//    protected  $with = ['car'];

    protected $appends = ['days','booking_info_urlink','booking_info_url', 'manage_booking_url'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id');
    }


    public function getDaysAttribute(): int
    {
        $startDate = Carbon::parse($this->pick_up_date);
        $endDate = Carbon::parse($this->drop_off_date);

        return $endDate->diffInDays($startDate) + 1;
    }

    public function getBookingInfoUrlinkAttribute(): string
    {
        return route('booking', $this->id);
    }

    public function getBookingInfoUrlAttribute(): string
    {
        return route('booking', $this->id);
    }

    public function getManageBookingUrlAttribute(): string
    {
        return route('booking.view', $this->id);
    }




    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function vehicle_mileage(): HasMany
    {
        return $this->hasMany(VehicleMileage::class);
    }



}
