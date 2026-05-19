<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class CropPool extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'crop_pools';
    protected $guarded = [];
}
