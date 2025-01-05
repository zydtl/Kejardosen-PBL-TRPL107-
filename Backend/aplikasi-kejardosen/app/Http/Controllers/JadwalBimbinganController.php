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


class JadwalBimbinganController extends Controller
{

    // Dosen =================================================================================================================================================
    public function indexDosen()
    {
        // Mendapatkan dosen yang sedang login
        $dosen = Auth::user();  // Pastikan menggunakan autentikasi yang sesuai

        // Mengambil pengajuan dari mahasiswa yang memiliki nik_dosen yang sama dengan dosen yang login
        // dan status yang diinginkan ("menunggu" dan "alternatif")
        $jadwal = JadwalBimbingan::whereHas('mahasiswa', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })
        // Tambahkan filter status "berlangsung" dan "ditunda"
        ->whereIn('status', ['berlangsung', 'ditunda'])  // Menambahkan filter status
        ->get();

        

        return view('dashboard.dosen.jadwal-bimbingan', compact('jadwal'));
        return view('dashboard.dosen.jadwal-bimbingan', compact('data'));
    }

    public function detailDosen($kodeJadwal)
    {
        $jadwal = JadwalBimbingan::where('kodeJadwal', $kodeJadwal)->first();

        if (!$jadwal) {
            return redirect()->route('dosen.jadwal-bimbingan')->with('error', 'Data tidak ditemukan.');
        }
        return view('dashboard.dosen.detail-jadwal-bimbingan', compact('jadwal'));
    }


    public function tunda(Request $request, $kodeJadwal)
    {

        // Validasi data yang diterima
        // try {
        //     $validated = $request->validate([
        //         'tanggal_pengajuan' => 'required|date',
        //         'waktu_pengajuan' => 'required|date_format:H:i',
        //         'judul_bimbingan' => 'required|string',
        //         'catatan_mahasiswa' => 'nullable|string',
        //     ]);
        // } catch (\Throwable $th) {
        //     die($th->getMessage());
        // }


        // Temukan pengajuan berdasarkan kodePengajuan
        $jadwal = JadwalBimbingan::find($kodeJadwal);
        if (!$jadwal) {
            return response()->json(['error' => 'Jadwal tidak ditemukan'], 404);
        }

        // Update data pengajuan    
        $jadwal->tanggal_bimbingan = $request->tanggal_bimbingan;
        $jadwal->waktu_bimbingan = $request->waktu_bimbingan;
        $jadwal->catatan_dosen = $request->catatan_dosen;
        $jadwal->status = 'ditunda';
        $jadwal->save();

        // Mengarahkan ulang ke halaman yang sama setelah berhasil
        if ($jadwal) {
            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }


    public function batalkanDosen(Request $request, $kodeJadwal)
    {

        // Temukan pengajuan berdasarkan kodePengajuan
        $jadwal = JadwalBimbingan::find($kodeJadwal);
        if (!$jadwal) {
            return response()->json(['error' => 'Jadwal tidak ditemukan'], 404);
        }

        // Update data pengajuan    
        $jadwal->catatan_dosen = $request->input('catatan_dosen');;
        $jadwal->status = 'dibatalkan';
        $jadwal->batalkan = 'dosen';
        $jadwal->save();

        // Mengarahkan ulang ke halaman yang sama setelah berhasil
        if ($jadwal) {
            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }

    public function riwayatJadwalDosen()
    {
        // Ambil NIK Dosen yang sedang login
        $dosen = Auth::user();  // Pastikan menggunakan autentikasi yang sesuai

        // Mengambil jadwal dari mahasiswa yang memiliki nik_dosen yang sama dengan dosen yang login
        $jadwal = JadwalBimbingan::whereHas('mahasiswa', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })->get();

        // Kirim data ke view
        return view('dashboard.dosen.riwayat-jadwal-bimbingan', compact('jadwal'));

        dd($jadwal);

    }


    public function detailRiwayatDosen($kodeJadwal)
    {
        $jadwal = JadwalBimbingan::where('kodeJadwal', $kodeJadwal)->first();

        if (!$jadwal) {
            return redirect()->route('mahasiswa.riwayat-jadwal-bimbingan')->with('error', 'Data tidak ditemukan.');
        }

        return view('dashboard.dosen.detail-riwayat-jadwal-bimbingan', compact('jadwal'));
    }



// Mahasiswa =========================================================================================================================================================================================================================

    public function indexMahasiswa()
    {
        // Mendapatkan mahasiswa yang sedang login
        $mahasiswa = Auth::guard('mahasiswa')->user(); // Menggunakan guard mahasiswa

        // Memastikan NIM mahasiswa yang sedang login
        $nim = $mahasiswa->nim;

        // Mengambil jadwal bimbingan berdasarkan NIM mahasiswa dan status tertentu
        $jadwal = JadwalBimbingan::whereHas('pengajuan', function ($query) use ($nim) {
            $query->where('nim', $nim); // Filter berdasarkan NIM
        })
        ->whereIn('status', ['berlangsung', 'ditunda']) // Filter status
        ->get();

        

        return view('dashboard.mahasiswa.jadwal-bimbingan', compact('jadwal'));
        return view('dashboard.mahasiswa.jadwal-bimbingan', compact('data'));
    }

    public function detailMahasiswa($kodeJadwal)
    {
        $jadwal = JadwalBimbingan::where('kodeJadwal', $kodeJadwal)->first();

        if (!$jadwal) {
            return redirect()->route('mahasiswa.jadwal-bimbingan')->with('error', 'Data tidak ditemukan.');
        }
        return view('dashboard.mahasiswa.detail-jadwal-bimbingan', compact('jadwal'));
    }

    public function selesai(Request $request, $kodeJadwal)
    {

        
        // Validasi input
        // $validated = $request->validate([
        //     'jenis_bimbingan' => 'required',
        //     'tempat' => 'required|string',
        //     'catatan_dosen' => 'required|string',
        // ]);

        // Membuat custom primary key berdasarkan tanggal dan waktu
        $kodeLogbook = 'lb' . Carbon::now()->format('dmYHisv');

        // Cari data jadwal dari tb_jadwalBimbingan
        $jadwal = JadwalBimbingan::where('kodeJadwal', $kodeJadwal)->firstOrFail();

        // Cari data pengajuan terkait untuk mendapatkan `judul_bimbingan`
        $pengajuan = PengajuanJadwal::where('kodePengajuan', $jadwal->kodePengajuan)->first();

        
        
        // Update status di tb_pengajuanJadwal
        $jadwal->status = 'diselesaikan';
        $jadwal->tanggal_pelaksanaan = Carbon::now();
        $jadwal->waktu_pelaksanaan = Carbon::now();
        $jadwal->save();

        // Insert data ke tb_logbook
        $jadwal = Logbook::create([
            'kodeLogbook' => $kodeLogbook,
            'kodeJadwal' => $kodeJadwal,
            'judul_logbook' => $pengajuan->judul_bimbingan, // Ambil judul dari pengajuan
            'create_at' => Carbon::now(),
        ]);



        if ($jadwal) {
            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }

    public function batalkanMahasiswa(Request $request, $kodeJadwal)
    {

        // Temukan pengajuan berdasarkan kodePengajuan
        $jadwal = JadwalBimbingan::find($kodeJadwal);
        if (!$jadwal) {
            return response()->json(['error' => 'Jadwal tidak ditemukan'], 404);
        }

        // Update data pengajuan    
        $jadwal->catatan_mahasiswa = $request->input('catatan_mahasiswa');;
        $jadwal->status = 'dibatalkan';
        $jadwal->batalkan = 'mahasiswa';
        $jadwal->save();

        // Mengarahkan ulang ke halaman yang sama setelah berhasil
        if ($jadwal) {
            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }

    public function riwayatJadwalMahasiswa()
    {
        // Ambil NIM mahasiswa yang sedang login
        $nim = Auth::guard('mahasiswa')->user()->nim;

        // Ambil data jadwal berdasarkan NIM
        $jadwal = JadwalBimbingan::whereHas('pengajuan', function ($query) use ($nim) {
            $query->where('nim', $nim); // Filter berdasarkan NIM
        })->get();

        // Kirim data ke view
        return view('dashboard.mahasiswa.riwayat-jadwal-bimbingan', compact('jadwal'));

        dd($jadwal);

    }


    public function detailRiwayatMahasiswa($kodeJadwal)
    {
        $jadwal = JadwalBimbingan::where('kodeJadwal', $kodeJadwal)->first();

        if (!$jadwal) {
            return redirect()->route('mahasiswa.riwayat-jadwal-bimbingan')->with('error', 'Data tidak ditemukan.');
        }

        return view('dashboard.mahasiswa.detail-riwayat-jadwal-bimbingan', compact('jadwal'));
    }

}
