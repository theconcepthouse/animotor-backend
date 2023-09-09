<?php

namespace Modules\AdvanceRental\Entities;

use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incident extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'booking_id',
        'owner_name',
        'company_id',
        'user_id',
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


    public function getWitnessesAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }
    public function setWitnessesAttribute($value)
    {
        $this->attributes['Witnesses'] = json_encode($value);
    }


    public function getThirdPartyAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }
    public function setThirdPartyAttribute($value)
    {
        $this->attributes['third_party'] = json_encode($value);
    }


    public function getPoliceDetailsAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }
    public function setPoliceDetailsAttribute($value)
    {
        $this->attributes['police_details'] = json_encode($value);
    }

    public function getAccidentDetailsAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }
    public function setAccidentDetailsAttribute($value)
    {
        $this->attributes['accident_details'] = json_encode($value);
    }

    public function getWeatherAttribute($value)
    {
        if(!$value){ return [];}
        return json_decode($value, true);
    }
    public function setWeatherAttribute($value)
    {
        $this->attributes['weather'] = json_encode($value);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }


//    public function getDiagramsAttribute($value)
//    {
//        if(!$value){ return [];}
//        return json_decode($value, true);
//    }
//    public function setDiagramsAttribute($value)
//    {
//        $this->attributes['diagrams'] = json_encode($value);
//    }




    protected static function newFactory()
    {
        return \Modules\AdvanceRental\Database\factories\IncidentFactory::new();
    }
}
