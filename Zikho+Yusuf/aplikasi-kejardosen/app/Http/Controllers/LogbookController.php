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
        ]);

        // Redirect ke halaman logbook dengan pesan sukses
        return redirect()->route('mahasiswa.logbook')->with('success', 'Logbook berhasil diperbarui.');
    }

    // Halaman 1: Menampilkan daftar mahasiswa dengan logbook terbaru berdasarkan dosen
    public function indexDosen()
    {
        // Mendapatkan dosen yang sedang login
        $dosen = Auth::user();  // Menggunakan autentikasi dosen
        
        // Mengambil mahasiswa yang memiliki nik_dosen yang sama dengan dosen yang login
        // Mengambil logbook terbaru untuk setiap mahasiswa
        $mahasiswa = Mahasiswa::where('nik_dosen', $dosen->nik)
            ->with(['logbook' => function($query) {
                $query->latest()->first();  // Mengambil logbook terbaru
            }])
            ->get();
    
        // Debug untuk melihat apakah data benar
        dd($mahasiswa);
    
        // Mengirimkan data mahasiswa beserta logbook ke view
        return view('dashboard.dosen.logbook', compact('mahasiswa'));
    }
    
    
    
    

    // Halaman 2: Menampilkan seluruh logbook mahasiswa
    public function indexMahasiswaDosen($nim)
    {
        // Query seluruh logbook berdasarkan NIM mahasiswa
        $logbook = Logbook::where('nim_mahasiswa', $nim)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('dashboard.dosen.daftar-logbook', compact('logbook', 'nim'));
    }

    // Halaman 3: Menampilkan detail logbook tertentu
    public function showLogbookDetail($kodeLogbook)
    {
        // Query detail logbook berdasarkan kode logbook
        $logbook = Logbook::where('kode_logbook', $kodeLogbook)->firstOrFail();

        return view('dashboard.dosen.form-logbook', compact('logbook'));
    }

    // (Opsional) Simpan catatan dosen ke logbook
    public function updateLogbook(Request $request, $kodeLogbook)
    {
        $request->validate([
            'catatan_dosen' => 'required|string',
        ]);

        // Update logbook dengan catatan dosen
        $logbook = Logbook::where('kode_logbook', $kodeLogbook)->firstOrFail();
        $logbook->catatan_dosen = $request->input('catatan_dosen');
        $logbook->save();

        return redirect()->back()->with('success', 'Catatan dosen berhasil disimpan.');
    }


}
