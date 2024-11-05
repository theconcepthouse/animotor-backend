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
        'notify_to_driver',
        'notify_to_staff_member',
        'notify_to_other',
        'reminder'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }



}
