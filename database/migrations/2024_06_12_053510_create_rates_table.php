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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('payment_item')->default(0);
            $table->string('payment_name')->nullable();
            $table->double('payment_unit')->nullable();
            $table->double('payment_price')->nullable();
            $table->double('payment_paid')->nullable();

            $table->string('item')->nullable();
            $table->string('item_2')->nullable();
            $table->double('unit')->nullable();
            $table->double('rate')->nullable();
            $table->double('price')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
