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
        Schema::create('tb_administrator', function (Blueprint $table) {
            $table->unsignedInteger('idAdministrator')->primary(); 
            $table->string('username')->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('remember_token', 100)->nullable(); 
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_administrator');
    }
};
