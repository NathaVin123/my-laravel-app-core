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
        Schema::dropIfExists('test1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('test1', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
};