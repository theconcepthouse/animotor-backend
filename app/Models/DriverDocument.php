<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'document_id',
        'file',
        'status',
        'comment',
        'is_approved',
        'expiry_date',
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
