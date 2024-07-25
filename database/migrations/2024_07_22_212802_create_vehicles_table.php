<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
//            $table->id();
            $table->uuid('id')->primary();
            $table->uuid('driver_id')->nullable();
            $table->string('title')->nullable();
            $table->string('make')->nullable();
            $table->boolean('is_available')->default(true);
            $table->decimal('price_per_day')->default(10);
            $table->string('model')->nullable();
            $table->string('type')->nullable();
            $table->string('year')->nullable();
            $table->string('color')->nullable();
            $table->string('gear')->nullable();
            $table->integer('door')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
