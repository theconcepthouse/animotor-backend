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
        Schema::create('fleet_plannings', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->text('description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('duration')->nullable();
            $table->string('location')->nullable();
            $table->json('guests')->nullable(); // Store guest emails as a JSON array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleet_plannings');
    }
};
