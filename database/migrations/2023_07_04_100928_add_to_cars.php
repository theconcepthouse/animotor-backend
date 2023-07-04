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
        Schema::table('cars', function (Blueprint $table) {
            $table->uuid('region_id')->nullable();
            $table->text('rental_packages')->nullable();


            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            if (Schema::hasForeign('cars', 'cars_driver_id_foreign')) {
                $table->dropForeign(['driver_id']);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['country','state','city','rental_packages','region_id']);
        });
    }
};
