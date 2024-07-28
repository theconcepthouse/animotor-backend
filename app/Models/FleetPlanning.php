<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetPlanning extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_name',
        'description',
        'start_date',
        'end_date',
        'duration',
        'location_name',
        'location_address',
        'guests',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'guests' => 'array',
    ];

}
