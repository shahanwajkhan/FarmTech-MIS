<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ShgTraining extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'training';
    protected $guarded = [];
}
