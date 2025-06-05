<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'company_info',
        'branches',
        'contact_persons',
        'document',
        'billing_info',
        'services_products',
        'commissions',
        'user_id',
    ];

    protected $casts = [
        'company_info' => 'array',
        'branches' => 'array',
        'contact_persons' => 'array',
        'document' => 'array',
        'billing_info' => 'array',
        'services_products' => 'array',
        'commissions' => 'array',
    ];
}
