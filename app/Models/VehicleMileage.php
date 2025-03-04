<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMileage extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_id', 'car_id', 'booking_id', 'mileage', 'status'];

    protected $casts = [
        'mileage' => 'array'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

}
