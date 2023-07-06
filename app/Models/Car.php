<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    use HasUuids;


    protected $fillable = [
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

        'rental_packages',
        'image',

        'country',
        'state',
        'city',
        'price_per_day',
    ];
}
