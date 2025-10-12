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
        Schema::create('penanganan_tatibs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tatib_id');
            $table->foreign('tatib_id')->references('id')->on('tatibs')->onDelete('cascade');
            $table->string('kat');
            $table->string('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanganan_tatibs');
    }
};
