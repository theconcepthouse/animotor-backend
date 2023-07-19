<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    use HasUuids;

    protected $fillable = ['title','path','content','template','meta','image','type'];

    public function contents(): HasMany
    {
        return $this->hasMany(PageContent::class);
    }


}
