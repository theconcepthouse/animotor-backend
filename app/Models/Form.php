<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'state', 'status', 'fields'];

    protected $casts = [
        'fields' => 'array',
    ];

    public function formData()
    {
        return $this->hasMany(FormData::class);
    }

    public function isComplete()
{
    // Decode fields if they are stored as JSON
    $fields = is_string($this->fields) ? json_decode($this->fields, true) : $this->fields;

    if (!is_array($fields)) {
        // Handle unexpected structure
        return 'Pending';
    }

    $totalFields = count($fields);
    $filledFields = 0;

    // Get the latest form data for this form
    $formData = $this->formData()->latest()->first();

    if (!$formData) {
        // No form data available
        return '<span class="badge badge-sm badge-dim bg-outline-warning ">Pending</span>';
    }

    foreach ($fields as $field) {
        if (isset($field['fieldName']) && isset($field['required'])) {
            if ($field['required'] && !empty($formData->field_data[$field['fieldName']])) {
                $filledFields++;
            }
        } else {
            // Handle missing keys
            return '<span class="badge badge-sm badge-dim bg-outline-warning ">Pending</span>';
        }
    }

    if ($filledFields === 0) {
        return '<span class="badge badge-sm badge-dim bg-outline-warning ">Pending</span>';
    } elseif ($filledFields < $totalFields) {
        return '<span class="badge badge-sm badge-danger ">Partially Filled</span>';
    } else {
        return '<span class="badge bg-success badge-success ">Completed</span>';
    }
}


    public function status()
    {
        if ($this->status === "Pending")
        {
            return '<span class="badge badge-sm badge-dim bg-outline-warning ">Pending</span>';
        }elseif ($this->status === "In-Progress"){
            return '<span class="badge badge-sm badge-danger ">In Progress</span>';
        }elseif ($this->status > 1){
            return '<span class="badge badge-sm badge-success ">Completed</span>';
        }
        return '<span class="badge badge-sm badge-danger ">None</span>';
    }


}
