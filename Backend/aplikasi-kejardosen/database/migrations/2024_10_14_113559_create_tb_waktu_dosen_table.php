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
            $table->id('idWaktuDosen');
            $table->bigInteger('nik_dosen')->unsigned();
            $table->boolean('kondisi_senin')->default(true);
            $table->boolean('kondisi_selasa')->default(true);
            $table->boolean('kondisi_rabu')->default(true);
            $table->boolean('kondisi_kamis')->default(true);
            $table->boolean('kondisi_jumat')->default(true);
            $table->boolean('kondisi_sabtu')->default(false);
            $table->boolean('kondisi_minggu')->default(false);
            $table->timestamps();
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
