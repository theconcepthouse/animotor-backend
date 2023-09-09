<?php

namespace Modules\AdvanceRental\Entities;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarDamageReport extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'car_id',
        'booking_id',
        'company_id',
        'return_id',
        'any_damage',
        'damaged_panel',
        'damage_type',
        'alloy_wheels_damage',
        'alloy_damages',
        'windscreen_damage',
        'windscreen_damages',
        'mirror_damage',
        'mirror_damages',
        'warning_lights',
        'lights_on',
        'seat_damage',
        'seat_damages',
        'clean_exterior',
        'exterior_images',
        'handbook',
        'handbook_images',
        'spare_wheel',
        'fuel_cap',
        'aeriel',
        'floor_mat',
        'tools',
        'images',
        'spare_wheel_images',
        'spare_wheel_description',
        'fuel_cap_images',
        'fuel_cap_description',
        'floor_mat_images',
        'floor_mat_description',
        'aerial_images',
        'aerial_description',
        'tools_images',
        'tools_description',
    ];


    public function getAlloyDamagesAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function setAlloyDamagesAttribute($value)
    {
        $this->attributes['alloy_damages'] = json_encode($value);
    }



    public function getWindscreenDamagesAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function setWindscreenDamagesAttribute($value)
    {
        $this->attributes['windscreen_damages'] = json_encode($value);
    }

    public function getMirrorDamagesAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function setMirrorDamagesAttribute($value)
    {
        $this->attributes['mirror_damages'] = json_encode($value);
    }

    public function getLightsOnAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function setLightsOnAttribute($value)
    {
        $this->attributes['lights_on'] = json_encode($value);
    }

    public function getSeatDamagesAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function setSeatDamagesAttribute($value)
    {
        $this->attributes['seat_damages'] = json_encode($value);
    }

    public function getExteriorImagesAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }

    public function setExteriorImagesAttribute($value)
    {
        $this->attributes['exterior_images'] = json_encode($value);
    }


    public function getHandbookImagesAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }

    public function setHandbookImagesAttribute($value)
    {
        $this->attributes['handbook_images'] = json_encode($value);
    }

    public function getImagesAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

    public function getSpareWheelImagesAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }

    public function setSpareWheelImagesAttribute($value)
    {
        $this->attributes['spare_wheel_images'] = json_encode($value);
    }

    public function getFuelCapImagesAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }

    public function setFuelCapImagesAttribute($value)
    {
        $this->attributes['fuel_cap_images'] = json_encode($value);
    }


    public function getFloorMatImagesAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }

    public function setFloorMatImagesAttribute($value)
    {
        $this->attributes['floor_mat_images'] = json_encode($value);
    }

    public function getAerialImagesAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }

    public function setAerialImagesAttribute($value)
    {
        $this->attributes['aerial_images'] = json_encode($value);
    }

    public function getToolsImagesAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }

    public function setToolsImagesAttribute($value)
    {
        $this->attributes['tools_images'] = json_encode($value);
    }


    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }


    protected static function newFactory()
    {
        return \Modules\AdvanceRental\Database\factories\CarDamageReportFactory::new();
    }
}
