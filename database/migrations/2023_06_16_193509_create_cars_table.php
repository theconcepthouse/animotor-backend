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
        Schema::create('cars', function (Blueprint $table) {
//            $table->id();
            $table->uuid('id')->primary();

            $table->uuid('driver_id');
            $table->string('title')->nullable();
            $table->string('make')->nullable();
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
        Schema::dropIfExists('cars');
    }
};
