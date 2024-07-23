<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;
    protected $fillable = ['driver_id', 'form_id', 'field_data', 'status'];

    protected $casts = [
        'field_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

   public function isComplete()
{
    $form = $this->form;
    $fields = is_string($form->fields) ? json_decode($form->fields, true) : $form->fields;

    foreach ($fields as $field) {
        // Check if 'required' key exists and is set to true
        if (isset($field['required']) && $field['required'] && !isset($this->field_data[$field['fieldName']])) {
            return false;
        }
    }

    return true;
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
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

}
