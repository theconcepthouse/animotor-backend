<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'driver_id',
        'name',
        'status',
        'sending_method',
        'state',
        'action',
        'personal_details',
        'vehicle',
        'rate',
        'rate_total',
        'charges',
        'address',
        'signature',
        'declaration',
        'additional_fee',
        'hirer_insurance',
        'fleet_insurance',
        'documents',
        'drivers_license',
        'taxi_license',
        'claim',
        'convictions',
        'level_of_cover',
        'supporting_documents',
        'client_details',
        'bodywork',
        'damage_assessment',
        'wheels_tyres',
        'windscreens',
        'mirrors',
        'dash',
        'interior',
        'exterior',
        'handbook',
        'spare_wheel',
        'fuel_cap',
        'aerial',
        'floor_mats',
        'tools',
        'payment',
        'permission',

        'return_vehicle',
        'report_vehicle',
        'report_accident',
        'change_address',
        'monthly_maintenance',
        'mileage',
        'hire',
        'reason',
    ];

    protected $casts = [
        'personal_details' => 'array',
        'vehicle' => 'array',
        'rate' => 'array',
        'rate_total' => 'array',
        'charges' => 'array',
        'address' => 'array',
        'signature' => 'array',
        'declaration' => 'array',
        'additional_fee' => 'array',
        'hirer_insurance' => 'array',
        'fleet_insurance' => 'array',
        'documents' => 'array',
        'drivers_license' => 'array',
        'taxi_license' => 'array',
        'claim' => 'array',
        'convictions' => 'array',
        'level_of_cover' => 'array',
        'supporting_documents' => 'array',
        'client_details' => 'array',
        'bodywork' => 'array',
        'damage_assessment' => 'array',
        'wheels_tyres' => 'array',
        'windscreens' => 'array',
        'mirrors' => 'array',
        'dash' => 'array',
        'interior' => 'array',
        'exterior' => 'array',
        'handbook' => 'array',
        'spare_wheel' => 'array',
        'fuel_cap' => 'array',
        'aerial' => 'array',
        'floor_mats' => 'array',
        'tools' => 'array',
        'payment' => 'array',
        'permission' => 'array',
        'return_vehicle' => 'array',
        'report_vehicle' => 'array',
        'report_accident' => 'array',
        'change_address' => 'array',
        'monthly_maintenance' => 'array',
        'mileage' => 'array',
        'hire' => 'array',
        'reason' => 'array',
    ];


    public function status()
    {
        if ($this->status == "pending")
        {
            return '<span class="badge badge-sm badge-dim bg-outline-warning ">Pending <em class="ni ni-edit"></em></span>';
        }elseif ($this->status == "in-progress"){
            return '<span class="badge badge-sm bg-info ">In Progress <em class="ni ni-edit"></em></span>';
        }elseif ($this->status == "completed"){
            return '<span class="badge badge-sm bg-success ">Completed <em class="ni ni-edit"></em></span>';
        }
        return '<span class="badge badge-sm bg-danger ">Not Set</span>';
    }

}
