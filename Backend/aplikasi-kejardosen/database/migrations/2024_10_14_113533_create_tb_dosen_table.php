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
            $table->bigInteger('nik')->length(16)->unsigned()->primary();
            $table->string('no_telp')->length(13);
            $table->string('nama_dosen', 255); 
            $table->string('password', 255);
            $table->string('email', 255)->unique(); 
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->timestamps(); 
            $table->string('remember_token', 100)->nullable(); 
            $table->integer('createdByAdmin')->unsigned();
            $table->foreign('createdByAdmin')->references('idAdministrator')->on('tb_administrator');
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
