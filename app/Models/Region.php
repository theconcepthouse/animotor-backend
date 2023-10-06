<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MatanYadaev\EloquentSpatial\Objects\Polygon;

class Region extends Model
{
    use HasFactory;
    use HasUuids;


    protected $fillable = [
        'name',
        'currency_code',
        'currency_symbol',
        'timezone',
        'is_active',
        'parent_id',
        'country_id',
        'coordinates',
        'image',
    ];

    protected $casts = [
        'is_active' => 'bool',
        'coordinates' => Polygon::class,
    ];

    protected $with = ['country'];

    public function regions(){
        return $this->hasMany(Region::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Region::class, 'parent_id');
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeContains($query,$abc){
        return $query->whereRaw("ST_Distance_Sphere(coordinates, POINT({$abc}))");
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function scopeByParentId($query, $regionId)
    {
        return $query->where('parent_id', $regionId);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', true);
    }


    public function getImageAttribute($value): string
    {
        if(!$value) {
            return asset('default/404.png');
        }
        return $value;
    }

    public function scopeByCountryId($query, $countryId)
    {
        return $query->where('country_id', $countryId);
    }

}
