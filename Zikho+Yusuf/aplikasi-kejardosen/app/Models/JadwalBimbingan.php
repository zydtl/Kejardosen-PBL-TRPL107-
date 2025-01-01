<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalBimbingan extends Model
{
    use HasFactory;

    protected $table = 'tb_jadwalbimbingan'; // Nama tabel di database
    protected $primaryKey = 'kodeJadwal';   // Primary key
    public $incrementing = false;           // Tidak menggunakan auto-increment
    protected $keyType = 'string';          // Primary key berupa string

    protected $fillable = [
        'kodeJadwal', 'kodePengajuan', 'tanggal_bimbingan',  'waktu_bimbingan', 'catatan_dosen', 'jenis_bimbingan', 'tempat', 'status'
    ];

    protected $guarded =[
        'updated_at'
    ];

    /**
     * Relasi dengan model PengajuanJadwal
     */
    public function pengajuan()
    {
        return $this->belongsTo(PengajuanJadwal::class, 'kodePengajuan', 'kodePengajuan');
    }

    /**
     * Relasi dengan model Mahasiswa melalui PengajuanJadwal
     */
    public function mahasiswa()
    {
        return $this->hasOneThrough(
            Mahasiswa::class,
            PengajuanJadwal::class,
            'kodePengajuan', // Foreign key di PengajuanJadwal
            'nim',           // Foreign key di Mahasiswa
            'kodePengajuan', // Local key di JadwalBimbingan
            'nim'            // Local key di PengajuanJadwal
        );
    }

    /**
     * Relasi dengan model Dosen melalui PengajuanJadwal
     */
    public function dosen()
    {
        return $this->hasOneThrough(
            Dosen::class,
            PengajuanJadwal::class,
            'kodePengajuan', // Foreign key di PengajuanJadwal
            'nik',           // Foreign key di Dosen
            'kodePengajuan', // Local key di JadwalBimbingan
            'nim'            // Local key di Mahasiswa
        );
    }


    public function logbooks()
    {
        return $this->hasMany(Logbook::class, 'kodeJadwal', 'kodeJadwal');
    }

}
