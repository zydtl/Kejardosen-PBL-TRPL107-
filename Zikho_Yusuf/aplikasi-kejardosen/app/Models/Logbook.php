<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $table = 'tb_logbook'; // Nama tabel di database
    protected $primaryKey = 'kodeLogbook'; // Primary key
    public $incrementing = false; // Tidak menggunakan auto-increment
    protected $keyType = 'string'; // Primary key berupa string

    protected $fillable = [
        'kodeLogbook',
        'kodeJadwal',
        'isi_logbook',
        'judul_logbook',
        'catatan_dosen',
        'catatan_mahasiswa',
        'progres',
        'created_at',
        'updated_at',
    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalBimbingan::class, 'kodeJadwal', 'kodeJadwal');
    }
    
    

    
}
