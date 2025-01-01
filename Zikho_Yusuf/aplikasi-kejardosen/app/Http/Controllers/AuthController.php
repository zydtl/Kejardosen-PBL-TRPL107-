<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrator;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class AuthController extends Controller
{
    // cek apakah sudah login apa belum? -------------------------------
    
    // Menampilkan halaman login Admin
    public function showLoginAdmin()
    {
        // Cek apakah pengguna sudah login
        if (Auth::guard('admin')->check()) {
            // Jika sudah login, arahkan ke halaman dashboard admin
            return redirect()->route('admin.dashboard');
        }

        // Jika belum login, tampilkan halaman login
        return view('auth.pages.masuk-administrator');
    }

    // Menampilkan halaman login Dosen
    public function showLoginDosen()
    {
        // Cek apakah pengguna sudah login
        if (Auth::guard('dosen')->check()) {
            return redirect()->route('dosen.dashboard');
        }
        return view('auth.pages.masuk-dosen');
    }
    
    // Menampilkan halaman login Mahasiswa
    public function showLoginMahasiswa()
    {
        // Cek apakah pengguna sudah login
        if (Auth::guard('mahasiswa')->check()) {
            return redirect()->route('mahasiswa.dashboard');
        }
        return view('auth.pages.masuk-mahasiswa');
    }

    // ------------------------------------------------------------------

    // Proses login Admin
    public function loginAdmin(Request $request)
    {
        // Validasi form input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil kredensial dari input
        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember'); // Cek apakah "Ingat Saya" dicentang

        // Cek kredensial menggunakan guard admin
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            // Jika login berhasil, arahkan ke dashboard admin
            return redirect()->route('admin.dashboard');
        }

        // Jika login gagal, tampilkan pesan error dan kembali ke halaman login
        return back()->withErrors(['loginError' => 'Username atau password salah']);
    }

    // Proses login Dosen
    public function loginDosen(Request $request)
    {
        // Validasi form input
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        // Ambil kredensial dari input
        $credentials = $request->only('nik', 'password');
        $remember = $request->has('remember');

        // Cek kredensial menggunakan guard dosen
        if (Auth::guard('dosen')->attempt($credentials, $remember)) {
            // Jika login berhasil, arahkan ke dashboard dosen
            return redirect()->route('dosen.dashboard');
        }

        // Jika login gagal, tampilkan pesan error dan kembali ke halaman login
        return back()->withErrors(['loginError' => 'NIK atau password salah']);
    }

    // Proses login Mahasiswa
    public function loginMahasiswa(Request $request)
    {
        // Validasi form input
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        // Ambil kredensial dari input
        $credentials = $request->only('nim', 'password');
        $remember = $request->has('remember');

        // Cek kredensial menggunakan guard mahasiswa
        if (Auth::guard('mahasiswa')->attempt($credentials, $remember)) {
            // Jika login berhasil, arahkan ke dashboard mahasiswa
            return redirect()->route('mahasiswa.dashboard');
        }

        // Jika login gagal, tampilkan pesan error dan kembali ke halaman login
        return back()->withErrors(['loginError' => 'NIM atau password salah']);
    }

    // ------------------------------------------------------------------

    // Proses logout Admin
    public function logout()
    {
        // Logout menggunakan guard admin
        Auth::guard('admin')->logout();
    
        // Hapus semua sesi
        session()->invalidate();
    
        // Hapus semua cookie sesi
        session()->regenerateToken();
    
        // Redirect ke halaman login setelah logout
        return redirect()->route('login.admin');
    }

    // Proses logout Dosen
    public function logoutDosen()
    {
        Auth::guard('dosen')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login.dosen');
    }

    // Proses logout Mahasiswa
    public function logoutMahasiswa()
    {
        Auth::guard('mahasiswa')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login.mahasiswa');
    }    
    
    // Middleware untuk membatasi akses ke halaman dashboard berdasarkan role (Admin, Dosen atau Mahasiswa)
    public function redirectIfAuthenticated()
    {
        // Cek apakah admin sudah login, jika sudah, arahkan ke dashboard admin
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
    
        // Cek apakah dosen sudah login, jika sudah, arahkan ke dashboard dosen
        if (Auth::guard('dosen')->check()) {
            return redirect()->route('dosen.dashboard');
        }
    
        // Cek apakah mahasiswa sudah login, jika sudah, arahkan ke dashboard mahasiswa
        if (Auth::guard('mahasiswa')->check()) {
            return redirect()->route('mahasiswa.dashboard');
        }
    }
    
}
