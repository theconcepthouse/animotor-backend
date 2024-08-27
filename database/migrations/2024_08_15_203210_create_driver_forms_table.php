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
        Schema::create('driver_forms', function (Blueprint $table) {
            $table->id();
//            $table->uuid('id')->primary();
            $table->uuid('driver_id');
            $table->string('name');
            $table->string('status')->nullable();
            $table->string('sending_method')->nullable();
            $table->string('state')->nullable();
            $table->integer('action')->nullable();

            $table->json('personal_details')->nullable();
            $table->json('vehicle')->nullable();
            $table->json('rate')->nullable();
            $table->json('charges')->nullable();
            $table->json('address')->nullable();
            $table->json('signature')->nullable();
            $table->json('declaration')->nullable();
            $table->json('additional_fee')->nullable();
            $table->json('hirer_insurance')->nullable();
            $table->json('fleet_insurance')->nullable();
            $table->json('documents')->nullable();
            $table->json('drivers_license')->nullable();
            $table->json('taxi_license')->nullable();
            $table->json('claim')->nullable();
            $table->json('convictions')->nullable();
            $table->json('level_of_cover')->nullable();
            $table->json('supporting_documents')->nullable();
            $table->json('client_details')->nullable();
            $table->json('bodywork')->nullable();
            $table->json('damage_assessment')->nullable();
            $table->json('wheels_tyres')->nullable();
            $table->json('windscreens')->nullable();
            $table->json('mirrors')->nullable();
            $table->json('dash')->nullable();
            $table->json('interior')->nullable();
            $table->json('exterior')->nullable();
            $table->json('handbook')->nullable();
            $table->json('spare_wheel')->nullable();
            $table->json('fuel_cap')->nullable();
            $table->json('aerial')->nullable();
            $table->json('floor_mats')->nullable();
            $table->json('tools')->nullable();
            $table->json('payment')->nullable();
            $table->json('permission')->nullable();

            $table->json('return_vehicle')->nullable();
            $table->json('report_vehicle')->nullable();
            $table->json('report_accident')->nullable();
            $table->json('change_address')->nullable();
            $table->json('monthly_maintenance')->nullable();
            $table->json('mileage')->nullable();

            $table->foreign('driver_id')->references('id')->on('users')
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
        Schema::dropIfExists('driver_forms');
    }
};
