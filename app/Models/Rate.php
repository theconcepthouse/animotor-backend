<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'amount',
        'milage_limit',
        'milage_limit_type',
        'milage_limit_value',
        'excess_milage_fee',
        'lost_damaged_key_charges',
        'vehicle_recovery_charges',
        'accident_non_fault_excess_fee',
        'accident_fault_based_excess_fee',
        'late_payment_per_day',
        'admin_charge_for_pcn_ticket',
        'admin_charge_for_speeding_ticket',
        'admin_charge_for_bus_lane_tickets',
        'returning_vehicle_dirty_minor',
        'returning_vehicle_dirty_major',
        'repossession_personal_visit_minimum',
        'items',
        'other_items',
        'subtotal',
        'total_paid',
        'total_due',
        'driver_id'
    ];
     protected $casts = [
        'items' => 'array',
        'other_items' => 'array'
    ];
}
