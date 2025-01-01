<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use Carbon\Carbon;

class KehendakAdminController extends Controller
{

//Dosen ================================================================================================================================================= 

    // Tampilkan daftar dosen
    public function index()
    {
        $dosen = Dosen::all();

        // Menambahkan data apakah dosen memiliki mahasiswa yang terkait
        foreach ($dosen as $d) {
            $d->has_mahasiswa = $d->mahasiswa()->exists(); // Mengecek apakah dosen memiliki mahasiswa terkait
        }

        return view('dashboard.admin.daftar-dosen', compact('dosen'));
    }

    public function store(Request $request)
    {
        // Validasi input data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'jenis_kelamin' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:tb_dosen,email',
            // 'password' => 'required|string|min:6',
            'password' => 'required|string',
        ]);
        


        $idAdministrator = Auth::guard('admin')->user()->idAdministrator;
        // echo '<pre>';
        // print_r(Auth::guard('admin')->user());




        $createDosen = Dosen::create([

            'nama_dosen' => $request->nama,
            'nik' => $request->nik,
            'createdByAdmin' => $idAdministrator,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'password' => bcrypt($request->password), // mengenkripsi password
            
            'create_at' => Carbon::now(),


        ]);

        // Mengarahkan ulang ke halaman yang sama setelah berhasil
        if ($createDosen) {
            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }

    public function update(Request $request, $nik)
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


        // Temukan dosen berdasarkan nik
        $dosen = Dosen::find($nik);
        if (!$dosen) {
            return response()->json(['error' => 'Pengajuan tidak ditemukan'], 404);
        }


        // Update data dosen   
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->nik = $request->nik;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->no_telp = $request->no_telp;
        $dosen->email = $request->email;
        if (!empty ($request->password)){
            $dosen->password = bcrypt($request->password);
        }
        
        $dosen->save();

        // Mengarahkan ulang ke halaman yang sama setelah berhasil
        if ($dosen) {
            // Kembalikan respons sukses
            return response()->json(['success' => true]);
        } else {
            // Jika pengajuan tidak ditemukan
            return response()->json(['success' => false]);
        }
    }

    public function destroy($nik)
    {
        // Temukan dosen berdasarkan nik
        $dosen = Dosen::find($nik);

        // Jika dosen tidak ditemukan
        if (!$dosen) {
            return response()->json(['error' => 'Dosen tidak ditemukan'], 404);
        }

        // Periksa apakah dosen memiliki mahasiswa terkait
        if ($dosen->mahasiswa()->exists()) {
            return response()->json(['error' => 'Dosen ini memiliki mahasiswa terkait dan tidak bisa dihapus'], 400);
        }

        // Hapus dosen
        $dosen->delete();

        // Kembalikan respons sukses
        return response()->json(['success' => true]);
    }


    // Tampilkan informasi detail dosen
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return response()->json($dosen);
    }

// Mahasiswa ==========================================================================================================================================================================

    // Tampilkan daftar mahasiswa
    public function indexMahasiswa()
    {
        $mahasiswa = Mahasiswa::all();

        $dosen = Dosen::all(); // Ambil semua dosen dari database
        
        // Menambahkan data apakah mahasiswa memiliki dosen yang terkait
        foreach ($mahasiswa as $m) {
            $m->has_dosen = $m->dosen()->exists(); // Mengecek apakah mahasiswa memiliki dosen terkait
        }

        return view('dashboard.admin.daftar-mahasiswa', compact('mahasiswa', 'dosen'));

    }

    // Simpan data mahasiswa baru
    public function storeMahasiswa(Request $request)
    {
        // Validasi input data
        $validated = $request->validate([
            'nim' => 'required|string|max:20|unique:tb_mahasiswa,nim',
            'nama_mahasiswa' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:tb_mahasiswa,email',
            'no_telp' => 'required|string|max:15',
            'kelas' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string',
            'nik_dosen' => 'nullable|exists:tb_dosen,nik',
        ]);

        $idAdministrator = Auth::guard('admin')->user()->idAdministrator;


        // Membuat data mahasiswa
        $createMahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'password' => Hash::make($request->password), // mengenkripsi password
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'judul_tugas_akhir' => $request->judul_tugas_akhir,
            'nik_dosen' => $request->nik_dosen,
            'createdByAdmin' => $idAdministrator,
            'created_at' => Carbon::now(),
        ]);

        // Mengarahkan ulang ke halaman yang sama setelah berhasil
        if ($createMahasiswa) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    // Perbarui data mahasiswa
    public function updateMahasiswa(Request $request, $nim)
    {
        // Temukan mahasiswa berdasarkan nim
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa) {
            return response()->json(['error' => 'Mahasiswa tidak ditemukan'], 404);
        }

        // Validasi data yang diterima
        $validated = $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'email' => 'required|email|unique:tb_mahasiswa,email,' . $nim . ',nim',
            'no_telp' => 'required|string|max:15',
            'kelas' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string',
            'nik_dosen' => 'nullable|exists:tb_dosen,nik',
        ]);

        // Update data mahasiswa
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        if (!empty($request->password)) {
            $mahasiswa->password = Hash::make($request->password);
        }
        $mahasiswa->nim = $request->nim;
        $mahasiswa->email = $request->email;
        $mahasiswa->no_telp = $request->no_telp;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->nik_dosen = $request->nik_dosen;
        $mahasiswa->judul_tugas_akhir = $request->judul_tugas_akhir;
        if (!empty ($request->password)){
            $mahasiswa->password = bcrypt($request->password);
        }

        $mahasiswa->save();

        if ($mahasiswa) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    // Hapus data mahasiswa
    public function destroyMahasiswa($nim)
    {
        // Temukan mahasiswa berdasarkan nim
        $mahasiswa = Mahasiswa::find($nim);

        if (!$mahasiswa) {
            return response()->json(['error' => 'Mahasiswa tidak ditemukan'], 404);
        }

        // Hapus mahasiswa
        $mahasiswa->delete();

        return response()->json(['success' => true]);
    }

    // Tampilkan informasi detail mahasiswa
    public function showMahasiswa($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        return response()->json($mahasiswa);
    }
}
