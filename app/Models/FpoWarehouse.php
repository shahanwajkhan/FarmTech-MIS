<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class FpoWarehouse extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'warehouse';
    protected $guarded = [];
}
