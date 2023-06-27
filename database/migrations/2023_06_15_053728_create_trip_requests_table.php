<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('region_id');
            $table->uuid('service_id');
            $table->uuid('driver_id')->nullable();
            $table->uuid('customer_id');
            $table->uuid('car_id')->nullable();


            $table->boolean('is_scheduled')->default(0);

            $table->decimal('fee',10,2)->default(0);
            $table->string('reference')->nullable();

            $table->string('ride_type')->nullable();

            $table->string('origin')->nullable();
            $table->string('destination')->nullable();

            $table->string('status')->default('pending');

            $table->string('payment_status')->default('unpaid');
            $table->string('payment_method')->nullable();


            $table->decimal('origin_lat', 10, 7)->nullable();
            $table->decimal('origin_lng', 10, 7)->nullable();
            $table->decimal('destination_lat', 10, 7)->nullable();
            $table->decimal('destination_lng', 10, 7)->nullable();

            $table->dateTime('started_at')->default(null);
            $table->dateTime('end_at')->default(null);

            $table->decimal('current_lat', 10, 7)->nullable();
            $table->decimal('current_lng', 10, 7)->nullable();

            $table->bigInteger('distance')->nullable();
            $table->string('distance_text')->nullable();

            $table->bigInteger('duration')->nullable();
            $table->string('duration_text')->nullable();

            $table->boolean('completed')->default(0);
            $table->boolean('cancelled')->default(0);
            $table->string('cancellation_reason')->nullable();
            $table->string('cancelled_by')->nullable();

            $table->integer('rating')->default(0);
            $table->integer('driver_rating')->default(0);
            $table->string('rating_comment')->default(null);
            $table->string('driver_rating_comment')->default(null);

            $table->boolean('driver_feedback')->default(0);
            $table->boolean('rider_feedback')->default(0);

            $table->decimal('base_price',12,2)->default(0);
            $table->decimal('time_price',12,2)->default(0);
            $table->decimal('distance_price',12,2)->default(0);
            $table->decimal('discount',12,2)->default(0);
            $table->decimal('tax',12,2)->default(0);
            $table->decimal('grand_total',12,2)->default(0);

            $table->decimal('driver_earn',12,2)->default(0);
            $table->decimal('commission',12,2)->default(0);

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('driver_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('region_id')->references('id')->on('regions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_requests');
    }
};
