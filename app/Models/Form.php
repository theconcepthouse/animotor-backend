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
