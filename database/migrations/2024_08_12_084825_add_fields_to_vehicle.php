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
        Schema::table('vehicles', function (Blueprint $table) {
            $table->json('vehicle_details')->nullable();
            $table->json('transmission')->nullable();
            $table->json('specification')->nullable();
            $table->json('mot')->nullable();
            $table->json('road_tax')->nullable();
            $table->json('service')->nullable();
            $table->json('driver')->nullable();
            $table->json('documents')->nullable();
            $table->json('finance')->nullable();
            $table->json('damage_history')->nullable();
            $table->json('repair')->nullable();
            $table->string('status')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('vehicle_details', 'vehicle_details', 'transmission', 'specification', 'mot',
                'road_tax', 'service', 'driver', 'documents', 'finance', 'damage_history', 'repair', 'status');
        });
    }
};
