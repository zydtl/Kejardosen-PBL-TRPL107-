<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\PengajuanJadwal;
use App\Models\JadwalBimbingan;
use App\Models\Logbook;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 


class LogbookController extends Controller
{

    public function indexMahasiswa()
    {
        // Mendapatkan mahasiswa yang sedang login
        $mahasiswa = Auth::guard('mahasiswa')->user(); // Menggunakan guard mahasiswa

        // Memastikan NIM mahasiswa yang sedang login
        $nim = $mahasiswa->nim;

        // Mengambil jadwal bimbingan berdasarkan NIM mahasiswa dan status tertentu
        $logbook = Logbook::whereHas('jadwal', function ($query) use ($nim) {
            $query->whereHas('pengajuan', function ($subQuery) use ($nim) {
                $subQuery->where('nim', $nim);
            });
        })->get();
        

        

        return view('dashboard.mahasiswa.logbook', compact('logbook'));
        return view('dashboard.mahasiswa.logbook', compact('data'));
    }

    public function formLogbookMahasiswa($kodeLogbook)
    {
        $logbook = Logbook::where('kodeLogbook', $kodeLogbook)->first();

        if (!$logbook) {
            return redirect()->route('mahasiswa.logbook')->with('error', 'Data tidak ditemukan.');
        }

        return view('dashboard.mahasiswa.form-logbook', compact('logbook'));
    }

    public function updateMahasiswa(Request $request, $kodeLogbook)
    {
        // Validasi input
        $validated = $request->validate([
            'judul_logbook' => 'required|string|max:255',
            'progres' => 'required|numeric|min:0|max:100',
            'catatan_mahasiswa' => 'nullable',
        ]);

        // Cari logbook berdasarkan kodeLogbook
        $logbook = Logbook::where('kodeLogbook', $kodeLogbook)->first();

        if (!$logbook) {
            return redirect()->route('mahasiswa.logbook')->with('error', 'Logbook tidak ditemukan.');
        }

        // Update hanya kolom yang dapat diedit
        $logbook->update([
            'judul_logbook' => $validated['judul_logbook'],
            'progres' => $validated['progres'],
            'catatan_mahasiswa' => $validated['catatan_mahasiswa'] ?? $logbook->catatan_mahasiswa, // Biarkan nilai lama jika kosong
            'notifikasi_mahasiswa' => Carbon::now(), // Update kolom notifikasi_mahasiswa dengan waktu sekarang
        ]);

        // Redirect ke halaman logbook dengan pesan sukses
        return redirect()->route('mahasiswa.logbook')->with('success', 'Logbook berhasil diperbarui.');
    }

    public function showLogbookDetailMahasiswa($kodeLogbook)
    {
        // Query detail logbook berdasarkan kode logbook
        $logbook = Logbook::where('kodeLogbook', $kodeLogbook)->first();

        if (!$logbook) {
            return redirect()->route('mahasiswa.logbook')->with('error', 'Data tidak ditemukan.');
        }   

        return view('dashboard.mahasiswa.detail-logbook', compact('logbook'));
    }
    //Dosen =========================================================================================================================================

    // Halaman 1: Menampilkan daftar mahasiswa dengan logbook terbaru berdasarkan dosen
    public function indexDosen()
    {
        // Mendapatkan dosen yang sedang login
        $dosen = Auth::user();
    
        // Ambil mahasiswa yang dibimbing dosen dan logbook terbaru
        $mahasiswa = Mahasiswa::with(['pengajuan.jadwal.logbooks' => function ($query) {
            $query->latest('created_at'); // Ambil logbook terbaru berdasarkan waktu pembuatan
        }])
        ->whereHas('dosen', function ($query) use ($dosen) {
            $query->where('nik', $dosen->nik); // Filter berdasarkan dosen yang login
        })
        ->get();
    
        // Kirim data ke view
        return view('dashboard.dosen.logbook', compact('mahasiswa'));
    }

    // Halaman 2: Menampilkan seluruh logbook mahasiswa yang dipilih
    public function indexMahasiswaDosen($nim)
    {
        // Ambil mahasiswa berdasarkan NIM dan semua logbook yang terkait
        $mahasiswa = Mahasiswa::with(['pengajuan.jadwal.logbooks' => function ($query) {
            $query->orderBy('created_at', 'asc'); // Urutkan berdasarkan waktu pembuatan dari terlama
        }])
        ->where('nim', $nim)
        ->first();
    
        // Ambil semua logbook terkait mahasiswa
        $logbook = $mahasiswa->pengajuan->flatMap->jadwal->flatMap->logbooks->sortBy('created_at');
    
        // Kirim data ke view
        return view('dashboard.dosen.daftar-logbook', compact('logbook', 'nim'));
    }
    
    

    // Halaman 3: Menampilkan detail logbook tertentu
    public function showLogbookDetailDosen($kodeLogbook)
    {
        // Query detail logbook berdasarkan kode logbook
        $logbook = Logbook::where('kodeLogbook', $kodeLogbook)->firstOrFail();

        return view('dashboard.dosen.detail-logbook', compact('logbook'));
    }

    //tampil halaman edit logbook
    public function formLogbookDosen($kodeLogbook)
    {
        $logbook = Logbook::where('kodeLogbook', $kodeLogbook)->first();

        if (!$logbook) {
            return redirect()->route('dosen.daftar-logbook')->with('error', 'Data tidak ditemukan.');
        }

        return view('dashboard.dosen.form-logbook', compact('logbook'));
    }
    
    //Edit catatan dosen ke logbook
    public function updateDosen(Request $request, $kodeLogbook)
    {
        $request->validate([
            'catatan_dosen' => 'nullable',
        ]);

        // Update logbook dengan catatan dosen
        $logbook = Logbook::where('kodeLogbook', $kodeLogbook)->firstOrFail();

        // Ambil nim melalui relasi logbook -> jadwal -> pengajuan -> mahasiswa
        $nim = $logbook->jadwal->pengajuan->mahasiswa->nim;

        $logbook->update([

            'catatan_dosen' => $request['catatan_dosen'] ?? $logbook->catatan_dosen, // Biarkan nilai lama jika kosong
            'notifikasi_dosen' => Carbon::now(), // Update kolom notifikasi_dosen dengan waktu sekarang
        ]);

        // $logbook->catatan_dosen = $request->input('catatan_dosen');
        // $logbook->save();

        // Redirect dengan parameter nim
        return redirect()->route('dosen.daftar-logbook', ['nim' => $nim])->with('success', 'Catatan dosen berhasil disimpan.');

    }


}
