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
        Schema::create('report_incidents', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no')->nullable();
            $table->string('status')->nullable();
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('driver_license_issuing_country')->nullable();
            $table->string('driver_license_number')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();

            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();

            $table->string('registration_number')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('color_of_vehicle')->nullable();
            $table->string('number_of_passengers')->nullable();

            $table->string('insurer')->nullable();
            $table->string('type_of_cover')->nullable();
            $table->string('policy_number')->nullable();
            $table->string('owner')->nullable();
            $table->text('tp_vehicle_damage_description')->nullable();
            $table->text('tp_party_damage_description')->nullable();

            $table->date('damage_type')->nullable();
            $table->date('accident_date')->nullable();
            $table->time('accident_time')->nullable();
            $table->text('accident_location')->nullable();
            $table->string('accident_impact_point')->nullable();
            $table->text('accident_description')->nullable();
            $table->string('driver_vehicle_image')->nullable();
            $table->string('tp_vehicle_image')->nullable();
            $table->string('location_vehicle_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_incidents');
    }
};
