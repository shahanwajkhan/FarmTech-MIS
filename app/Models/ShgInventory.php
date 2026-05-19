<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ShgInventory extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'inventory';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(ShgProduct::class, 'product_id');
    }
}
