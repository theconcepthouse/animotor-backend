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
        Schema::create('car_extras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('car_id');
            $table->boolean('is_taxed')->default(1);
            $table->date('tax_expiry_date')->nullable();
            $table->decimal('tax_amount', 11,2)->nullable();
            $table->string('tax_type')->comment('monthly, yearly')->nullable();

            $table->json('mots')->comment('car mots')->nullable();
            $table->json('service')->comment('car servicing')->nullable();
            $table->json('documents')->comment('car documents')->nullable();
            $table->json('finance')->comment('car finance')->nullable();
            $table->json('damage_history')->comment('car finance')->nullable();
            $table->json('repairs')->comment('car finance')->nullable();

            $table->foreign('car_id')->references('id')->on('cars')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_extras');
    }
};
