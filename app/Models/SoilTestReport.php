<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class SoilTestReport extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'soil_test_reports';
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
