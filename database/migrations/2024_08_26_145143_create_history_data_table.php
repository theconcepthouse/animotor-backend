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
        Schema::create('history_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('driver_form_id')->constrained('driver_forms')->onDelete('cascade');

            $table->json('hire')->nullable();
            $table->json('reason')->nullable();
            $table->json('vehicle')->nullable();
            $table->json('vehicle_out')->nullable();
            $table->json('personal_details')->nullable();
             $table->json('payment_date')->nullable();
            $table->json('payment')->nullable();
            $table->json('hirer_insurance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_data');
    }
};