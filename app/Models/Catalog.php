<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'layout_type',
        'brand_color',
        'description',
        'is_publish',
        'status',
    ];
}
