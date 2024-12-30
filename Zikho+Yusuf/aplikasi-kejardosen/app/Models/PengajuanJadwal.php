<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanJadwal extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan jika tidak menggunakan konvensi Laravel
    protected $table = 'tb_pengajuanjadwal';

    // Tentukan primary key yang digunakan
    protected $primaryKey = 'kodePengajuan';

    // Pastikan tidak menggunakan auto-increment (karena kita akan generate kode 'pj')
    public $incrementing = false;

    // Tentukan tipe data primary key
    protected $keyType = 'string';

    // Tentukan kolom yang dapat diisi (mass-assignment)
    protected $fillable = [
        'kodePengajuan', 'nim', 'tanggal_pengajuan', 'waktu_pengajuan','tanggal_anjuranDosen', 'waktu_anjuranDosen', 'catatan_dosen', 'judul_bimbingan', 'catatan_mahasiswa', 'status'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

}

