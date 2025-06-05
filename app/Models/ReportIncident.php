<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ReportIncident extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'reference_no',
        'title',
        'first_name',
        'last_name',
        'driver_license_issuing_country',
        'driver_license_number',
        'date_of_birth',
        'phone_number',
        'email',
        'address_line_1',
        'address_line_2',
        'city',
        'country',
        'postcode',
        'registration_number',
        'make',
        'model',
        'color_of_vehicle',
        'number_of_passengers',
        'insurer',
        'type_of_cover',
        'policy_number',
        'owner',
        'damage_type',
        'tp_vehicle_damage_description',
        'tp_party_damage_description',
        'accident_date',
        'accident_time',
        'accident_location',
        'accident_impact_point',
        'accident_description',
        'tp_vehicle_image',
        'driver_vehicle_image',
        'location_vehicle_image',
        'user_id',
    ];

    public function status()
    {
        if ($this->status === 'notification'){
            return "<span class='btn btn-sm btn-outline-warning'>Notification</span>";
        }elseif($this->status == "claim-form")
        {
            return "<span class='btn btn-sm btn-outline-success'>Claim Form</span>";
        }elseif($this->status == "doc-pci")
        {
            return "<span class='btn btn-sm btn-outline-secondary'>Doc & PCI</span>";
        }elseif($this->status == "live")
        {
            return "<span class='btn btn-sm btn-outline-danger'>Live</span>";
        }elseif($this->status == "settled")
        {
            return "<span class='btn btn-sm btn-outline-dark'>Settled</span>";
        }else{
            return "<span class='btn btn-sm btn-outline-info'>Pending</span>";
        }

    }

}
