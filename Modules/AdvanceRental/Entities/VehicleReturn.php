<?php

namespace Modules\AdvanceRental\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleReturn extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\AdvanceRental\Database\factories\VehicleReturnFactory::new();
    }
}
