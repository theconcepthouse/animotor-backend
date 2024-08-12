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
        Schema::table('driver_documents', function (Blueprint $table) {
            $table->string('driver_license_front')->nullable();
            $table->string('driver_license_back')->nullable();
            $table->string('proof_of_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('driver_documents', function (Blueprint $table) {
           $table->dropColumn(['driver_license_front', 'driver_license_back', 'proof_of_address']);
        });
    }
};
