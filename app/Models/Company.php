<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    use HasUuids;

    protected $fillable = [
        'name',
        'address',
        'postal_code',
        'city',
        'state',
        'country',
        'tin',
        'contact_name',
        'contact_phone',
        'contact_email',
        'logo',
    ];

    public function getLogoAttribute($value): string
    {
        if(!$value) {
            return asset('default/404.png');
        }
        return $value;
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class,'company_id');
    }
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class,'company_id');
    }

}
