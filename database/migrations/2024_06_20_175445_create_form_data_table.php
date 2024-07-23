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
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('driver_id')->unsigned();
            $table->bigInteger('form_id')->unsigned();
            $table->string('sending_method')->nullable();
            $table->json('field_data')->nullable();
            $table->enum('status', ['Pending', 'Completed', 'Partially Complete'])->default('Pending');
            $table->timestamps();

           $table->foreign('driver_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        $table->foreign('form_id')->references('id')->on('forms')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_data');
    }
};
