<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->cascadeOnDelete();
            $table->string('street');
            $table->string('city', 100);
            $table->string('zip', 10);
            $table->string('state', 100);
            $table->string('lat', 15);
            $table->string('long', 15);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
