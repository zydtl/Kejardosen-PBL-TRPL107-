<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrator extends Authenticatable
{
    use HasFactory;

    // Tentukan tabel yang digunakan jika nama tabel tidak mengikuti konvensi
    protected $table = 'tb_administrator';
    
    // Tentukan primary key jika tidak menggunakan konvensi Laravel
    protected $primaryKey = 'idAdministrator';

    // Tentukan kolom mana yang bisa diisi secara massal
    // protected $fillable = ['name', 'email', 'password', 'remember_token', 'id_administator'];
    protected $fillable = ['username', 'nama', 'email', 'password', 'jenis_kelamin', 'remember_token'];

    // Kolom yang disembunyikan agar tidak terlihat di hasil serialisasi
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Cast untuk kolom tertentu, misalnya 'email_verified_at' yang bertipe datetime
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
