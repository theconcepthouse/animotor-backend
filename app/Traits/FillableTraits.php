<?php

namespace App\Traits;

trait FillableTraits
{
    protected array $users = [

    ];

    protected array $bookings = [
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

        'booking_number',
        'confirmation_no',
        'is_confirmed',
        'insurance_fee',
        'deposit_fee',
    ];

    protected array $car = [
        'driver_id',
        'title',
        'make',
        'model',
        'type',
        'year',
        'color',
        'gear',
        'door',
        'vehicle_no',
        'region_id',
        'is_available',

        'rental_packages',
        'image',
        'company_id',

        'country',
        'state',
        'city',
        'price_per_day',
        'attributes',
        'photos',
        'youtube_link',

        'deposit',
        'bags',
        'cancellation_fee',
        'price_per_mileage',
        'mileage',
        'map_lat',
        'map_lng',
        'requirements',
        'security_deposit',
        'damage_excess',
        'insurance_fee',
        'mileage_text',
        'air_condition',
        'seats',
        'pick_up_location',
        'extras',
        'drop_off_instruction',
        'pickup_instruction',
    ];
}