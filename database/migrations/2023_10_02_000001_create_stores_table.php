<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name', 40);
            $table->string('slug', 50)->unique();
            $table->string('phone', 20);
            $table->string('hours', 11);
            $table->boolean('active');
            $table->string('services')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};