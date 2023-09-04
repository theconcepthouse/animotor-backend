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
        'types',
        'tax',
    ];

    protected $appends = ['types_value'];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
    public function getTypesValueAttribute(): array
    {
        $types = $this->types;
        return explode(',', $types);
    }

    public function discounted($fee): float|int
    {
        if($this->discount > 0){
            $discount = $this->discount;
            $discounted = ($discount / 100) * $fee;
            return round($fee - $discounted);
        }
        return round($fee);
    }

    public function commission($fee): float|int
    {
        if($this->commission > 0){
            if($this->commission_type == 'fixed'){
                return $this->commission;
            }
            $commission = $this->commission;
            return ($commission / 100) * $fee;
        }
        return 0;
    }
}
