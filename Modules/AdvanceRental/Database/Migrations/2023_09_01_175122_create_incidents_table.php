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
        Schema::create('incidents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('booking_id');
            $table->uuid('company_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->string('owner_name');
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('date_of_birth');
            $table->string('phone');
            $table->string('mobile_number')->nullable();
            $table->string('postal_code');
            $table->string('email');
            $table->string('occupation')->nullable();
            $table->string('address');
            $table->string('policy_number');
            $table->string('insurer');
            $table->string('cover_type');
            $table->json('witnesses')->nullable();
            $table->json('third_party')->nullable();
            $table->json('police_details')->nullable();
            $table->json('accident_details')->nullable();
            $table->json('weather')->nullable();
            $table->text('diagrams')->nullable();
            $table->date('date')->nullable();
            $table->string('signature')->nullable();

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
        Schema::dropIfExists('incidents');
    }
};
