<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitor_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45);
            $table->string('session_id', 100);
            $table->string('page')->default('/');
            $table->timestamp('last_seen_at');
            $table->timestamps();

            // Index untuk query cepat
            $table->index(['session_id', 'last_seen_at']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitor_logs');
    }
};

