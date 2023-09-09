<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_defects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('car_id');
            $table->uuid('booking_id')->nullable();
            $table->uuid('company_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->date('date')->nullable();
            $table->string('location_of_vehicle')->nullable();
            $table->string('postal_code')->nullable();
            $table->longText('location_of_defect')->nullable();
            $table->text('impact')->nullable();
            $table->text('description')->nullable();
            $table->text('actions_taken')->nullable();
            $table->text('recommendations')->nullable();
            $table->text('witnesses')->nullable();
            $table->text('reporter_name')->nullable();
            $table->text('reporter_phone')->nullable();
            $table->text('reporter_email')->nullable();
            $table->string('severity')->comment('low, high, medium')->nullable();
            $table->string('status')->comment('open, closed, assigned')->default('open');

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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_defects');
    }
};
