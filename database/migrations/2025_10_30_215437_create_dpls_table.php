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
        Schema::create('dpls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ta_id');
            $table->unsignedBigInteger('mapel_id');
            $table->unsignedBigInteger('cp_id');
            $table->unsignedBigInteger('dpl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dpls');
    }
};
