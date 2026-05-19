<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ForumPost extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'forum_posts';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
