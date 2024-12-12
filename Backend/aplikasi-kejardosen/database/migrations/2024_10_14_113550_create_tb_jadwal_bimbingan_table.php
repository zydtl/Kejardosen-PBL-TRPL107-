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
        Schema::create('tb_jadwalBimbingan', function (Blueprint $table) {
            $table->string('kodeJadwal', 20)->primary();
            $table->date('tanggal_bimbingan');
            $table->time('waktu_bimbingan');
            $table->date('tanggal_pelaksanaan');
            $table->time('waktu_pelaksanaan');
            $table->string('catatan_dosen');
            $table->string('catatan_mahasiswa');
            $table->enum('status', ['diselesaikan', 'ditunda', 'menunggu']);
            $table->string('kodePengajuan', 20);
            $table->timestamps();
            $table->string('tempat');
            $table->enum('jenis_bimbingan', ['luring','daring']);
            $table->foreign('kodePengajuan')->references('kodePengajuan')->on('tb_pengajuanJadwal');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jadwalBimbingan');
    }
};
