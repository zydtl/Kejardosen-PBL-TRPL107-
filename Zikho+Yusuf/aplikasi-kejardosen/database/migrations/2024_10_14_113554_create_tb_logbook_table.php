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
            $table->text('isi_logbook')->nullable();
            $table->string('judul_logbook', 255)->nullable();
            $table->text('catatan_mahasiswa')->nullable();
            $table->text('catatan_dosen')->nullable();
            $table->float('progres', 5, 2)->default(0);
            $table->timestamps();
            $table->foreign('kodeJadwal')->references('kodeJadwal')->on('tb_jadwalBimbingan')->onUpdate('cascade')->onDelete('cascade');
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
