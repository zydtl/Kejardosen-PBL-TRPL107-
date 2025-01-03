<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_mahasiswa';  
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $fillable = [
        'nim', 'nama_mahasiswa', 'password', 'email', 'no_telp', 'kelas', 'jenis_kelamin', 'remember_token', 'judul_tugas_akhir', 'nik_dosen', 'createdByAdmin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nik_dosen', 'nik');
    }

    public function pengajuan()
    {
        return $this->hasMany(PengajuanJadwal::class, 'nim', 'nim');
    }

    public function logbooks()
    {
        return $this->hasMany(Logbook::class, 'nim', 'nim');
    }


}