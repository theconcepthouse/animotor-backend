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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region_id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('capacity');
            $table->integer('wait_time_limit');

            $table->integer('min_fare')->default(0);
            $table->integer('min_distance')->default(0);

            $table->decimal('price');
            $table->decimal('distance_price')->default(0);
            $table->decimal('time_price')->default(0);
            $table->decimal('wait_price')->default(0);
            $table->decimal('cancellation_fee')->default(0);

            $table->string('payment_methods')->default('cash,wallet');

            $table->integer('discount')->default(0);
            $table->string('commission_type')->default('percentage');
            $table->decimal('commission')->default(10);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
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
        Schema::dropIfExists('services');
    }
};
