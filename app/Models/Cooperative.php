<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Cooperative extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'cooperatives';
    protected $guarded = [];
}
