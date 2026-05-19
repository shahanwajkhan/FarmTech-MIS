<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class FpoOrder extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'orders';
    protected $guarded = [];
}
