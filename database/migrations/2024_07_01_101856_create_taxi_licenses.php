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
        Schema::create('taxi_licenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id');
            $table->string('taxi_license_number')->nullable();
            $table->string('taxi_issuing_authority')->nullable();
            $table->date('issuing_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('license_type')->nullable();
            $table->string('operator_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxi_licenses');
    }
};
