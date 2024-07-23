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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('driver_id');
            $table->date('due_date')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->date('received_date')->nullable();
            $table->decimal('received_amount', 10, 2)->nullable();
            $table->decimal('balance', 10, 2)->nullable();
            $table->integer('late_payment_days')->nullable();
            $table->json('items')->nullable();
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
