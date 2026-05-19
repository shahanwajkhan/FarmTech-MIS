<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ChatbotHistory extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chatbot';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
