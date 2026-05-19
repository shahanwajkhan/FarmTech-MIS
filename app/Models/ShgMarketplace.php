<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ShgMarketplace extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'marketplace';
    protected $guarded = [];
}
