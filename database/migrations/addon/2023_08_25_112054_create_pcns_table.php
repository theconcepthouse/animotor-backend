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
        Schema::create('pcns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('vrm')->nullable();
            $table->uuid('car_id');
            $table->uuid('booking_id');
            $table->string('pcn_no')->nullable();
            $table->dateTime('date_time')->nullable();
            $table->string('offence_type')->nullable();
            $table->string('location')->nullable();
            $table->date('notice_issue_date')->nullable();
            $table->date('payment_dead_line')->nullable();
            $table->date('appeal_dead_line')->nullable();
            $table->string('status')->default('pending');
            $table->json('histories')->nullable();
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('car_id')->references('id')->on('cars')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcns');
    }
};
