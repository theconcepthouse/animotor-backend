<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FormData extends Model
{
    use HasFactory;
    protected $fillable = ['driver_id', 'form_id', 'field_data', 'status'];

    protected $casts = [
        'field_data' => 'array',
    ];
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::updating(function ($formData) {
            $originalData = $formData->getOriginal('field_data');
            if ($originalData !== $formData->field_data) {
                History::create([
                    'form_data_id' => $formData->id,
                    'driver_id' => $formData->driver_id,
                    'changes' => json_decode($originalData, true), // Ensure changes are stored as an array
                ]);
            }
        });

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }



    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function newStatus()
    {
        if ($this->status_2 == "new")
        {
            return "<span class='badge bg-warning'>New Form</span>";
        }
        return "<span class='badge bg-success'>Old Form</span>";
    }

}
