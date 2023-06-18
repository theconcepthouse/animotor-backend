<?php

namespace App\Models;

use Laratrust\Models\Role as RoleModel;

class Role extends RoleModel
{
    public $guarded = [];

    protected $fillable = [
        'name',
        'currency_code',
        'currency_symbol',
        'timezone',
        'is_active',
        'coordinates',
    ];
}
