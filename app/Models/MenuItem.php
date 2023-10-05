<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'label','url','icon','icon_type','menu_id','parent_id'
    ];

    public function menus(): HasMany
    {
        return $this->hasMany(MenuItem::class,'parent_id');
    }
}
