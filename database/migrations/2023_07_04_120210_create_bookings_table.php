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
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('region_id')->nullable();
            $table->uuid('driver_id')->nullable();
            $table->uuid('customer_id')->nullable();
            $table->decimal('fee')->nullable();
            $table->string('reference')->nullable();
            $table->date('pick_up_date')->nullable();
            $table->string('pick_up_time')->nullable();
            $table->date('drop_off_date')->nullable();
            $table->string('drop_off_time')->nullable();
            $table->string('pick_location')->nullable();
            $table->string('drop_off_location')->nullable();
            $table->string('status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->string('payment_method')->nullable();

            $table->decimal('pick_up_lat', 10, 7)->nullable();
            $table->decimal('pick_up_lng', 10, 7)->nullable();
            $table->decimal('drop_off_lat', 10, 7)->nullable();
            $table->decimal('drop_off_lng', 10, 7)->nullable();

            $table->string('car_id')->nullable();
            $table->boolean('completed')->default(0);
            $table->boolean('cancelled')->default(0);
            $table->integer('rating')->nullable();
            $table->string('rating_comment')->nullable();
            $table->decimal('extra_time_price')->default(0);
            $table->integer('discount')->nullable();
            $table->decimal('tax')->default(0);
            $table->decimal('grand_total', 12, 2)->nullable();

            $table->uuid('rental_id')->nullable();

            $table->string('booking_type')->nullable();

            $table->decimal('commission')->default(0);
            $table->string('cancellation_reason')->nullable();
            $table->string('cancelled_by')->nullable();

            $table->text('comment')->nullable();
            $table->string('picked')->nullable('no');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
