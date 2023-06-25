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
        Schema::table('users', function (Blueprint $table) {
            $table->string('comment')->nullable();
            $table->boolean('is_online')->after('status')->default(false);
            $table->decimal('map_lat', 10, 7)->after('status')->nullable();
            $table->decimal('map_lng', 10, 7)->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('comment');
        });
    }
};
