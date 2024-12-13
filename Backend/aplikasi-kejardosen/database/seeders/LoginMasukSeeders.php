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
                'no_telp' => '0812345678901',
                'nama_dosen' => 'Dosen 1',
                'password' => bcrypt('password123'),
                'email' => 'dosen1@example.com',
                'jenis_kelamin' => 'Laki-laki',
                'createdByAdmin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 1234567890123457,
                'no_telp' => '0812345678902',
                'nama_dosen' => 'Dosen 2',
                'password' => bcrypt('password123'),
                'email' => 'dosen2@example.com',
                'jenis_kelamin' => 'Perempuan',
                'createdByAdmin' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 1234567890123458,
                'no_telp' => '0812345678903',
                'nama_dosen' => 'Dosen 3',
                'password' => bcrypt('password123'),
                'email' => 'dosen3@example.com',
                'jenis_kelamin' => 'Laki-laki',
                'createdByAdmin' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 1234567890123459,
                'no_telp' => '0812345678904',
                'nama_dosen' => 'Dosen 4',
                'password' => bcrypt('password123'),
                'email' => 'dosen4@example.com',
                'jenis_kelamin' => 'Perempuan',
                'createdByAdmin' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 1234567890123460,
                'no_telp' => '0812345678905',
                'nama_dosen' => 'Dosen 5',
                'password' => bcrypt('password123'),
                'email' => 'dosen5@example.com',
                'jenis_kelamin' => 'Laki-laki',
                'createdByAdmin' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 1234567890123461,
                'no_telp' => '0812345678906',
                'nama_dosen' => 'Dosen 6',
                'password' => bcrypt('password123'),
                'email' => 'dosen6@example.com',
                'jenis_kelamin' => 'Perempuan',
                'createdByAdmin' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 1234567890123462,
                'no_telp' => '0812345678907',
                'nama_dosen' => 'Dosen 7',
                'password' => bcrypt('password123'),
                'email' => 'dosen7@example.com',
                'jenis_kelamin' => 'Laki-laki',
                'createdByAdmin' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 1234567890123463,
                'no_telp' => '0812345678908',
                'nama_dosen' => 'Dosen 8',
                'password' => bcrypt('password123'),
                'email' => 'dosen8@example.com',
                'jenis_kelamin' => 'Perempuan',
                'createdByAdmin' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 1234567890123464,
                'no_telp' => '0812345678909',
                'nama_dosen' => 'Dosen 9',
                'password' => bcrypt('password123'),
                'email' => 'dosen9@example.com',
                'jenis_kelamin' => 'Laki-laki',
                'createdByAdmin' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 1234567890123465,
                'no_telp' => '0812345678910',
                'nama_dosen' => 'Dosen 10',
                'password' => bcrypt('password123'),
                'email' => 'dosen10@example.com',
                'jenis_kelamin' => 'Perempuan',
                'createdByAdmin' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder untuk tb_mahasiswa
        DB::table('tb_mahasiswa')->insert([
            [
                'nim' => 1000000001,
                'judul_tugas_akhir' => 'Analisis Algoritma Machine Learning',
                'nama_mahasiswa' => 'Mahasiswa 1',
                'password' => bcrypt('password123'),
                'email' => 'mahasiswa1@example.com',
                'nik_dosen' => 1234567890123456,
                'no_telp' => '0812345678001',
                'kelas' => 'TI-1A',
                'jenis_kelamin' => 'Laki-laki',
                'createdByAdmin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1000000002,
                'judul_tugas_akhir' => 'Pengembangan Aplikasi Mobile',
                'nama_mahasiswa' => 'Mahasiswa 2',
                'password' => bcrypt('password123'),
                'email' => 'mahasiswa2@example.com',
                'nik_dosen' => 1234567890123457,
                'no_telp' => '0812345678002',
                'kelas' => 'TI-1B',
                'jenis_kelamin' => 'Perempuan',
                'createdByAdmin' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1000000003,
                'judul_tugas_akhir' => 'Sistem Informasi Geografis',
                'nama_mahasiswa' => 'Mahasiswa 3',
                'password' => bcrypt('password123'),
                'email' => 'mahasiswa3@example.com',
                'nik_dosen' => 1234567890123458,
                'no_telp' => '0812345678003',
                'kelas' => 'TI-1C',
                'jenis_kelamin' => 'Laki-laki',
                'createdByAdmin' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1000000004,
                'judul_tugas_akhir' => 'Optimasi Jaringan Komputer',
                'nama_mahasiswa' => 'Mahasiswa 4',
                'password' => bcrypt('password123'),
                'email' => 'mahasiswa4@example.com',
                'nik_dosen' => 1234567890123459,
                'no_telp' => '0812345678004',
                'kelas' => 'TI-1D',
                'jenis_kelamin' => 'Perempuan',
                'createdByAdmin' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1000000005,
                'judul_tugas_akhir' => 'Keamanan Siber',
                'nama_mahasiswa' => 'Mahasiswa 5',
                'password' => bcrypt('password123'),
                'email' => 'mahasiswa5@example.com',
                'nik_dosen' => 1234567890123460,
                'no_telp' => '0812345678005',
                'kelas' => 'TI-2A',
                'jenis_kelamin' => 'Laki-laki',
                'createdByAdmin' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1000000006,
                'judul_tugas_akhir' => 'Pengolahan Data Besar',
                'nama_mahasiswa' => 'Mahasiswa 6',
                'password' => bcrypt('password123'),
                'email' => 'mahasiswa6@example.com',
                'nik_dosen' => 1234567890123461,
                'no_telp' => '0812345678006',
                'kelas' => 'TI-2B',
                'jenis_kelamin' => 'Perempuan',
                'createdByAdmin' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1000000007,
                'judul_tugas_akhir' => 'Pemrograman Paralel',
                'nama_mahasiswa' => 'Mahasiswa 7',
                'password' => bcrypt('password123'),
                'email' => 'mahasiswa7@example.com',
                'nik_dosen' => 1234567890123462,
                'no_telp' => '0812345678007',
                'kelas' => 'TI-2C',
                'jenis_kelamin' => 'Laki-laki',
                'createdByAdmin' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1000000008,
                'judul_tugas_akhir' => 'Pemrograman Blockchain',
                'nama_mahasiswa' => 'Mahasiswa 8',
                'password' => bcrypt('password123'),
                'email' => 'mahasiswa8@example.com',
                'nik_dosen' => 1234567890123463,
                'no_telp' => '0812345678008',
                'kelas' => 'TI-2D',
                'jenis_kelamin' => 'Perempuan',
                'createdByAdmin' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1000000009,
                'judul_tugas_akhir' => 'Analisis Sistem Cloud Computing',
                'nama_mahasiswa' => 'Mahasiswa 9',
                'password' => bcrypt('password123'),
                'email' => 'mahasiswa9@example.com',
                'nik_dosen' => 1234567890123464,
                'no_telp' => '0812345678009',
                'kelas' => 'TI-3A',
                'jenis_kelamin' => 'Laki-laki',
                'createdByAdmin' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1000000010,
                'judul_tugas_akhir' => 'Implementasi Sistem IoT',
                'nama_mahasiswa' => 'Mahasiswa 10',
                'password' => bcrypt('password123'),
                'email' => 'mahasiswa10@example.com',
                'nik_dosen' => 1234567890123465,
                'no_telp' => '0812345678010',
                'kelas' => 'TI-3B',
                'jenis_kelamin' => 'Perempuan',
                'createdByAdmin' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder untuk tb_pengajuan_jadwal
        DB::table('tb_pengajuanJadwal')->insert([
            [
                'kodePengajuan' => Str::random(20),
                'tanggal_pengajuan' => '2024-12-01',
                'waktu_pengajuan' => '10:00:00',
                'tanggal_anjuranDosen' => '2024-12-03',
                'waktu_anjuranDosen' => '09:00:00',
                'catatan_dosen' => 'Diharapkan hadir tepat waktu.',
                'catatan_mahasiswa' => 'Diajukan untuk evaluasi tugas akhir.',
                'nim' => 1000000001,
                'status' => 'menunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodePengajuan' => Str::random(20),
                'tanggal_pengajuan' => '2024-12-02',
                'waktu_pengajuan' => '11:00:00',
                'tanggal_anjuranDosen' => '2024-12-04',
                'waktu_anjuranDosen' => '10:00:00',
                'catatan_dosen' => 'Jangan lupa membawa dokumen pendukung.',
                'catatan_mahasiswa' => 'Persiapan sidang tugas akhir.',
                'nim' => 1000000002,
                'status' => 'disetujui',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodePengajuan' => Str::random(20),
                'tanggal_pengajuan' => '2024-12-03',
                'waktu_pengajuan' => '13:00:00',
                'tanggal_anjuranDosen' => '2024-12-05',
                'waktu_anjuranDosen' => '14:00:00',
                'catatan_dosen' => 'Dokumen harus lengkap.',
                'catatan_mahasiswa' => 'Pengajuan jadwal revisi.',
                'nim' => 1000000003,
                'status' => 'menunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodePengajuan' => Str::random(20),
                'tanggal_pengajuan' => '2024-12-04',
                'waktu_pengajuan' => '08:30:00',
                'tanggal_anjuranDosen' => '2024-12-06',
                'waktu_anjuranDosen' => '09:30:00',
                'catatan_dosen' => 'Pastikan hadir tepat waktu.',
                'catatan_mahasiswa' => 'Permohonan bimbingan lanjutan.',
                'nim' => 1000000004,
                'status' => 'disetujui',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodePengajuan' => Str::random(20),
                'tanggal_pengajuan' => '2024-12-05',
                'waktu_pengajuan' => '14:00:00',
                'tanggal_anjuranDosen' => '2024-12-07',
                'waktu_anjuranDosen' => '15:00:00',
                'catatan_dosen' => 'Jadwal perlu disesuaikan.',
                'catatan_mahasiswa' => 'Mengajukan jadwal untuk sidang proposal.',
                'nim' => 1000000005,
                'status' => 'alternatif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodePengajuan' => Str::random(20),
                'tanggal_pengajuan' => '2024-12-06',
                'waktu_pengajuan' => '15:00:00',
                'tanggal_anjuranDosen' => '2024-12-08',
                'waktu_anjuranDosen' => '16:00:00',
                'catatan_dosen' => 'Pengajuan ditolak karena jadwal bentrok.',
                'catatan_mahasiswa' => 'Jadwal revisi bimbingan.',
                'nim' => 1000000006,
                'status' => 'ditolak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodePengajuan' => Str::random(20),
                'tanggal_pengajuan' => '2024-12-07',
                'waktu_pengajuan' => '09:00:00',
                'tanggal_anjuranDosen' => '2024-12-09',
                'waktu_anjuranDosen' => '10:00:00',
                'catatan_dosen' => 'Hadir tepat waktu dan siapkan dokumen.',
                'catatan_mahasiswa' => 'Persiapan bimbingan akhir.',
                'nim' => 1000000007,
                'status' => 'menunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodePengajuan' => Str::random(20),
                'tanggal_pengajuan' => '2024-12-08',
                'waktu_pengajuan' => '10:30:00',
                'tanggal_anjuranDosen' => '2024-12-10',
                'waktu_anjuranDosen' => '11:30:00',
                'catatan_dosen' => 'Periksa email untuk dokumen tambahan.',
                'catatan_mahasiswa' => 'Pengajuan jadwal diskusi proyek.',
                'nim' => 1000000008,
                'status' => 'disetujui',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodePengajuan' => Str::random(20),
                'tanggal_pengajuan' => '2024-12-09',
                'waktu_pengajuan' => '11:00:00',
                'tanggal_anjuranDosen' => '2024-12-11',
                'waktu_anjuranDosen' => '12:00:00',
                'catatan_dosen' => 'Pengajuan alternatif diterima.',
                'catatan_mahasiswa' => 'Alternatif jadwal revisi tugas akhir.',
                'nim' => 1000000009,
                'status' => 'alternatif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodePengajuan' => Str::random(20),
                'tanggal_pengajuan' => '2024-12-10',
                'waktu_pengajuan' => '12:30:00',
                'tanggal_anjuranDosen' => '2024-12-12',
                'waktu_anjuranDosen' => '13:30:00',
                'catatan_dosen' => 'Pastikan semua persyaratan sudah terpenuhi.',
                'catatan_mahasiswa' => 'Jadwal konsultasi akhir.',
                'nim' => 1000000010,
                'status' => 'menunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder untuk tb_jadwal_bimbingan
        DB::table('tb_jadwalBimbingan')->insert([
            [
                'kodeJadwal' => Str::random(20),
                'tanggal_bimbingan' => '2024-12-03',
                'waktu_bimbingan' => '09:00:00',
                'tanggal_pelaksanaan' => '2024-12-03',
                'waktu_pelaksanaan' => '09:00:00',
                'catatan_dosen' => 'Diskusikan bab 1.',
                'catatan_mahasiswa' => 'Membahas hasil revisi bab 1.',
                'status' => 'menunggu',
                'kodePengajuan' => 'kode_pengajuan_1',
                'tempat' => 'Ruang Dosen 101',
                'jenis_bimbingan' => 'luring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeJadwal' => Str::random(20),
                'tanggal_bimbingan' => '2024-12-04',
                'waktu_bimbingan' => '10:00:00',
                'tanggal_pelaksanaan' => '2024-12-04',
                'waktu_pelaksanaan' => '10:30:00',
                'catatan_dosen' => 'Lanjutkan pembahasan proposal.',
                'catatan_mahasiswa' => 'Revisi proposal penelitian.',
                'status' => 'menunggu',
                'kodePengajuan' => 'kode_pengajuan_2',
                'tempat' => 'Zoom Meeting',
                'jenis_bimbingan' => 'daring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeJadwal' => Str::random(20),
                'tanggal_bimbingan' => '2024-12-05',
                'waktu_bimbingan' => '11:00:00',
                'tanggal_pelaksanaan' => '2024-12-05',
                'waktu_pelaksanaan' => '11:15:00',
                'catatan_dosen' => 'Bahas hasil analisis data.',
                'catatan_mahasiswa' => 'Melaporkan progres analisis data.',
                'status' => 'diselesaikan',
                'kodePengajuan' => 'kode_pengajuan_3',
                'tempat' => 'Ruang Seminar 202',
                'jenis_bimbingan' => 'luring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeJadwal' => Str::random(20),
                'tanggal_bimbingan' => '2024-12-06',
                'waktu_bimbingan' => '08:00:00',
                'tanggal_pelaksanaan' => '2024-12-06',
                'waktu_pelaksanaan' => '08:30:00',
                'catatan_dosen' => 'Jadwal ulang karena dosen ada rapat.',
                'catatan_mahasiswa' => 'Menunggu jadwal baru.',
                'status' => 'ditunda',
                'kodePengajuan' => 'kode_pengajuan_4',
                'tempat' => 'Google Meet',
                'jenis_bimbingan' => 'daring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeJadwal' => Str::random(20),
                'tanggal_bimbingan' => '2024-12-07',
                'waktu_bimbingan' => '14:00:00',
                'tanggal_pelaksanaan' => '2024-12-07',
                'waktu_pelaksanaan' => '14:30:00',
                'catatan_dosen' => 'Tinjau kembali referensi yang digunakan.',
                'catatan_mahasiswa' => 'Diskusi tambahan referensi.',
                'status' => 'menunggu',
                'kodePengajuan' => 'kode_pengajuan_5',
                'tempat' => 'Ruang Dosen 102',
                'jenis_bimbingan' => 'luring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeJadwal' => Str::random(20),
                'tanggal_bimbingan' => '2024-12-08',
                'waktu_bimbingan' => '15:00:00',
                'tanggal_pelaksanaan' => '2024-12-08',
                'waktu_pelaksanaan' => '15:15:00',
                'catatan_dosen' => 'Presentasikan bab 2.',
                'catatan_mahasiswa' => 'Menyusun bahan presentasi.',
                'status' => 'diselesaikan',
                'kodePengajuan' => 'kode_pengajuan_6',
                'tempat' => 'Ruang Seminar 203',
                'jenis_bimbingan' => 'luring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeJadwal' => Str::random(20),
                'tanggal_bimbingan' => '2024-12-09',
                'waktu_bimbingan' => '10:00:00',
                'tanggal_pelaksanaan' => '2024-12-09',
                'waktu_pelaksanaan' => '10:30:00',
                'catatan_dosen' => 'Revisi bab 3, pembahasan perlu ditambahkan.',
                'catatan_mahasiswa' => 'Melaporkan revisi bab 3.',
                'status' => 'ditunda',
                'kodePengajuan' => 'kode_pengajuan_7',
                'tempat' => 'Zoom Meeting',
                'jenis_bimbingan' => 'daring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeJadwal' => Str::random(20),
                'tanggal_bimbingan' => '2024-12-10',
                'waktu_bimbingan' => '11:00:00',
                'tanggal_pelaksanaan' => '2024-12-10',
                'waktu_pelaksanaan' => '11:15:00',
                'catatan_dosen' => 'Evaluasi progres akhir.',
                'catatan_mahasiswa' => 'Melaporkan hasil akhir.',
                'status' => 'menunggu',
                'kodePengajuan' => 'kode_pengajuan_8',
                'tempat' => 'Google Meet',
                'jenis_bimbingan' => 'daring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeJadwal' => Str::random(20),
                'tanggal_bimbingan' => '2024-12-11',
                'waktu_bimbingan' => '13:00:00',
                'tanggal_pelaksanaan' => '2024-12-11',
                'waktu_pelaksanaan' => '13:30:00',
                'catatan_dosen' => 'Diskusi terkait hasil revisi.',
                'catatan_mahasiswa' => 'Presentasi bab terakhir.',
                'status' => 'diselesaikan',
                'kodePengajuan' => 'kode_pengajuan_9',
                'tempat' => 'Ruang Dosen 103',
                'jenis_bimbingan' => 'luring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeJadwal' => Str::random(20),
                'tanggal_bimbingan' => '2024-12-12',
                'waktu_bimbingan' => '09:30:00',
                'tanggal_pelaksanaan' => '2024-12-12',
                'waktu_pelaksanaan' => '09:45:00',
                'catatan_dosen' => 'Persiapan seminar akhir.',
                'catatan_mahasiswa' => 'Latihan seminar tugas akhir.',
                'status' => 'menunggu',
                'kodePengajuan' => 'kode_pengajuan_10',
                'tempat' => 'Ruang Seminar 204',
                'jenis_bimbingan' => 'luring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder untuk tb_logbook
        DB::table('tb_logbook')->insert([
            [
                'kodeLogbook' => Str::random(20),
                'kodeJadwal' => 'kode_jadwal_1',
                'isi_logbook' => 'Menyelesaikan bab 1 dan revisi beberapa bagian.',
                'judul_logbook' => 'Revisi Bab 1',
                'catatan_dosen' => 'Perlu penambahan referensi.',
                'catatan_mahasiswa' => 'Referensi akan ditambahkan pada revisi berikutnya.',
                'progres' => 20.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeLogbook' => Str::random(20),
                'kodeJadwal' => 'kode_jadwal_2',
                'isi_logbook' => 'Melakukan revisi proposal berdasarkan masukan dosen.',
                'judul_logbook' => 'Revisi Proposal',
                'catatan_dosen' => 'Struktur proposal sudah lebih baik.',
                'catatan_mahasiswa' => 'Struktur diperbaiki sesuai masukan.',
                'progres' => 35.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeLogbook' => Str::random(20),
                'kodeJadwal' => 'kode_jadwal_3',
                'isi_logbook' => 'Analisis data dan menyusun laporan awal.',
                'judul_logbook' => 'Analisis Data',
                'catatan_dosen' => 'Hasil analisis sudah cukup baik.',
                'catatan_mahasiswa' => 'Akan diperbaiki pada bagian kesimpulan.',
                'progres' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeLogbook' => Str::random(20),
                'kodeJadwal' => 'kode_jadwal_4',
                'isi_logbook' => 'Menunggu jadwal bimbingan ulang.',
                'judul_logbook' => 'Penjadwalan Ulang',
                'catatan_dosen' => 'Jadwal akan dikonfirmasi kembali.',
                'catatan_mahasiswa' => 'Siap mengikuti jadwal baru.',
                'progres' => 10.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeLogbook' => Str::random(20),
                'kodeJadwal' => 'kode_jadwal_5',
                'isi_logbook' => 'Menyelesaikan revisi referensi dan diskusi tambahan.',
                'judul_logbook' => 'Revisi Referensi',
                'catatan_dosen' => 'Referensi sudah relevan.',
                'catatan_mahasiswa' => 'Revisi selesai sesuai arahan.',
                'progres' => 60.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeLogbook' => Str::random(20),
                'kodeJadwal' => 'kode_jadwal_6',
                'isi_logbook' => 'Presentasi bab 2 selesai dengan masukan dosen.',
                'judul_logbook' => 'Presentasi Bab 2',
                'catatan_dosen' => 'Presentasi cukup baik, perlu sedikit revisi.',
                'catatan_mahasiswa' => 'Masukan akan segera diterapkan.',
                'progres' => 75.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeLogbook' => Str::random(20),
                'kodeJadwal' => 'kode_jadwal_7',
                'isi_logbook' => 'Melakukan revisi bab 3 terkait pembahasan.',
                'judul_logbook' => 'Revisi Bab 3',
                'catatan_dosen' => 'Pembahasan perlu lebih mendalam.',
                'catatan_mahasiswa' => 'Akan ditambahkan data pendukung.',
                'progres' => 65.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeLogbook' => Str::random(20),
                'kodeJadwal' => 'kode_jadwal_8',
                'isi_logbook' => 'Evaluasi progres akhir sebelum seminar.',
                'judul_logbook' => 'Evaluasi Progres',
                'catatan_dosen' => 'Progres cukup signifikan, persiapkan lebih baik.',
                'catatan_mahasiswa' => 'Persiapan sedang dilakukan.',
                'progres' => 85.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeLogbook' => Str::random(20),
                'kodeJadwal' => 'kode_jadwal_9',
                'isi_logbook' => 'Menyelesaikan revisi akhir dan diskusi tambahan.',
                'judul_logbook' => 'Revisi Akhir',
                'catatan_dosen' => 'Hasil revisi sudah memadai.',
                'catatan_mahasiswa' => 'Revisi selesai dengan baik.',
                'progres' => 95.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodeLogbook' => Str::random(20),
                'kodeJadwal' => 'kode_jadwal_10',
                'isi_logbook' => 'Persiapan untuk seminar akhir selesai.',
                'judul_logbook' => 'Persiapan Seminar',
                'catatan_dosen' => 'Semua sudah sesuai, siap untuk seminar.',
                'catatan_mahasiswa' => 'Siap mengikuti seminar.',
                'progres' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder untuk tb_waktu_dosen
        DB::table('tb_waktuDosen')->insert([
            [
                'nik_dosen' => 1234567890123456,
                'kondisi_senin' => true,
                'kondisi_selasa' => true,
                'kondisi_rabu' => true,
                'kondisi_kamis' => true,
                'kondisi_jumat' => true,
                'kondisi_sabtu' => false,
                'kondisi_minggu' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik_dosen' => 1234567890123457,
                'kondisi_senin' => true,
                'kondisi_selasa' => true,
                'kondisi_rabu' => true,
                'kondisi_kamis' => true,
                'kondisi_jumat' => false,
                'kondisi_sabtu' => false,
                'kondisi_minggu' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik_dosen' => 1234567890123458,
                'kondisi_senin' => false,
                'kondisi_selasa' => true,
                'kondisi_rabu' => true,
                'kondisi_kamis' => true,
                'kondisi_jumat' => true,
                'kondisi_sabtu' => false,
                'kondisi_minggu' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik_dosen' => 1234567890123459,
                'kondisi_senin' => true,
                'kondisi_selasa' => false,
                'kondisi_rabu' => true,
                'kondisi_kamis' => true,
                'kondisi_jumat' => true,
                'kondisi_sabtu' => true,
                'kondisi_minggu' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik_dosen' => 1234567890123460,
                'kondisi_senin' => true,
                'kondisi_selasa' => true,
                'kondisi_rabu' => false,
                'kondisi_kamis' => true,
                'kondisi_jumat' => true,
                'kondisi_sabtu' => false,
                'kondisi_minggu' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik_dosen' => 1234567890123461,
                'kondisi_senin' => false,
                'kondisi_selasa' => true,
                'kondisi_rabu' => true,
                'kondisi_kamis' => true,
                'kondisi_jumat' => false,
                'kondisi_sabtu' => true,
                'kondisi_minggu' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik_dosen' => 1234567890123462,
                'kondisi_senin' => true,
                'kondisi_selasa' => true,
                'kondisi_rabu' => true,
                'kondisi_kamis' => false,
                'kondisi_jumat' => true,
                'kondisi_sabtu' => false,
                'kondisi_minggu' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik_dosen' => 1234567890123463,
                'kondisi_senin' => true,
                'kondisi_selasa' => false,
                'kondisi_rabu' => true,
                'kondisi_kamis' => true,
                'kondisi_jumat' => true,
                'kondisi_sabtu' => true,
                'kondisi_minggu' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik_dosen' => 1234567890123464,
                'kondisi_senin' => true,
                'kondisi_selasa' => true,
                'kondisi_rabu' => false,
                'kondisi_kamis' => true,
                'kondisi_jumat' => true,
                'kondisi_sabtu' => false,
                'kondisi_minggu' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik_dosen' => 1234567890123465,
                'kondisi_senin' => true,
                'kondisi_selasa' => false,
                'kondisi_rabu' => true,
                'kondisi_kamis' => false,
                'kondisi_jumat' => true,
                'kondisi_sabtu' => true,
                'kondisi_minggu' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
