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
        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            $table->bigInteger('nim')->length(10)->primary();
            $table->string('judul_tugas_akhir'); 
            $table->string('nama_mahasiswa');
            $table->string('password'); 
            $table->string('email'); 
            $table->bigInteger('nik_dosen')->unsigned();
            $table->string('no_telp')->length(13);
            $table->string('kelas');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->timestamps();
            $table->string('remember_token', 100)->nullable();
            $table->foreign('nik_dosen')->references('nik')->on('tb_dosen');
            $table->integer('createdByAdmin')->unsigned();
            $table->foreign('createdByAdmin')->references('idAdministrator')->on('tb_administrator');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_mahasiswa');
    }
};
