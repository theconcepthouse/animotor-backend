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
        Schema::table('cars', function (Blueprint $table) {
            $table->string('engine_size')->nullable()->after('extras');
            $table->string('fuel_type')->nullable()->after('extras');
            $table->string('body_type')->nullable()->after('extras');
            $table->string('license_no')->nullable()->after('extras');
            $table->string('tracker_no')->nullable()->after('extras');
            $table->string('registration_number')->nullable()->after('extras');
            $table->text('description')->nullable()->after('extras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(
                'engine_size',
                'fuel_type',
                'body_type',
                'license_no',
                'tracker_no',
                'description',
                'registration_number',
            );
        });
    }
};
