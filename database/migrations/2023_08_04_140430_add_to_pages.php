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
        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('path');
            $table->string('header_type')->default('default')->after('path');
        });

        Schema::table('page_contents', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('page_id');
            $table->boolean('is_shortcode')->default(false)->after('page_id');
            $table->integer('level')->default(1)->after('page_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('is_active','header_type');
        });
        Schema::table('page_contents', function (Blueprint $table) {
            $table->dropColumn('is_active','level','is_shortcode');
        });
    }
};
