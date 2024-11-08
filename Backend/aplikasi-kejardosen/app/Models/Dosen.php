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
    protected $keyType = 'bigInteger';

    protected $fillable = [
        'nik', 'nama_dosen', 'password', 'email', 'no_telp', 'jenis_kelamin', 'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}