<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $connection = 'mongodb';

    public function up(): void
    {
        Schema::create('users', function (Blueprint $collection) {
            $collection->unique('email');
            $collection->unique('mobile');
        });

        Schema::create('password_reset_tokens', function (Blueprint $collection) {
            $collection->index('email');
            $collection->index('token');
        });

        Schema::create('sessions', function (Blueprint $collection) {
            $collection->index('user_id');
            $collection->index('last_activity');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
