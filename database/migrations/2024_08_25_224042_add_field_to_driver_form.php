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
            $table->json('hire')->nullable();
            $table->json('reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('driver_forms', function (Blueprint $table) {
            $table->dropColumn(['hire', 'reason']);
        });
    }
};
