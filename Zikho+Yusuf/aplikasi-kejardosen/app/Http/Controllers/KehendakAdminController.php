<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use Carbon\Carbon;

class KehendakAdminController extends Controller
{
    // Tampilkan daftar dosen
    public function index()
    {
        $dosen = Dosen::all();
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

    // Tampilkan informasi detail dosen
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return response()->json($dosen);
    }
}
