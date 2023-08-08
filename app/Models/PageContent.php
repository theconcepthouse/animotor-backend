<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    use HasUuids;

    protected $fillable = ['title','content','page_id','level','is_shortcode'];
}
