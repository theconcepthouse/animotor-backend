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
        Schema::create('driver_pcns', function (Blueprint $table) {
            $table->uuid('id')->primary();
             $table->uuid('driver_id');
             $table->date('date_post_received')->nullable();
            $table->string('vrm')->nullable();
            $table->string('pcn_no')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->date('date_of_contravention')->nullable();
            $table->date('deadline_date')->nullable();
            $table->string('issuing_authority')->nullable();
            $table->string('priority')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->nullable();

             $table->longText('report')->nullable();
             $table->string('linkup_with_driver')->nullable();
            $table->string('linkup_with_vehicle_registration_no')->nullable();
            $table->string('notify_to_driver')->nullable();
            $table->string('notify_to_staff_member')->nullable();
            $table->string('notify_to_other')->nullable();
            $table->string('reminder')->nullable();

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
        Schema::dropIfExists('driver_pcns');
    }
};
