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
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('pending');
            $table->json('company_info')->nullable();
            $table->json('branches')->nullable();
            $table->json('contact_persons')->nullable();
            $table->json('document')->nullable();
            $table->json('billing_info')->nullable();
            $table->json('services_products')->nullable();
            $table->json('commissions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
