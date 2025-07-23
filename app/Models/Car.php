<?php

namespace App\Models;

use App\Models\Addons\pcn;
use App\Traits\FillableTraits;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;
    use HasUuids;


    use FillableTraits;

    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = $this->car;
    }

    protected $with = ['company'];

    protected $casts = [
        'extras' => 'array',
        'driver' => 'array',
        'insurance_coverage' => 'array',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id');
    }

    public function carExtra(): HasOne
    {
        return $this->hasOne(CarExtra::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
    public function pcns(): HasMany
    {
        return $this->hasMany(pcn::class);
    }

    public function getExtrasAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }


    public function setExtrasAttribute($value)
    {
        $this->attributes['extras'] = json_encode($value);
    }


    public function getInsuranceCoverageAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }


    public function setInsuranceCoverageAttribute($value)
    {
        $this->attributes['insurance_coverage'] = json_encode($value);
    }



    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id')
            ->withDefault([
                'name' => settings('site_name'),
                'address' => settings('address'),
                'logo' => settings('front_logo'),
                'contact_phone' => settings('contact_phone'),
                'contact_email' => settings('contact_email'),
            ]);
    }

    protected $appends = ['includes','why','details','photos_array'];

    public function getIncludesAttribute(): array
    {
        return [
            $this->cancellation_fee > 0 ? 'Cancellation Fee : '.amt($this->cancellation_fee) : 'Free cancellation up to 48 hours before pick-up',
            'Collision Damage Waiver',
            'Theft Protection',
            $this->mileage < 1 ? 'Unlimited mileage' : $this->mileage.' mileage per rental'
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

    public function getPhotosArrayAttribute(): array
    {
        $photos = $this->photos;
        return explode(',', $photos);
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

    public function getAttributesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setAttributesAttribute($value)
    {
        $this->attributes['attributes'] = json_encode($value);
    }

    public function getImageAttribute($value): string
    {
        if(!$value) {
            return asset('assets/img/cars/big_car.png');
        }
        return $value;
    }

    public function attributeList(): array
    {
        return [
            ['name' => 'Mileage', 'attribute' => 'mileage'],
            ['name' => 'Color', 'attribute' => 'color'],
            ['name' => 'Engine', 'attribute' => 'engine'],
            // Add more attributes as needed
        ];
    }

    public function requirements(){
        return explode(',', $this->requirements);
    }

}
