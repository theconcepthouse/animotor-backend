<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverPcn extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'driver_id',
        'date_post_received',
        'vrm',
        'pcn_no',
        'date_of_issue',
        'date_of_contravention',
        'deadline_date',
        'issuing_authority',
        'priority',
        'notes',
        'status',
        'linkup_with_driver',
        'linkup_with_vehicle_registration_no',
        'reminder',
        'type',
        'user_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class);
    }


    public function event()
    {
        return $this->hasOne(FleetEvent::class, 'pcn_id');
    }

    // app/Models/DriverPcn.php
    protected static function booted()
    {
        static::deleting(function ($pcn) {
            $pcn->event()->delete();
        });
    }


}
