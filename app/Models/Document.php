<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    use HasUuids;


    protected $fillable = [
        'name',
        'is_required',
        'has_expiry_date',
        'has_id_number',
        'status',
    ];

    protected $casts = [
        'is_required' => 'bool',
        'has_expiry_date' => 'bool',
        'status' => 'bool',
    ];


}
