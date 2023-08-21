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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('booking_number')->nullable();
            $table->string('confirmation_no')->nullable();
            $table->boolean('is_confirmed')->default(0);
            $table->boolean('insurance_fee')->default(0);
            $table->boolean('deposit_fee')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(
                'booking_number',
                'confirmation_no',
                'is_confirmed',
                'insurance_fee',
                'deposit_fee',
            );
        });
    }
};
