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
        Schema::table('regions', function (Blueprint $table) {
            $table->string('type')->default('region')->after('name');
            $table->decimal('airport_amount')->default(0)->after('coordinates');
            $table->string('airport_fee_type')->comment('percent_or_flat')->nullable()->after('coordinates');
            $table->string('airport_fee_mode')->comment('increment_or_decrement')->nullable()->after('coordinates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->dropColumn(
                'type',
                'airport_amount',
                'airport_fee_type',
                'airport_fee_mode',
            );
        });
    }
};
