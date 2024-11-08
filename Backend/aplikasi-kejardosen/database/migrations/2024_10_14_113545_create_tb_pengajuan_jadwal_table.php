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
            $table->date('tanggal_anjuranDosen');
            $table->time('waktu_anjuranDosen');
            $table->bigInteger('nim'); // Hapus panjang, gunakan integer default
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak', 'alternatif']);
            $table->timestamps();
            $table->foreign('nim')->references('nim')->on('tb_mahasiswa');
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
