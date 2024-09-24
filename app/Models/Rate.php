<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_item',
        'payment_name',
        'payment_unit',
        'payment_price',
        'payment_paid',
        'item',
        'item_2',
        'unit',
        'rate',
        'price',
        'driver_id'
    ];

     protected $casts = [

    ];
}
