<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Scheme extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'schemes';
    protected $guarded = [];
}
