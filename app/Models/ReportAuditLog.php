<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ReportAuditLog extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'report_audit_logs';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
