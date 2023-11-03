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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->unsignedInteger('sender_phone')->unique()->length(9);
            $table->string('sender_city');
            $table->string('receiver_name');
            $table->unsignedInteger('receiver_phone')->unique()->length(9);
            $table->string('receiver_city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
