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
            $table->decimal('deposit')->default(0)->after('photos');
            $table->string('bags')->default('1 large bag')->after('photos');
            $table->string('pick_up_location')->nullable()->after('photos');
            $table->decimal('cancellation_fee')->default(0)->after('photos');
            $table->boolean('air_condition')->default(false)->after('photos');
            $table->decimal('price_per_mileage')->default(0)->after('photos');
            $table->decimal('insurance_fee')->default(0)->after('photos');
            $table->integer('mileage')->comment('0 for unlimited')->default(0)->after('photos');
            $table->integer('seats')->default(4)->after('photos');
            $table->decimal('map_lat', 10, 7)->nullable()->after('photos');
            $table->decimal('map_lng', 10, 7)->nullable()->after('photos');
            $table->text('requirements')->nullable()->after('photos');
            $table->text('security_deposit')->nullable()->after('photos');
            $table->text('damage_excess')->nullable()->after('photos');
            $table->text('mileage_text')->nullable()->after('photos');
            $table->json('extras')->nullable()->after('photos');
            $table->text('drop_off_instruction')->nullable()->after('photos');
            $table->text('pickup_instruction')->nullable()->after('photos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn([
                'deposit',
                'bags',
                'cancellation_fee',
                'price_per_mileage',
                'pick_up_location',
                'mileage',
                'seats',
                'map_lat',
                'air_condition',
                'insurance_fee',
                'map_lng',
                'requirements',
                'security_deposit',
                'damage_excess',
                'mileage_text',
                'extras',
                'drop_off_instruction',
                'pickup_instruction',
            ]);
        });
    }
};
