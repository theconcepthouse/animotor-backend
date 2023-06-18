<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'title',
        'make',
        'model',
        'type',
        'year',
        'color',
        'gear',
        'door',
        'vehicle_no',
        'image',
    ];
}
