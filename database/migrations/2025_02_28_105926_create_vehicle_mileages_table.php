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
        Schema::create('vehicle_mileages', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->uuid('user_id');
            $table->uuid('car_id');
            $table->uuid('booking_id');
            $table->string('status')->default('pending');
            $table->json('mileage')->nullable();

            $table->foreign('car_id')->references('id')->on('cars')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('booking_id')->references('id')->on('bookings')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_mileages');
    }
};
