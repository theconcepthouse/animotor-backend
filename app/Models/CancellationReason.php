<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancellationReason extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_type',
        'reason',
        'is_active',
    ];
}
