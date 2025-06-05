<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('fleet_events', function (Blueprint $table) {
            // 1)  If you already ran the broken migration, first drop the wrong column
//            if (Schema::hasColumn('fleet_events', 'pcn_id')) {
//                $table->dropForeign(['pcn_id']);
//                $table->dropColumn('pcn_id');
//            }

            // 2)  Correct column type
            // Laravel 8+: foreignUuid() does both the column and FK in one line
//            $table->foreignUuid('pcn_id')
//                ->constrained('driver_pcns')
//                ->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('fleet_events', function (Blueprint $table) {
//            $table->dropForeign(['pcn_id']);
            $table->dropColumn('pcn_id');
        });
    }
};
