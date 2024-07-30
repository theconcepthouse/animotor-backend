<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'location', 'category', 'start_date', 'end_date'
    ];

    protected $dates = [
        'start_date', 'end_date'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'guests' => 'array',
    ];

}
