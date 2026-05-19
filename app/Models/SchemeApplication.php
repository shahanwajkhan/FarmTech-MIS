<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class SchemeApplication extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'scheme_applications';
    protected $guarded = [];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
