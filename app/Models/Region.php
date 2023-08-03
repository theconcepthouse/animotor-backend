<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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


    public function scopeByCountryId($query, $countryId)
    {
        return $query->where('country_id', $countryId);
    }

}
