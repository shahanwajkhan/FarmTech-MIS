<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Pacs extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'pacs';
    protected $guarded = [];
}
