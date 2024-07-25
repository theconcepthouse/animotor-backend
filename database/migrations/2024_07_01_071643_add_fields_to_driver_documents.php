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
        Schema::table('driver_documents', function (Blueprint $table) {
            $table->string('driving_license_number')->nullable();
            $table->string('type_of_license_held')->nullable();
            $table->date('license_issue_date')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->date('driving_test_pass_date')->nullable();
            $table->string('national_insurance_number')->nullable();
            $table->string('taxi_number')->nullable();
            $table->string('dvla_check_code')->nullable();
            $table->string('issuing_authority')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
   public function down()
    {
        Schema::table('driver_documents', function (Blueprint $table) {
            $table->dropColumn([
                'driving_license_number',
                'type_of_license_held',
                'license_issue_date',
                'license_expiry_date',
                'driving_test_pass_date',
                'national_insurance_number',
                'taxi_number',
                'dvla_check_code',
                'issuing_authority'
            ]);
        });
    }

};
