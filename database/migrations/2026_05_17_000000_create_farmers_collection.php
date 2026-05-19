<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mongodb';

    public function up(): void
    {
        Schema::create('farmers', function (Blueprint $collection) {
            $collection->index('user_id');
            $collection->index('mobile');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
