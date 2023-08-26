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
        Schema::create('hotels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->uuid('region_id')->nullable();
            $table->uuid('user_id');
            $table->string('address')->nullable();
            $table->string('map_lat')->nullable();
            $table->string('map_lng')->nullable();
            $table->string('featured_image_thumb')->nullable();
            $table->string('featured_image')->nullable();
            $table->text('description')->nullable();
            $table->string('short_description')->nullable();
            $table->json('images')->nullable();
            $table->json('facilities')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('hotels');
    }
};
