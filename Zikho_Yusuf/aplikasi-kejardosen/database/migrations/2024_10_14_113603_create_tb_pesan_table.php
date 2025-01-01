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
        Schema::create('tb_pesan', function (Blueprint $table) {
            $table->string('kodePesan', 20)->primary();
            $table->text('isi_pesan');
            $table->timestamps();
            $table->string('kodePengajuan', 20);
            $table->integer('nim'); // Hapus panjang, gunakan integer default
            $table->integer('nik_dosen'); // Hapus panjang, gunakan integer default
            $table->foreign('kodePengajuan')->references('kodePengajuan')->on('tb_pengajuanJadwal');
            // $table->foreign('nim')->references('nim')->on('tb_mahasiswa');
            // $table->foreign('nik_dosen')->references('nik')->on('tb_dosen');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pesan');
    }
};
