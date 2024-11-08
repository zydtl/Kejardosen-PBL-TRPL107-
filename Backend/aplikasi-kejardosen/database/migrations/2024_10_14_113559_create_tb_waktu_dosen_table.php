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
        Schema::create('tb_waktuDosen', function (Blueprint $table) {
            $table->id('idWaktuDosen'); // ID sebagai primary key
            $table->bigInteger('nik_dosen')->unsigned(); // Foreign key, nik_dosen dari tb_dosen
            
            // Boolean columns for each day
            $table->boolean('kondisi_senin')->default(true);
            $table->boolean('kondisi_selasa')->default(true);
            $table->boolean('kondisi_rabu')->default(true);
            $table->boolean('kondisi_kamis')->default(true);
            $table->boolean('kondisi_jumat')->default(true);
            $table->boolean('kondisi_sabtu')->default(true);
            $table->boolean('kondisi_minggu')->default(true);

            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('nik_dosen')->references('nik')->on('tb_dosen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_waktuDosen');
    }
};
