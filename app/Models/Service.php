<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;
    use HasUuids;


    protected $fillable = [
        'name',
        'region_id',
        'is_active',
        'image',
        'capacity',
        'wait_time_limit',
        'min_fare',
        'min_distance',
        'price',
        'distance_price',
        'time_price',
        'wait_price',
        'discount',
        'commission_type',
        'commission',
        'cancellation_fee',
        'payment_methods',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
