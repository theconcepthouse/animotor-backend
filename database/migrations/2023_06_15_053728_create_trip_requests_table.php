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
            $table->id();
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('customer_id');
            $table->boolean('is_scheduled')->default(0);
            $table->decimal('fee',10,2)->default(0);
            $table->string('reference')->nullable();

            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('status')->default('pending');
            $table->string('payment_status')->default('unpaid');
            $table->string('payment_method')->nullable();
            $table->string('origin_lat')->nullable();
            $table->string('origin_lng')->nullable();
            $table->string('destination_lat')->nullable();
            $table->string('destination_lng')->nullable();

            $table->dateTime('started_at')->default(null);
            $table->dateTime('end_at')->default(null);

            $table->string('current_lat')->nullable();
            $table->string('current_lng')->nullable();
            $table->bigInteger('distance')->nullable();
            $table->string('distance_text')->nullable();
            $table->bigInteger('duration')->nullable();
            $table->string('duration_text')->nullable();
            $table->bigInteger('car_id');
            $table->boolean('completed')->default(0);
            $table->boolean('cancelled')->default(0);

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

            $table->unsignedBigInteger('service_id')->default(1);


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
