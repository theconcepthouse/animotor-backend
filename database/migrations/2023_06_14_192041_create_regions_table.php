<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
//            $table->id();
            $table->uuid('id')->primary();

            $table->string('name');
            $table->string('currency_code')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('timezone')->nullable();
            $table->boolean('is_active')->default(1);
            $table->polygon('coordinates')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
};
