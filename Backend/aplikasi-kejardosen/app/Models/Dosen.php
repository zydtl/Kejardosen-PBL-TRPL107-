<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dosen extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_dosen';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $fillable = ['nik', 'nama_dosen', 'password', 'email', 'no_telp', 'jenis_kelamin', 'remember_token', 'createdByAdmin'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin()
    {
        return $this->belongsTo(Administrator::class, 'createdByAdmin', 'idAdministrator');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'nik_dosen', 'nik');
    }
    
    public function pengajuan()
    {
        return $this->hasManyThrough(PengajuanJadwal::class, Mahasiswa::class, 'nik_dosen', 'nim', 'nik', 'nim');
    }

    public function waktuDosen()
    {
        return $this->hasOne(WaktuDosen::class, 'nik_dosen', 'nik');
    }
    
}