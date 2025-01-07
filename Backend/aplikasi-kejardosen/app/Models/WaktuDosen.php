<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuDosen extends Model
{
    use HasFactory;


    protected $table = 'tb_waktuDosen';
    protected $primaryKey = 'idWaktuDosen';
    public $incrementing = true;
    protected $fillable = [
        'nik_dosen',
        'kondisi_senin',
        'kondisi_selasa',
        'kondisi_rabu',
        'kondisi_kamis',
        'kondisi_jumat',
        'kondisi_sabtu',
        'kondisi_minggu',
    ];

    /**
     * Relasi ke model Dosen.
     */
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nik_dosen', 'nik');
    }
}
