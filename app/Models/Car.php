<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    use HasUuids;


    protected $fillable = [
        'driver_id',
        'title',
        'make',
        'model',
        'type',
        'year',
        'color',
        'gear',
        'door',
        'vehicle_no',
        'region_id',
        'is_available',

        'rental_packages',
        'image',

        'country',
        'state',
        'city',
        'price_per_day',
    ];

    protected $appends = ['includes','why','details'];

    public function getIncludesAttribute(): array
    {
        return [
            'Free cancellation up to 48 hours before pick-up',
            'Collision Damage Waiver with US$0 excess',
            'Theft Protection with US$0 excess',
            'Unlimited mileage'
        ];
    }
    public function getWhyAttribute(): array
    {
        return [
            "Customer rating: 8.0 / 10",
            'Most popular fuel policy',
            'Short queues',
            'Easy to find counter',
            'Helpful counter staff',
            'Free Cancellation'
        ];
    }

    public function getDetailsAttribute(): array
    {
        return [
            ['icon' => asset('icon/car/person.png'), 'item' => $this->door . ' Doors'],
            ['icon' => asset('icon/car/gear.png'), 'item' => $this->gear . ' Gear'],
            ['icon' => asset('icon/car/color.png'), 'item' => $this->color . ' Color'],
            ['icon' => asset('icon/car/year.png'), 'item' => "Year : ". $this->year],
        ];
    }

    public function getImageAttribute($value): string
    {
        if(!$value) {
            return asset('default/404.png');
        }
        return $value;
    }

}
