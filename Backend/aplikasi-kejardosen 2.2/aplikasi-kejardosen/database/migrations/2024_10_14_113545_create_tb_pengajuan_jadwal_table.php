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
        Schema::create('tb_pengajuanJadwal', function (Blueprint $table) {
            $table->string('kodePengajuan', 20)->primary();
            $table->date('tanggal_pengajuan');
            $table->time('waktu_pengajuan');
            $table->date('tanggal_anjuranDosen')->nullable(); // Membolehkan null
            $table->time('waktu_anjuranDosen')->nullable(); // Membolehkan null
            $table->string('judul_bimbingan');
            $table->string('catatan_dosen')->nullable(); // Membolehkan null
            $table->string('catatan_mahasiswa');
            $table->bigInteger('nim');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak', 'alternatif', 'dibatalkan']);
        
            $table->timestamps();
            $table->foreign('nim')->references('nim')->on('tb_mahasiswa')->onUpdate('cascade')->onDelete('cascade');
        });
        
        
        
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pengajuanJadwal');
    }
};
