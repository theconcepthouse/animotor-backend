<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = ['driver_id', 'driver_form_id', 'changes'];
    protected $casts = [
        'changes' => 'array',
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

}
