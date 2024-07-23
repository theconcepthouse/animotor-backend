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
    protected $table = 'p_c_n_s';
//    protected $fillable = [
//        'date_post_received',
//        'from',
//        'pcn_no',
//        'date_of_issue',
//        'date_of_contravention',
//        'deadline_date',
//        'issuing_authority',
//        'priority',
//        'notes',
//        'status',
//        'linkup_with_driver',
//        'linkup_with_vehicle_registration_no',
//        'notify_to_driver',
//        'notify_to_staff_member',
//        'notify_to_other',
//        'reminder'
//    ];

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
