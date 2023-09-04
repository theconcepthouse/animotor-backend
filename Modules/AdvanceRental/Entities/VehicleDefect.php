<?php

namespace Modules\AdvanceRental\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleDefect extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'booking_id',
        'date',
        'location_of_vehicle',
        'postal_code',
        'location_of_defect',
        'impact',
        'description',
        'actions_taken',
        'recommendations',
        'witnesses',
        'reporter_name',
        'reporter_phone',
        'reporter_email',
        'severity',
    ];

    protected static function newFactory()
    {
        return \Modules\AdvanceRental\Database\factories\VehicleDefectFactory::new();
    }
}
