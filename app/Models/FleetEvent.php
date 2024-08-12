<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'location', 'category', 'start_date', 'end_date'
    ];

    protected $dates = [
        'start_date', 'end_date'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'guests' => 'array',
    ];


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

    public function category()
    {
        switch ($this->category) {
            case 'company-events':
                return 'Company';
            case 'meeting-event':
                return 'Meeting';
            case 'mail-tracker events':
                return 'Mail Tracker';
            case 'PCn-events':
                return 'PCN Event';
            case 'MOT-events':
                return 'MOT Event';
            default:
                return 'Unknown';
        }
    }

}
