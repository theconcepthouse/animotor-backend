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
        Schema::table('driver_pcns', function (Blueprint $table) {
           $table->uuid('driver_id')->nullable()->change();
           $table->uuid('vehicle_id')->nullable();
           $table->string('offence_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('driver_pcns', function (Blueprint $table) {
            $table->uuid('driver_id')->nullable(false)->change();
            $table->dropColumn('vehicle_id', 'offence_type');
        });
    }
};
