<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    protected $appends = ['days','booking_number'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function getDaysAttribute(): int
    {
        $startDate = Carbon::parse($this->pick_up_date);
        $endDate = Carbon::parse($this->drop_off_date);

        return $endDate->diffInDays($startDate);
    }
    public function getBookingNumberAttribute(): string
    {
        return getUniqueBookingNumber();
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

}
