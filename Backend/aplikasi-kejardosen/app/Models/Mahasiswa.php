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
    protected $keyType = 'bigInteger';

    protected $fillable = [
        'nim', 'nama_mahasiswa', 'password', 'email', 'no_telp', 'kelas', 'jenis_kelamin', 'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}