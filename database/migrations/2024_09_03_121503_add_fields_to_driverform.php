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
        Schema::table('driver_forms', function (Blueprint $table) {
            $table->json('claim_details')->nullable()->after('claim');
            $table->json('conviction_details')->nullable()->after('convictions');
            $table->json('conviction_details_2')->nullable()->after('conviction_details');
            $table->json('conviction_details_3')->nullable()->after('conviction_details_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('driver_forms', function (Blueprint $table) {
            $table->dropColumn(['claim_details', 'conviction_details', 'conviction_details_2', 'conviction_details_3']);
        });
    }
};
