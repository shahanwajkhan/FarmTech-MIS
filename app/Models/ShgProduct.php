<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ShgProduct extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'products';
    protected $guarded = [];
}
