<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TripRequest extends Model
{
    use HasFactory;
    use HasUuids;


    protected $fillable = [
        'region_id',
        'driver_id',
        'customer_id',
        'fee',
        'reference',
        'origin',
        'destination',
        'status',
        'payment_status',
        'payment_method',
        'origin_lat',
        'origin_lng',
        'destination_lat',
        'destination_lng',
        'started_at',
        'end_at',
        'current_lat',
        'current_lng',
        'distance',
        'distance_text',
        'duration',
        'duration_text',
        'car_id',
        'completed',
        'cancelled',
        'rating',
        'driver_rating',
        'rating_comment',
        'driver_rating_comment',
        'driver_feedback',
        'rider_feedback',
        'base_price',
        'time_price',
        'distance_price',
        'discount',
        'tax',
        'grand_total',
        'service_id',
        'ride_type',
        'driver_earn',
        'commission',
        'cancellation_reason',
        'cancelled_by',
    ];

    protected $appends = ['started_at_val','end_at_val','created_at_val','started_date','currency'];

    protected $with = ['service','region'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function getStartedAtValAttribute(): string
    {
        $started_at = Carbon::parse($this->started_at);
        return $started_at->format('H:i:s');
    }
    public function getStartedDateAttribute(): string
    {
        $started_at = Carbon::parse($this->started_at);
        return $started_at->format('Y-m-d');
    }
    public function getEndAtValAttribute(): string
    {
        $end_at = Carbon::parse($this->end_at);
        return $end_at->format('H:i:s');
    }
    public function getCreatedAtValAttribute(): string
    {
        $created_at = Carbon::parse($this->created_at);
        return $created_at->format('H:i:s');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id')->select('id', 'name','currency_code');
    }

    public function getCurrencyAttribute(): ?string
    {
        return $this->region?->currency_code;
    }

}
