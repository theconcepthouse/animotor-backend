<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyRepair extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['repairs', 'monthly_maintenaces_id'];

    protected $casts = [
        'repairs' => 'array',
    ];


}
