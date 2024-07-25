<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = ['driver_id', 'form_data_id', 'changes'];
    protected $casts = [
        'changes' => 'array',
    ];


   public function formData()
    {
        return $this->belongsTo(FormData::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
