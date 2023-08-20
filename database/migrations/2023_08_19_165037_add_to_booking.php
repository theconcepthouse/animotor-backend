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
            $table->string('booking_number')->nullable()->after('picked');
            $table->string('confirmation_no')->nullable()->after('picked');
            $table->boolean('is_confirmed')->default(0)->after('picked');
            $table->boolean('insurance_fee')->default(0)->after('picked');
            $table->boolean('deposit_fee')->default(0)->after('picked');
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
