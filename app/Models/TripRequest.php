<?php

namespace App\Models;

use App\Traits\FillableTraits;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TripRequest extends Model
{
    use HasFactory, HasUuids, FillableTraits;


    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = $this->trip_request;
    }

    protected $casts = [
        'destination_lat' => 'decimal:8',
        'destination_lng' => 'decimal:8',
        'origin_lat' => 'decimal:8',
        'origin_lng' => 'decimal:8',
    ];

    protected $appends = ['started_at_val','end_at_val','created_at_val','started_date','currency','earned','created_date'];

    protected $with = ['service','region'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function driver_rejected(): HasMany
    {
        return $this->hasMany(RejectedRequest::class,'trip_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function getStartedAtValAttribute(): string
    {
        $started_at = Carbon::parse($this->started_at);
        return $started_at->format('H:i:s');
    }
    public function getRideTypeAttribute($val): string
    {
        if($val == 'instant'){
            return "Instant Ride";
        }
        return $val;
    }
    public function getEarnedAttribute(): string
    {
        return $this->grand_total;
    }
    public function getStartedDateAttribute(): string
    {
        $started_at = Carbon::parse($this->started_at);
        return $started_at->format('Y-m-d');
    }
    public function getCreatedDateAttribute(): string
    {
        $created_at = Carbon::parse($this->created_at);
        return $created_at->format('Y-m-d H:i:s');
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
