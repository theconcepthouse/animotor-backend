<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDamageReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'any_damage',
        'damaged_panel',
        'damage_type',
        'alloy_wheels_damage',
        'alloy_damages',
        'windscreen_damage',
        'windscreen_damages',
        'mirror_damage',
        'mirror_damages',
        'warning_lights',
        'lights_on',
        'seat_damage',
        'seat_damages',
        'clean_exterior',
        'exterior_images',
        'handbook',
        'handbook_images',
        'spare_wheel',
        'fuel_cap',
        'aeriel',
        'floor_mat',
        'tools',
        'images',
    ];
}
