<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

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
    ];
}
