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
            $table->string('judul_tugas_akhir'); // Tidak ada panjang ditentukan, gunakan default
            $table->string('nama_mahasiswa'); // Tidak ada panjang ditentukan, gunakan default
            $table->string('password'); // Tidak ada panjang ditentukan, gunakan default
            $table->string('email'); // Tidak ada panjang ditentukan, gunakan default
            $table->bigInteger('nik_dosen')->unsigned(); // Foreign key, nik_dosen dari tb_dosen
            $table->string('no_telp')->length(13); // Tidak ada panjang ditentukan, gunakan default
            $table->string('kelas'); // Tidak ada panjang ditentukan, gunakan default
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->string('remember_token', 100)->nullable(); // Menambahkan kolom remember_token
            // Foreign key constraint
            $table->foreign('nik_dosen')->references('nik')->on('tb_dosen');
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
