<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mongodb';

    public function up(): void
    {
        Schema::create('shgs', function (Blueprint $collection) {
            $collection->index('user_id');
            $collection->unique('shg_name');
            $collection->unique('registration_number');
            $collection->index('mobile');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shgs');
    }
};
