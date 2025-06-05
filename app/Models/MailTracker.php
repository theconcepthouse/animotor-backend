<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTracker extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail_tracker', 'details', 'status', 'user_id'
    ];

    protected $casts = [
        'mail_tracker' => 'array',  // Cast the JSON column to an array
        'details' => 'array'
    ];

}
