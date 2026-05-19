<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Farmer extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'farmers';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
