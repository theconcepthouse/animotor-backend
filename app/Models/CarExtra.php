<?php

namespace App\Models;

use App\Traits\FillableTraits;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarExtra extends Model
{
    use HasFactory, FillableTraits;
    use HasUuids;

    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = $this->car_extra;
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }


    public function getMotsAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }


    public function getServiceAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }
    public function getDamageHistoryAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function setDamageHistoryAttribute($value)
    {
        $this->attributes['damage_history'] = json_encode($value);
    }

    public function getRepairsAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function setRepairsAttribute($value)
    {
        $this->attributes['repairs'] = json_encode($value);
    }

    public function getDocumentsAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function setDocumentsAttribute($value)
    {
        $this->attributes['documents'] = json_encode($value);
    }

    public function getSubscriptionsAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function setSubscriptionsAttribute($value)
    {
        $this->attributes['subscriptions'] = json_encode($value);
    }

    public function getFinanceAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function setFinanceAttribute($value)
    {
        $this->attributes['finance'] = json_encode($value);
    }

    public function setMotsAttribute($value)
    {
        $this->attributes['mots'] = json_encode($value);
    }


    public function setServiceAttribute($value)
    {
        $this->attributes['service'] = json_encode($value);
    }

}
