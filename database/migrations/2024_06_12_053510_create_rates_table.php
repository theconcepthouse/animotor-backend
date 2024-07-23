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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable();
            $table->decimal('amount', 11, 2)->nullable();

            $table->boolean('milage_limit')->nullable();
            $table->enum('milage_limit_type', ['Per day', 'Per week', 'Per month'])->nullable();
            $table->integer('milage_limit_value')->nullable();
            $table->decimal('excess_milage_fee', 8, 2)->nullable();
            $table->decimal('lost_damaged_key_charges', 8, 2)->nullable();
            $table->decimal('vehicle_recovery_charges', 8, 2)->nullable();
            $table->decimal('accident_non_fault_excess_fee', 8, 2)->nullable();
            $table->decimal('accident_fault_based_excess_fee', 8, 2)->nullable();

            $table->decimal('late_payment_per_day', 8, 2)->nullable();
            $table->decimal('admin_charge_for_pcn_ticket', 8, 2)->nullable();
            $table->decimal('admin_charge_for_speeding_ticket', 8, 2)->nullable();
            $table->decimal('admin_charge_for_bus_lane_tickets', 8, 2)->nullable();
            $table->decimal('returning_vehicle_dirty_minor', 8, 2)->nullable();
            $table->decimal('returning_vehicle_dirty_major', 8, 2)->nullable();
            $table->decimal('repossession_personal_visit_minimum', 8, 2)->nullable();

//            $table->string('item')->nullable();
//            $table->integer('rate')->nullable();
//            $table->integer('units')->nullable();
//            $table->integer('price')->nullable();

            $table->json('items')->nullable();
            $table->json('other_items')->nullable();
            $table->integer('others')->nullable();

            $table->decimal('subtotal', 11, 2)->nullable();
            $table->decimal('total_paid',11, 2)->nullable();
            $table->decimal('total_due', 11, 2)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
