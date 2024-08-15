<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverDocument extends Model
{
    use HasFactory;
    use HasUuids;


    protected $fillable = [
        'driver_id',
        'document_id',
        'file',
        'status',
        'comment',
        'is_approved',
        'expiry_date',

        'driving_license_number',
        'type_of_license_held',
        'license_issue_date',
        'license_expiry_date',
        'driving_test_pass_date',
        'national_insurance_number',
        'taxi_number',
        'dvla_check_code',
        'issuing_authority',
        'driver_license_front',
        'driver_license_back',
        'proof_of_address',
    ];

    protected $appends = ['color'];

    protected $with = ['document'];

    public function getStatusAttribute($value): string
    {
        if(!$value){
            return 'not uploaded';
        }
        return $value;
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function getColorAttribute(): string
    {
        $status = $this->status;
        if($status == 'not uploaded'){
            return 'bg-danger';
        }
        if($status == 'approved'){
            return 'bg-success';
        }
        return 'bg-warning';
    }
}
