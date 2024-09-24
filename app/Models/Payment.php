<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    use HasUuids;

    protected $casts = [
        'items' => 'array',
    ];

     protected $fillable = [
        'driver_id',
        'due_date',
        'amount',
        'received_date',
        'received_amount',
        'balance',
        'late_payment_days',
        'items',
        'name',
        'rate_id',
    ];


}
