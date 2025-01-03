<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\PengajuanJadwal;
use App\Models\JadwalBimbingan;
use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DashboardController extends Controller
{   

    //Punya Dosen ============================================================================================================================================================================================


    public function indexDosen(Request $request)
    {
        // Mendapatkan dosen yang sedang login
        $dosen = $request->user(); // Jika menggunakan middleware auth:dosen

        // Menghitung Jumlah --------------------------------------------------------------------------------------------------------------

        // Hitung jumlah bimbingan mahasiswa
        $bimbinganBerlangsung = JadwalBimbingan::whereHas('mahasiswa', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })
        ->whereIn('status', ['berlangsung', 'ditunda'])  // Menambahkan filter status
        ->count(); // Hitung jumlah bimbingan

        // Hitung jumlah pengajuan mahasiswa
        $pengajuan = PengajuanJadwal::whereHas('mahasiswa', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })
        ->whereIn('status', ['menunggu', 'alternatif'])  // Menambahkan filter status
        ->count(); // Hitung jumlah pengajuan


        // Datanya string --------------------------------------------------------------------------------------------------------------
        // Hitung jumlah bimbingan mahasiswa
        $jadwal = JadwalBimbingan::whereHas('mahasiswa', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })
        ->whereIn('status', ['berlangsung', 'ditunda'])  // Menambahkan filter status
        ->get(); // Hitung jumlah bimbingan


        // Mengirim data kehalaman --------------------------------------------------------------------------------------------------------------
        return view('dashboard.dosen.dashboard', [
            'dosen' => $dosen,
            'bimbinganBerlangsung' => $bimbinganBerlangsung,
            'pengajuanMenunggu' => $pengajuan,
            'jadwal' => $jadwal,
        ]);
    }

    public function profileDosen(Request $request)
    {
        // Mendapatkan dosen yang sedang login
        $dosen = Auth::user();  // Pastikan menggunakan autentikasi yang sesuai

        $mahasiswa = Mahasiswa::whereHas('dosen', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })->count(); // Hitung jumlah bimbingan 

        return view('dashboard.dosen.profile', [
            'dosen' => $dosen,
            'mahasiswa' => $mahasiswa,
        ]);
    }

    //Punya Mahasiswa ============================================================================================================================================================================================

    public function indexMahasiswa(Request $request)
    {
        // Mendapatkan mahasiswa yang sedang login
        // Mendapatkan mahasiswa yang sedang login
        $mahasiswa = Auth::guard('mahasiswa')->user(); // Menggunakan guard mahasiswa

        // Memastikan NIM mahasiswa yang sedang login
        $nim = $mahasiswa->nim;

        // Menghitung Jumlah --------------------------------------------------------------------------------------------------------------

        // Hitung jumlah bimbingan mahasiswa
        $jadwal = JadwalBimbingan::whereHas('pengajuan', function ($query) use ($nim) {
            $query->where('nim', $nim); // Filter berdasarkan NIM
        })
        ->whereIn('status', ['berlangsung', 'ditunda']) // Filter status
        ->get(); // Hitung jumlah bimbingan


        // Memastikan NIM mahasiswa yang sedang login
        $nim = $mahasiswa->nim;

        // Mengambil jadwal bimbingan berdasarkan NIM mahasiswa dan status tertentu
        $logbook = Logbook::whereHas('jadwal', function ($query) use ($nim) {
            $query->whereHas('pengajuan', function ($subQuery) use ($nim) {
                $subQuery->where('nim', $nim);
            });
        })->latest()->first();
        


        // Mengirim data kehalaman --------------------------------------------------------------------------------------------------------------
        return view('dashboard.mahasiswa.dashboard', [
            'mahasiswa' => $mahasiswa,
            'jadwal' => $jadwal,
            'logbook' => $logbook,
        ]);
    }



    public function profileMahasiswa(Request $request)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user(); // Menggunakan guard mahasiswa

        // Memastikan NIM mahasiswa yang sedang login
        $nim = $mahasiswa->nim;

        return view('dashboard.mahasiswa.profile', [
            'mahasiswa' => $mahasiswa,
        ]);
    }

    //Punya Mahasiswa ============================================================================================================================================================================================
    public function indexAdmin(Request $request)
    {
        $admin = Auth::guard('admin')->user(); // Menggunakan guard mahasiswa
        $dosen = Dosen::all()->count();
        $mahasiswa = Mahasiswa::all()->count();
        // $jadwal = JadwalBimbingan::all()->whereIn('status', ['menunggu', 'alternatif'])->count();
        $jadwal = JadwalBimbingan::whereIn('status', ['berlangsung', 'ditunda'])->count();



        // Mengirim data kehalaman --------------------------------------------------------------------------------------------------------------
        return view('dashboard.admin.dashboard', [
            'admin' => $admin,
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'jadwal' => $jadwal,
        ]);
    }



}
