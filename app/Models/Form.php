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
