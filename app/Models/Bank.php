<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = [
        'user_id',
        'bank_name',
        'holder_name',
        'bank_code',
        'account_number'
    ];


}
