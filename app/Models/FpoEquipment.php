<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class FpoEquipment extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'equipment';
    protected $guarded = [];
}
