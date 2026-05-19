<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Shg extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'shgs';

    protected $fillable = [
        'user_id',
        'shg_name',
        'registration_number',
        'formation_year',
        'members_count',
        'shg_category',
        'leader_name',
        'mobile',
        'email',
        'state',
        'district',
        'village',
        'address',
        'pincode',
        'main_activity',
        'products',
        'bank_linkage',
        'bank_name',
        'account_number',
        'ifsc_code',
        'women_led',
        'government_registered',
        'training_completed',
        'documents',
        'group_photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
