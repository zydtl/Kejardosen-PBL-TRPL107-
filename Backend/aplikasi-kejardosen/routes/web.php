<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute login untuk mahasiswa (rute utama)
Route::get('/', function () {
    return view('auth.pages.masuk-mahasiswa');
})->name('login.mahasiswa');

// Menampilkan halaman login admin
Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('login.admin');

// Memproses login admin
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('login.admin.post');

// Menampilkan dashboard admin (hanya untuk yang sudah login, menggunakan middleware auth:admin)
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin.dashboard');
})->name('admin.dashboard')->middleware('auth:admin');

// Memproses logout admin
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Menambahkan rute login fallback (untuk middleware `auth` yang membutuhkan rute login)
Route::get('/login', function () {
    return redirect()->route('login.admin');  // Redirect ke halaman login admin
})->name('login');
