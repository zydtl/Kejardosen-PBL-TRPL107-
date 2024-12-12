<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoginMasukSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk tb_administrator
        DB::table('tb_administrator')->insert([
            [
                'idAdministrator' => 1,
                'username' => 'admin1',
                'nama' => 'Administrator 1',
                'email' => 'admin1@example.com',
                'password' => bcrypt('password123'),
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idAdministrator' => 2,
                'username' => 'admin2',
                'nama' => 'Administrator 2',
                'email' => 'admin2@example.com',
                'password' => bcrypt('password123'),
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idAdministrator' => 3,
                'username' => 'admin3',
                'nama' => 'Administrator 3',
                'email' => 'admin3@example.com',
                'password' => bcrypt('password123'),
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idAdministrator' => 4,
                'username' => 'admin4',
                'nama' => 'Administrator 4',
                'email' => 'admin4@example.com',
                'password' => bcrypt('password123'),
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idAdministrator' => 5,
                'username' => 'admin5',
                'nama' => 'Administrator 5',
                'email' => 'admin5@example.com',
                'password' => bcrypt('password123'),
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idAdministrator' => 6,
                'username' => 'admin6',
                'nama' => 'Administrator 6',
                'email' => 'admin6@example.com',
                'password' => bcrypt('password123'),
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idAdministrator' => 7,
                'username' => 'admin7',
                'nama' => 'Administrator 7',
                'email' => 'admin7@example.com',
                'password' => bcrypt('password123'),
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idAdministrator' => 8,
                'username' => 'admin8',
                'nama' => 'Administrator 8',
                'email' => 'admin8@example.com',
                'password' => bcrypt('password123'),
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idAdministrator' => 9,
                'username' => 'admin9',
                'nama' => 'Administrator 9',
                'email' => 'admin9@example.com',
                'password' => bcrypt('password123'),
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idAdministrator' => 10,
                'username' => 'admin10',
                'nama' => 'Administrator 10',
                'email' => 'admin10@example.com',
                'password' => bcrypt('password123'),
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder untuk tb_dosen
        DB::table('tb_dosen')->insert([
            [
                'nik' => 1234567890123456,
                'no_telp' => '081234567890',
                'nama_dosen' => 'Alena Uperiati, S.T.,M.Cs',
                'password' => bcrypt('password123'),
                'email' => 'Alena@example.com',
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
                'createdByAdmin' => 1, // Referensi ke tb_administrator
            ],
            [
                'nik' => 9999999999999999,
                'no_telp' => '081234567891',
                'nama_dosen' => 'Rico Faicon, S.T.,M.Cs',
                'password' => bcrypt('password123'),
                'email' => 'rico@example.com',
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
                'createdByAdmin' => 2, // Referensi ke tb_administrator
            ],
        ]);

        // Seeder untuk tb_mahasiswa
        DB::table('tb_mahasiswa')->insert([
            [
                'nim' => 1234567890,
                'judul_tugas_akhir' => 'Sistem Informasi SPP Bulanan Akademik',
                'nama_mahasiswa' => 'Juan Immanuel T.',
                'password' => bcrypt('password123'),
                'email' => 'juan@example.com',
                'nik_dosen' => 1234567890123456, // Sesuaikan dengan nik dosen yang ada
                'no_telp' => '081234567892',
                'kelas' => 'TRPL 8B-Pagi',
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
                'createdByAdmin' => 1, // Referensi ke tb_administrator
            ],
            [
                'nim' => 9876543210,
                'judul_tugas_akhir' => 'Aplikasi Mobile E-Commerce',
                'nama_mahasiswa' => 'Hasna Fadilah',
                'password' => bcrypt('password123'),
                'email' => 'hasna@example.com',
                'nik_dosen' => 1234567890123456, // Sesuaikan dengan nik dosen yang ada
                'no_telp' => '081234567893',
                'kelas' => 'TRPL 8B_Pagi',
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
                'createdByAdmin' => 2, // Referensi ke tb_administrator
            ],
        ]);

        // seeder untuk tb_pengajuan
        
    }
}
