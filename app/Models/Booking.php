<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'region_id',
        'driver_id',
        'customer_id',
        'fee',
        'reference',
        'pick_up_date',
        'pick_up_time',
        'drop_off_date',
        'drop_off_time',
        'pick_location',
        'drop_off_location',
        'status',
        'payment_status',
        'payment_method',
        'pick_up_lat',
        'pick_up_lng',
        'drop_off_lat',
        'drop_off_lng',

        'car_id',
        'completed',
        'cancelled',
        'rating',
        'rating_comment',


        'extra_time_price',

        'discount',
        'tax',
        'grand_total',

        'rental_id',

        'booking_type',
        'driver_earn',
        'commission',
        'cancellation_reason',
        'cancelled_by',
        'comment',
        'picked',
    ];

    protected  $with = ['car'];

    protected $appends = ['days'];

    public function car(): HasOne
    {
        return $this->hasOne(Car::class,'id','car_id');
    }

    public function getDaysAttribute(): int
    {
        $startDate = Carbon::parse($this->pick_up_date);
        $endDate = Carbon::parse($this->drop_off_date);

        return $endDate->diffInDays($startDate);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

}
