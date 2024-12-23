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
        Schema::create('tb_logbook', function (Blueprint $table) {
            $table->string('kodeLogbook', 20)->primary();
            $table->string('kodeJadwal', 20);
            $table->text('isi_logbook');
            $table->string('judul_logbook', 255);
            $table->string('catatan_dosen');
            $table->string('catatan_mahasiswa');
            $table->float('progres', 5, 2)->default(0);
            $table->timestamps();
            $table->foreign('kodeJadwal')->references('kodeJadwal')->on('tb_jadwalBimbingan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_logbook');
    }
};
