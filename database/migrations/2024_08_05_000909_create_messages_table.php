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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('email_address'); // Storing multiple email addresses in one field
            $table->string('subject');
            $table->longText('message');
            $table->string('status')->nullable();
            $table->integer('type')->default(0); // 0 = Draft, 1 = Sent, 2 = Deleted, etc.
            $table->boolean('read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
