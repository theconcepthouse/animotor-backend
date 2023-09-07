<?php

namespace Modules\AdvanceRental\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleInspection extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'car_id',
        'booking_id',
        'status',
        'inspections',
    ];

    public function getInspectionsAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }

    public function setInspectionsAttribute($value)
    {
        $this->attributes['inspections'] = json_encode($value);
    }



    protected static function newFactory()
    {
        return \Modules\AdvanceRental\Database\factories\VehicleInspectionFactory::new();
    }
}
