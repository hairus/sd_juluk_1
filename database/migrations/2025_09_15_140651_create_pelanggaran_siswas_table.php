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
        Schema::create('pelanggaran_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('tatib_id');
            $table->unsignedBigInteger('pen_id');
            $table->unsignedBigInteger('ta_id');
            $table->unsignedBigInteger('guru_id')->nullable();
            $table->foreign('guru_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('catatan')->nullable();
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreign('tatib_id')->references('id')->on('tatibs')->onDelete('cascade');
            $table->foreign('pen_id')->references('id')->on('penanganan_tatibs')->onDelete('cascade');
            $table->foreign('ta_id')->references('id')->on('tas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggaran_siswas');
    }
};
