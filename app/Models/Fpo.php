<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Fpo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'fpos';

    protected $fillable = [
        'user_id',
        'organization_name',
        'registration_number',
        'organization_type',
        'establishment_year',
        'members_count',
        'contact_person',
        'mobile',
        'email',
        'state',
        'district',
        'village',
        'address',
        'pincode',
        'products',
        'business_activity',
        'bank_name',
        'account_number',
        'ifsc_code',
        'women_led',
        'government_registered',
        'organic_certified',
        'documents',
        'logo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
