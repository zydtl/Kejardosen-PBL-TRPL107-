<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//chat-gpt
use Illuminate\Support\Facades\DB;
class LoginMasukSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            ],
        ]);

        // Seeder untuk tb_mahasiswa
        DB::table('tb_mahasiswa')->insert([
            [
                'nim' => 1234567890,
                'judul_tugas_akhir' => 'Sistem Informasi spp bulanan Akademik',
                'nama_mahasiswa' => 'Juan Immanuel T.',
                'password' => bcrypt('password123'),
                'email' => 'juan@example.com',
                'nik_dosen' => 1234567890123456, // Sesuaikan dengan nik dosen yang ada
                'no_telp' => '081234567892',
                'kelas' => 'TRPL 8B-Pagi',
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 9876543210,
                'judul_tugas_akhir' => 'Aplikasi Mobile E-Commerce',
                'nama_mahasiswa' => 'Hasna Fadilah',
                'password' => bcrypt('password123'),
                'email' => 'hasna@example.com',
                'nik_dosen' => 1234567890123456, // Sesuaikan dengan nik dosen yang ada
                'no_telp' => '081234567893',
                'kelas' => 'TRPL 8B_PAGI',
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

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
                'password' => bcrypt('adminpassword123'),
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
