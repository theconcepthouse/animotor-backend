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

    public function status()
    {
        if ($this->status == "pending")
        {
            return '<span class="badge badge-sm badge-dim bg-outline-warning ">Pending <em class="ni ni-edit"></em></span>';
        }elseif ($this->status == "approved"){
            return '<span class="badge badge-sm bg-success ">Approved <em class="ni ni-edit"></em></span>';
        }
        return '<span class="badge badge-sm bg-danger ">Not Set</span>';
    }

}
