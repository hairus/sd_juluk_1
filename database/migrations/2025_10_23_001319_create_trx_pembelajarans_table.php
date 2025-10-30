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
        Schema::create('trx_pembelajarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ta_id');
            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('cp_id');
            $table->unsignedBigInteger('tp_id');
            $table->unsignedBigInteger('mapel_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('kegiatan_id');
            $table->unsignedBigInteger('dpl_id');
            $table->date('tgl_pembelajaran');
            $table->boolean('approve')->default(0);
            $table->foreign('guru_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ta_id')->references('id')->on('tas')->onDelete('cascade');
            $table->foreign('cp_id')->references('id')->on('cps')->onDelete('cascade');
            $table->foreign('tp_id')->references('id')->on('tps')->onDelete('cascade');
            $table->foreign('mapel_id')->references('id')->on('mapels')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('dpl_id')->references('id')->on('dpls')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_pembelajarans');
    }
};
