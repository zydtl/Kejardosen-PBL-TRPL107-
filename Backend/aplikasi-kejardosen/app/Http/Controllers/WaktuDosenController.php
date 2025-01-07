<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\WaktuDosen; // Model WaktuDosen
use App\Models\Mahasiswa; // Model Mahasiswa
use App\Models\Dosen;     // Model Dosen

class WaktuDosenController extends Controller
{
    public function indexMahasiswa(Request $request)
    {
        // Mendapatkan mahasiswa yang sedang login
        $mahasiswa = Auth::guard('mahasiswa')->user();
    
        // Mendapatkan dosen yang berhubungan dengan mahasiswa
        $dosen = $mahasiswa->nik_dosen; // Asumsikan relasi mahasiswa->dosen sudah ada
    
        // Mengambil data waktu dosen
        $waktuDosen = WaktuDosen::whereHas('dosen', function ($query) use ($mahasiswa) {
            $query->where('nik_dosen', $mahasiswa->nik_dosen);
        })->get()->first();


        // Mengirim data ke view
        return view('dashboard.mahasiswa.waktu-dosen', [
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'waktuDosen' => $waktuDosen,
        ]);
    }
    

    public function indexDosen(Request $request)
    {
        // Mendapatkan dosen yang sedang login
        $dosen = Auth::guard('dosen')->user();
    
        // Mengambil data waktu dosen berdasarkan NIK dosen
        $waktuDosen = WaktuDosen::where('nik_dosen', $dosen->nik)->get()->first();
    
        // Mengirim data ke view
        return view('dashboard.dosen.waktu-dosen', [
            'dosen' => $dosen,
            'waktuDosen' => $waktuDosen,
        ]);
    }


    public function update(Request $request, $idWaktuDosen)
    {
        $validatedData = $request->validate([
            'senin' => 'required|boolean',
            'selasa' => 'required|boolean',
            'rabu' => 'required|boolean',
            'kamis' => 'required|boolean',
            'jumat' => 'required|boolean',
            'sabtu' => 'required|boolean',
            'minggu' => 'required|boolean',
        ]);
    
        $waktuDosen = WaktuDosen::find($idWaktuDosen);
        if ($waktuDosen) {
            $waktuDosen->kondisi_senin = $validatedData['senin'];
            $waktuDosen->kondisi_selasa = $validatedData['selasa'];
            $waktuDosen->kondisi_rabu = $validatedData['rabu'];
            $waktuDosen->kondisi_kamis = $validatedData['kamis'];
            $waktuDosen->kondisi_jumat = $validatedData['jumat'];
            $waktuDosen->kondisi_sabtu = $validatedData['sabtu'];
            $waktuDosen->kondisi_minggu = $validatedData['minggu'];
            $waktuDosen->save();
    
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false]);
    }
    

    
}
