<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mongodb';

    public function up(): void
    {
        Schema::create('soil_test_reports', function (Blueprint $collection) {
            $collection->index('user_id');
            $collection->index('farmer_id');
            $collection->index('analyzed_at');
        });

        Schema::create('scheme_applications', function (Blueprint $collection) {
            $collection->index('user_id');
            $collection->index('farmer_id');
            $collection->index('scheme_name');
            $collection->index('applied_at');
        });

        Schema::create('report_audit_logs', function (Blueprint $collection) {
            $collection->index('user_id');
            $collection->index('downloaded_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soil_test_reports');
        Schema::dropIfExists('scheme_applications');
        Schema::dropIfExists('report_audit_logs');
    }
};
