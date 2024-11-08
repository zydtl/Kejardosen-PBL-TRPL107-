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
        Schema::create('tb_dosen', function (Blueprint $table) {
            $table->bigInteger('nik')->length(16)->unsigned()->primary(); // Mendefinisikan nik sebagai integer dengan panjang 16
            $table->string('no_telp')->length(13); // Mendefinisikan no_telp sebagai integer dengan panjang 16
            $table->string('nama_dosen', 255); // Mendefinisikan nama_dosen dengan panjang 255
            $table->string('password', 255); // Mendefinisikan password dengan panjang 255
            $table->string('email', 255)->unique(); // Mendefinisikan email dengan panjang 255 dan unik
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->string('remember_token', 100)->nullable(); // Menambahkan kolom remember_token
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_dosen');
    }
};
