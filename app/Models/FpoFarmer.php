<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class FpoFarmer extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'farmers';
    protected $guarded = [];
}
