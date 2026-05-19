<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class FpoLogistics extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'logistics';
    protected $guarded = [];
}
