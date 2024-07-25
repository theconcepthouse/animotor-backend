<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';

    protected $fillable = ['title', 'message', 'status', 'read', 'driver_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function status()
    {
        if ($this->status == 0)
        {
            return "<span class='btn btn-dim btn-outline-warning btn-round'>Pending</span>";
        }elseif ($this->status == 1)
        {
            return "<span class='btn btn-dim btn-outline-warning btn-round'>Open</span>";
        }elseif ($this->status == 2)
        {
            return "<span class='btn btn-dim btn-outline-warning btn-round'>Normal</span>";
        }elseif ($this->status == 3)
        {
            return "<span class='btn btn-dim btn-outline-warning btn-round'>Urgent</span>";
        }
        return "Not Set";
    }
    public function minStatus()
    {
        if ($this->status == 0)
        {
            return "<span class='btn btn-xs btn-success btn-dim'>Open</span>";
        }elseif ($this->status == 1)
        {
            return "<span class='btn btn-xs btn-primary btn-dim'>Normal</span>";
        }elseif ($this->status == 2)
        {
            return "<span class='btn btn-xs btn-warning btn-dim'>Urgent</span>";
        }elseif ($this->status == 3)
        {
            return "<span class='btn btn-xs btn-danger btn-dim'>Close</span>";
        }
        return "Not Set";
    }
}
