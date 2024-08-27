<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryData extends Model
{
    use HasFactory;
    protected $fillable = [
        'driver_id',
        'driver_form_id',
        'hire',
        'reason',
        'vehicle',
        'vehicle_out',
        'personal_details',
        'payment',
        'payment_date',
        'hirer_insurance'
    ];
    protected $casts = [
        'hire' => 'array',
        'reason' => 'array',
        'vehicle' => 'array',
        'vehicle_out' => 'array',
        'personal_details' => 'array',
        'payment' => 'array',
        'payment_date' => 'array',
        'hire_insurance' => 'array',
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

}
