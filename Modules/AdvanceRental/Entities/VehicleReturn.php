<?php

namespace Modules\AdvanceRental\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleReturn extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'booking_id',
        'car_id',
        'booking_id',
        'return_date_time',
        'reason',
        'status',
    ];

    protected static function newFactory()
    {
        return \Modules\AdvanceRental\Database\factories\VehicleReturnFactory::new();
    }
}
