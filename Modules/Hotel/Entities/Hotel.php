<?php

namespace Modules\Hotel\Entities;

use App\Models\Region;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hotel extends Model
{
    use HasFactory, HasUuids;

    protected $guarded;


    public function getImagesAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }
    public function getFacilitiesAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    protected static function newFactory()
    {
        return \Modules\Hotel\Database\factories\HotelFactory::new();
    }
}
