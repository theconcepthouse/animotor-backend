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
        Schema::create('driver_documents', function (Blueprint $table) {
//            $table->id();
            $table->uuid('id')->primary();

            $table->uuid('driver_id');
            $table->uuid('document_id');
            $table->boolean('is_approved')->default(0);
            $table->string('file')->nullable();
            $table->string('status')->nullable();
            $table->text('comment')->nullable();
            $table->date('expiry_date')->nullable();
            $table->timestamps();
            $table->foreign('driver_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('document_id')->references('id')->on('documents')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_documents');
    }
};
