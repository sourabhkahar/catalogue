<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'retail_price',
        'trade_price',
        'saved_amount',
        'sku',
        'tag_id',
    ];

    public function tag()
    {
        return $this->hasOne(tag::class,'id', 'tag_id');
    }
}
