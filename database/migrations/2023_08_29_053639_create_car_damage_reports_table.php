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
        Schema::create('car_damage_reports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('car_id');
            $table->boolean('any_damage')->default(true);
            $table->integer('damaged_panel')->default(0);
            $table->string('damage_type')->nullable();
            $table->boolean('alloy_wheels_damage')->default(true);
            $table->json('alloy_damages')->nullable();
            $table->boolean('windscreen_damage')->default(true);
            $table->json('windscreen_damages')->nullable();
            $table->boolean('mirror_damage')->default(true);
            $table->json('mirror_damages')->nullable();
            $table->json('warning_lights')->nullable();
            $table->json('lights_on')->nullable();
            $table->boolean('seat_damage')->default(true);
            $table->json('seat_damages')->nullable();
            $table->boolean('clean_exterior')->default(true);
            $table->json('exterior_images')->nullable();
            $table->boolean('handbook')->default(true);
            $table->json('handbook_images')->nullable();
            $table->boolean('spare_wheel')->default(true);
            $table->boolean('fuel_cap')->default(true);
            $table->boolean('aeriel')->default(true);
            $table->boolean('floor_mat')->default(true);
            $table->boolean('tools')->default(true);
            $table->json('images')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_damage_reports');
    }
};
