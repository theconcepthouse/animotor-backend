<?php

namespace Modules\AdvanceRental\Entities;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleDefect extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'car_id',
        'booking_id',
        'company_id',
        'user_id',
        'date',
        'location_of_vehicle',
        'postal_code',
        'location_of_defect',
        'impact',
        'description',
        'actions_taken',
        'recommendations',
        'witnesses',
        'reporter_name',
        'reporter_phone',
        'reporter_email',
        'severity',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    protected static function newFactory()
    {
        return \Modules\AdvanceRental\Database\factories\VehicleDefectFactory::new();
    }
}
