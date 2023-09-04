<?php

namespace Modules\AdvanceRental\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'owner_name',
        'title',
        'first_name',
        'last_name',
        'date_of_birth',
        'phone',
        'postal_code',
        'email',
        'address',
        'policy_number',
        'insurer',
        'cover_type',
        'witnesses',
        'third_party',
        'police_details',
        'accident_details',
        'weather',
        'diagrams',
        'date',
        'signature',
    ];

    protected static function newFactory()
    {
        return \Modules\AdvanceRental\Database\factories\IncidentFactory::new();
    }
}
