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
        Schema::create('users', function (Blueprint $table) {
//            $table->id();
            $table->uuid('id')->primary();

            $table->uuid('region_id')->nullable();
            $table->uuid('service_id')->nullable();
//            $table->unsignedBigInteger('region_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('gender')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default('unapproved');
            $table->string('address')->nullable();
            $table->string('city')->nullable();

            $table->string('comment')->nullable();
            $table->boolean('is_online')->default(false);
            $table->decimal('map_lat', 10, 7)->nullable();
            $table->decimal('map_lng', 10, 7)->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
