<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
