<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends \Bavix\Wallet\Models\Transaction
{
    use HasFactory;

    protected $appends = ['created_date','description'];

    public function getCreatedDateAttribute(): string
    {
        $created_at = Carbon::parse($this->created_at);
        return $created_at->format('Y-m-d H:i:s');
    }
    public function getDescriptionAttribute()
    {
        return $this->meta['description'] ?? '';
    }
}
