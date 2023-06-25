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
        Schema::create('complaints', function (Blueprint $table) {
//            $table->id();
            $table->uuid('id')->primary();

            $table->string('subject');
            $table->uuid('ride_id');
            $table->text('complain')->nullable();
            $table->string('by')->default('rider');
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->foreign('ride_id')->references('id')->on('trip_requests')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
