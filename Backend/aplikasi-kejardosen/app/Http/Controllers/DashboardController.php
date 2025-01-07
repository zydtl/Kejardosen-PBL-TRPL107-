<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\WaktuDosenDosen;
use App\Models\PengajuanJadwal;
use App\Models\JadwalBimbingan;
use App\Models\Logbook;
use App\Models\WaktuDosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{   

    //Punya Dosen ============================================================================================================================================================================================


    public function indexDosen(Request $request)
    {
        // Mendapatkan dosen yang sedang login
        $dosen = $request->user(); // Jika menggunakan middleware auth:dosen
    
        // waktu dosen
        $waktuDosen = WaktuDosen::where('nik_dosen', $dosen->nik)->get()->first();


        // Menghitung jumlah bimbingan mahasiswa
        $bimbinganBerlangsung = JadwalBimbingan::whereHas('mahasiswa', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })->whereIn('status', ['berlangsung', 'ditunda'])->count();
    
        // Menghitung jumlah pengajuan mahasiswa
        $pengajuan = PengajuanJadwal::whereHas('mahasiswa', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })->whereIn('status', ['menunggu', 'alternatif'])->count();
    
        // Mengambil data jadwal bimbingan
        $jadwal = JadwalBimbingan::whereHas('mahasiswa', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })->whereIn('status', ['berlangsung', 'ditunda'])->get();
    
        // Menggabungkan notifikasi dari berbagai sumber

        $notifikasi = collect();

        // Notifikasi pengajuan
        $pengajuanNotifikasi = PengajuanJadwal::with('mahasiswa')
            ->whereHas('mahasiswa', function ($query) use ($dosen) {
                $query->where('nik_dosen', $dosen->nik);
            })
            ->whereIn('status', ['menunggu'])
            ->get()
            ->map(function ($item) {
                return [
                    'updated_at' => $item->updated_at,
                    'type' => 'Pengajuan Jadwal',
                    'mahasiswa' => $item->mahasiswa->nama_mahasiswa,
                    'description' => 'mengajukan jadwal bimbingan. Silakan tinjau dan konfirmasi.',
                ];
            });
    
        // Notifikasi jadwal
        $jadwalNotifikasi = JadwalBimbingan::with('pengajuan.mahasiswa')
            ->whereHas('pengajuan.mahasiswa', function ($query) use ($dosen) {
                $query->where('nik_dosen', $dosen->nik);
            })
            ->whereIn('status', ['dibatalkan'])
            ->where('batalkan', 'mahasiswa') // Memastikan 'batalkan' memiliki nilai 'mahasiswa'
            ->get()
            ->map(function ($item) {
                return [
                    'updated_at' => $item->updated_at,
                    'type' => 'Bimbingan Dibatalkan',
                    'mahasiswa' => $item->pengajuan->mahasiswa->nama_mahasiswa,
                    'description' => 'membatalkan jadwal bimbingan, Periksa untuk detail lebih lanjut.',
                ];
            });
    
        // Notifikasi logbook
        $logbookNotifikasi = Logbook::with('jadwal.pengajuan.mahasiswa')
            ->whereHas('jadwal.pengajuan.mahasiswa', function ($query) use ($dosen) {
                $query->where('nik_dosen', $dosen->nik);
            })
            ->whereNotNull('notifikasi_mahasiswa')
            ->get()
            ->map(function ($item) {
                return [
                    // 'updated_at' => $item->updated_at,
                    'updated_at' => $item->notifikasi_mahasiswa,
                    'type' => 'Logbook',
                    'mahasiswa' => $item->jadwal->pengajuan->mahasiswa->nama_mahasiswa,
                    'description' => 'baru saja mengisi logbook, Segera periksa.',
                ];
            });
    
        // Gabungkan notifikasi
        $notifikasi = $notifikasi
            ->merge($pengajuanNotifikasi)
            ->merge($jadwalNotifikasi)
            ->merge($logbookNotifikasi)
            ->sortByDesc('updated_at')
            ->take(5);
            
    
        // Kirim data ke view
        return view('dashboard.dosen.dashboard', [
            'dosen' => $dosen,
            'bimbinganBerlangsung' => $bimbinganBerlangsung,
            'pengajuanMenunggu' => $pengajuan,
            'jadwal' => $jadwal,
            'notifikasi' => $notifikasi,
            'waktuDosen' => $waktuDosen,
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

        $mahasiswaWaktuDosen = $mahasiswa;

        $waktuDosen = WaktuDosen::whereHas('dosen', function ($query) use ($mahasiswa) {
            $query->where('nik_dosen', $mahasiswa->nik_dosen);
        })->get()->first();
        
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
        
        // Notifikasi *********************************************************************************************
        // Inisialisasi koleksi notifikasi
        $notifikasi = collect();

        // Notifikasi pengajuan
        $PengajuanDiterimaNotifikasi = PengajuanJadwal::where('nim', $nim)
            ->whereIn('status', ['disetujui'])
            ->get()
            ->map(function ($item) {
                return [
                    'updated_at' => $item->updated_at,
                    'type' => 'Pengajuan Disetujui',
                    'description' => 'Pengajuan bimbingan Anda telah disetujui oleh ' . optional($item->mahasiswa->dosen)->nama_dosen . '.',
                ];
            });

        $PengajuanDitolakNotifikasi = PengajuanJadwal::where('nim', $nim)
            ->whereIn('status', ['ditolak'])
            ->get()
            ->map(function ($item) {
                return [
                    'updated_at' => $item->updated_at,
                    'type' => 'Pengajuan Ditolak',
                    'description' => 'Pengajuan bimbingan Anda ditolak oleh ' . optional($item->mahasiswa->dosen)->nama_dosen . '.',
                ];
            });

        $PengajuanAlternatifNotifikasi = PengajuanJadwal::where('nim', $nim)
            ->whereIn('status', ['alternatif'])
            ->get()
            ->map(function ($item) {
                return [
                    'updated_at' => $item->updated_at,
                    'type' => 'Pengajuan Alternatif',
                    'description' => optional($item->mahasiswa->dosen)->nama_dosen . ' telah mengajukan rekomendasi jadwal bimbingan baru. Silakan periksa.',
                ];
            });

        // Notifikasi jadwal
        $BimbinganDibatalkanNotifikasi = JadwalBimbingan::whereHas('pengajuan', function ($query) use ($nim) {
            $query->where('nim', $nim);
        })
            ->whereIn('status', ['dibatalkan'])
            ->get()
            ->map(function ($item) {
                return [
                    'updated_at' => $item->updated_at,
                    'type' => 'Bimbingan Dibatalkan',
                    'description' => 'Bimbingan Anda dibatalkan oleh ' . optional($item->pengajuan->mahasiswa->dosen)->nama_dosen . ', periksa untuk detail lebih lanjut.',
                ];
            });

        $BimbinganDitundaNotifikasi = JadwalBimbingan::whereHas('pengajuan', function ($query) use ($nim) {
            $query->where('nim', $nim);
        })
            ->whereIn('status', ['ditunda'])
            ->get()
            ->map(function ($item) {
                return [
                    'updated_at' => $item->updated_at,
                    'type' => 'Jadwal Diperbarui',
                    'description' => optional($item->pengajuan->mahasiswa->dosen)->nama_dosen . ' telah menunda waktu bimbingan. Segera periksa jadwal baru Anda!',
                ];
            });

        // Notifikasi logbook
        $LogbookNotifikasi = Logbook::whereHas('jadwal.pengajuan', function ($query) use ($nim) {
            $query->where('nim', $nim);
        })
            ->get()
            ->map(function ($item) {
                return [
                    'updated_at' => $item->created_at,
                    'type' => 'Pengingat Logbook',
                    'description' => 'Jangan lupa mengisi logbook setelah bimbingan Anda selesai.',
                ];
            });
    
        $LogbookDitanggapiNotifikasi = Logbook::whereHas('jadwal.pengajuan', function ($query) use ($nim) {
            $query->where('nim', $nim);
        })
            ->whereNotNull('notifikasi_dosen')
            ->get()
            ->map(function ($item) {
                return [
                    'updated_at' => $item->notifikasi_dosen,
                    'type' => 'Logbook Ditanggapi',
                    'description' => optional($item->jadwal->pengajuan->mahasiswa->dosen)->nama_dosen . ' telah mengisi catatan di logbook Anda. Silakan periksa.',
                ];
            });

        // Gabungkan notifikasi
        $notifikasi = $notifikasi
            ->merge($PengajuanDiterimaNotifikasi)
            ->merge($PengajuanDitolakNotifikasi)
            ->merge($PengajuanAlternatifNotifikasi)
            ->merge($BimbinganDibatalkanNotifikasi)
            ->merge($BimbinganDitundaNotifikasi)
            ->merge($LogbookNotifikasi)
            ->merge($LogbookDitanggapiNotifikasi)
            ->sortByDesc('updated_at')
            ->take(5);

        // Mengirim data kehalaman --------------------------------------------------------------------------------------------------------------
        return view('dashboard.mahasiswa.dashboard', [
            'mahasiswa' => $mahasiswa,
            'jadwal' => $jadwal,
            'logbook' => $logbook,
            'notifications' => $notifikasi,
            'waktuDosen' => $waktuDosen,
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
