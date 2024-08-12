<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vehicle extends Model
{
    use HasFactory;

    protected $keyType = 'string'; // Ensures the key type is a string
    public $incrementing = false;  // Disables auto-incrementing as UUIDs are used

    protected $fillable = ['driver_id', 'vehicle_details', 'transmission', 'specification', 'mot', 'road_tax', 'service',
        'driver', 'documents', 'finance', 'damage_history', 'repair'];

    protected $casts = [
        'vehicle_details' => 'array',
        'transmission' => 'array',
        'specification' => 'array',
        'mot' => 'array',
        'road_tax' => 'array',
        'service' => 'array',
        'driver' => 'array',
        'documents' => 'array',
        'finance' => 'array',
        'damage_history' => 'array',
        'repair' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate UUID when creating a new model
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function status()
    {
        if ($this->status == "pending")
        {
            return '<span class="badge badge-sm badge-dim bg-outline-warning ">Pending <em class="ni ni-edit"></em></span>';
        }elseif ($this->status == "in-progress"){
            return '<span class="badge badge-sm bg-info ">In Progress <em class="ni ni-edit"></em></span>';
        }elseif ($this->status == "completed"){
            return '<span class="badge badge-sm bg-success ">Completed <em class="ni ni-edit"></em></span>';
        }
        return '<span class="badge badge-sm bg-danger ">None</span>';
    }

}
