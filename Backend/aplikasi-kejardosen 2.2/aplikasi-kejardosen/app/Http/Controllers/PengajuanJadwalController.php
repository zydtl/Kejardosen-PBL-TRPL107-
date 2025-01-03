<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\PengajuanJadwal;
use App\Models\JadwalBimbingan;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengajuanJadwalController extends Controller
{

    public function boot()
    {
        \Carbon\Carbon::setLocale('id');
    }

    public function showPengajuan()
    {
        Carbon::setLocale('id'); // Set bahasa ke Indonesia
        $pengajuan = PengajuanJadwal::all()->map(function ($item) {

            // Format tanggal diajukan  
            $item->create_at = Carbon::parse($item->create_at)
                ->timezone('Asia/Jakarta') // Pastikan zona waktu WIB
                ->translatedFormat('d F Y, H:i') . ' WIB'; // Format: 14 Desember 2024, 10:00 WIB
            return $item;

            // Format Tanggal Pengajuan
            $item->tanggal_pengajuan = Carbon::parse($item->tanggal_pengajuan)
                ->translatedFormat('d F Y'); // Contoh: 14 Desember 2024

            // Format Waktu Pengajuan
            $item->waktu_pengajuan = Carbon::parse($item->waktu_pengajuan)
                ->timezone('Asia/Jakarta') // Zona WIB
                ->format('H:i') . ' WIB'; // Contoh: 10:00 WIB
            return $item;
        });

        return view('dashboard.mahasiswa.pengajuan', compact('pengajuan'));
    }

    public function index()
    {
        // Ambil NIM mahasiswa yang sedang login
        $nim = Auth::guard('mahasiswa')->user()->nim;

        // Ambil data pengajuan berdasarkan NIM dan status yang diinginkan
        $pengajuan = PengajuanJadwal::where('nim', $nim)
                                ->whereIn('status', ['menunggu', 'alternatif'])
                                ->get();

        // Kirim data ke view
        return view('dashboard.mahasiswa.pengajuan', compact('pengajuan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'tanggal_pengajuan' => 'required|date',
            'waktu_pengajuan' => 'required|date_format:H:i',
            'judul_bimbingan' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        // Ambil NIM mahasiswa yang sedang login
        $nim = Auth::guard('mahasiswa')->user()->nim;

        // Membuat custom primary key berdasarkan tanggal dan waktu
        $kodePengajuan = 'pj' . Carbon::now()->format('dmYHisv');

        // Simpan data pengajuan ke database
        $pengajuan = PengajuanJadwal::create([
            'kodePengajuan' => $kodePengajuan,
            'nim' => $nim,
            'tanggal_pengajuan' => Carbon::parse($request->tanggal_pengajuan)->format('Y-m-d'),
            'waktu_pengajuan' => $request->waktu_pengajuan,
            'judul_bimbingan' => $request->judul_bimbingan,
            'catatan_mahasiswa' => $request->catatan_mahasiswa,
            'status' => 'Menunggu',
            'create_at' => Carbon::now(),
        ]);

        // Mengarahkan ulang ke halaman yang sama setelah berhasil
        if ($pengajuan) {
            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }

    public function update(Request $request, $kodePengajuan)
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
        $pengajuan = PengajuanJadwal::find($kodePengajuan);
        if (!$pengajuan) {
            return response()->json(['error' => 'Pengajuan tidak ditemukan'], 404);
        }

        // Update data pengajuan    
        $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
        $pengajuan->waktu_pengajuan = $request->waktu_pengajuan;
        $pengajuan->judul_bimbingan = $request->judul_bimbingan;
        $pengajuan->catatan_mahasiswa = $request->catatan_mahasiswa;
        $pengajuan->status = 'menunggu';
        $pengajuan->save();

        // Mengarahkan ulang ke halaman yang sama setelah berhasil
        if ($pengajuan) {
            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }

    public function updateStatus(Request $request, $kodePengajuan)
    {
        // Cari pengajuan berdasarkan kodePengajuan
        $pengajuan = PengajuanJadwal::where('kodePengajuan', $kodePengajuan)->first();

        if ($pengajuan) {
            // Perbarui status pengajuan menjadi 'dibatalkan'
            $pengajuan->status = 'dibatalkan';
            $pengajuan->save();

            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }

    public function detail($kodePengajuan)
    {
        $pengajuan = PengajuanJadwal::where('kodePengajuan', $kodePengajuan)->first();

        if (!$pengajuan) {
            return redirect()->route('mahasiswa.pengajuan')->with('error', 'Data tidak ditemukan.');
        }

        return view('dashboard.mahasiswa.detail-pengajuan', compact('pengajuan'));
    }

    public function riwayatPengajuanMahasiswa()
    {
        // Ambil NIM mahasiswa yang sedang login
        $nim = Auth::guard('mahasiswa')->user()->nim;

        // Ambil data pengajuan berdasarkan NIM
        $pengajuan = PengajuanJadwal::where('nim', $nim)->get();

        // Kirim data ke view
        return view('dashboard.mahasiswa.riwayat-pengajuan', compact('pengajuan'));

        dd($pengajuan);

    }


    public function detailRiwayatPengajuanMahasiswa($kodePengajuan)
    {
        $pengajuan = PengajuanJadwal::where('kodePengajuan', $kodePengajuan)->first();

        if (!$pengajuan) {
            return redirect()->route('mahasiswa.riwayat-pengajuan')->with('error', 'Data tidak ditemukan.');
        }

        return view('dashboard.mahasiswa.detail-riwayat-pengajuan', compact('pengajuan'));
    }



    // Dosen =================================================================================================================================================
    public function indexDosen()
    {
        // Mendapatkan dosen yang sedang login
        $dosen = Auth::user();  // Pastikan menggunakan autentikasi yang sesuai

        // Mengambil pengajuan dari mahasiswa yang memiliki nik_dosen yang sama dengan dosen yang login
        // dan status yang diinginkan ("menunggu" dan "alternatif")
        $pengajuan = PengajuanJadwal::whereHas('mahasiswa', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })
        // Tambahkan filter status "menunggu" dan "alternatif"
        ->whereIn('status', ['menunggu', 'alternatif'])  // Menambahkan filter status
        ->get();

        

        return view('dashboard.dosen.pengajuan', compact('pengajuan'));
        return view('dashboard.dosen.pengajuan', compact('data'));
    }




    public function tolakPengajuan(Request $request, $kodePengajuan)
    {
        $pengajuan = PengajuanJadwal::find($kodePengajuan);
        if (!$pengajuan) {
            return response()->json(['error' => 'Pengajuan tidak ditemukan'], 404);
        }

        // Update data pengajuan    
        $pengajuan->catatan_dosen = $request->catatan_dosen;
        $pengajuan->status = 'ditolak';
        $pengajuan->save();

        // Mengarahkan ulang ke halaman yang sama setelah berhasil
        if ($pengajuan) {
            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }

    public function bandingPengajuan(Request $request, $kodePengajuan)
    {
        $pengajuan = PengajuanJadwal::find($kodePengajuan);
        if (!$pengajuan) {
            return response()->json(['error' => 'Pengajuan tidak ditemukan'], 404);
        }

        // Update data pengajuan    
        $pengajuan->catatan_dosen = $request->catatan_dosen;
        $pengajuan->tanggal_anjuranDosen = $request->tanggal_anjuranDosen;
        $pengajuan->waktu_anjuranDosen = $request->waktu_anjuranDosen;
        $pengajuan->status = 'alternatif';
        $pengajuan->save();

        // Mengarahkan ulang ke halaman yang sama setelah berhasil
        if ($pengajuan) {
            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }

    public function terimaPengajuan(Request $request, $kodePengajuan)
    {

        
        // Validasi input
        $validated = $request->validate([
            'jenis_bimbingan' => 'required',
            'tempat' => 'required|string',
            'catatan_dosen' => 'required|string',
        ]);

        // Membuat custom primary key berdasarkan tanggal dan waktu
        $kodeJadwal = 'jb' . Carbon::now()->format('dmYHisv');

        // Cari data pengajuan dari tb_pengajuanJadwal
        $pengajuan = PengajuanJadwal::where('kodePengajuan', $kodePengajuan)->firstOrFail();

        // Update status di tb_pengajuanJadwal
        $pengajuan->status = 'disetujui';
        $pengajuan->save();

        // Insert data ke tb_jadwalBimbingan
        $jadwal = JadwalBimbingan::create([
            'kodeJadwal' => $kodeJadwal,
            'tanggal_bimbingan' => $pengajuan->tanggal_pengajuan, // Mengambil tanggal dari tb_pengajuanJadwal
            'waktu_bimbingan' => $pengajuan->waktu_pengajuan,     // Mengambil waktu dari tb_pengajuanJadwa
            'catatan_dosen' => $request->catatan_dosen,
            'status' => 'berlangsung',
            'kodePengajuan' => $kodePengajuan,
            'tempat' => $request->tempat,
            'jenis_bimbingan' => strtolower($request->jenis_bimbingan),
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
    
    public function riwayatPengajuanDosen()
    {
        // Mendapatkan dosen yang sedang login
        $dosen = Auth::user();  // Pastikan menggunakan autentikasi yang sesuai

        // Mengambil semua pengajuan dari mahasiswa yang memiliki nik_dosen yang sama dengan dosen yang login
        $pengajuan = PengajuanJadwal::whereHas('mahasiswa', function ($query) use ($dosen) {
            $query->where('nik_dosen', $dosen->nik);
        })->get();

        return view('dashboard.dosen.riwayat-pengajuan', compact('pengajuan'));
        return view('dashboard.dosen.riwayat-pengajuan', compact('data'));
    }

    public function detailRiwayatPengajuanDosen($kodePengajuan)
    {
        $pengajuan = PengajuanJadwal::where('kodePengajuan', $kodePengajuan)->first();

        if (!$pengajuan) {
            return redirect()->route('dosen.riwayat-pengajuan')->with('error', 'Data tidak ditemukan.');
        }

        return view('dashboard.dosen.detail-riwayat-pengajuan', compact('pengajuan'));
    }
}
