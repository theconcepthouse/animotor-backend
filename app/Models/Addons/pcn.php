<?php

namespace App\Models\Addons;

use App\Models\Booking;
use App\Models\Car;
use App\Traits\FillableTraits;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pcn extends Model
{
    use HasFactory, FillableTraits, HasUuids;

    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = $this->pcns;
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

}
