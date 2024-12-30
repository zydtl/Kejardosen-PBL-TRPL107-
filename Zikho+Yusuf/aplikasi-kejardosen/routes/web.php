<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KehendakAdminController;

use App\Http\Controllers\PengajuanJadwalController;
use App\Http\Controllers\JadwalBimbinganController;
// use App\Models\JadwalBimbingan;
use App\Http\Controllers\LogbookController;

// Halaman utama menuju ke landing page
Route::get('/', function () {
    return view('landing-page.page.index');
});
// Halaman Login ======================================================================================================================================================================================


// Halaman login untuk Mahasiswa (untuk pengguna yang belum login)
Route::get('/login/mahasiswa', [AuthController::class, 'showLoginMahasiswa'])->name('login.mahasiswa')->middleware('guest:mahasiswa');
Route::post('/login/mahasiswa', [AuthController::class, 'loginMahasiswa'])->name('login.mahasiswa.post');

// Halaman login untuk dosen (untuk pengguna yang belum login)
Route::get('/login/dosen', [AuthController::class, 'showLoginDosen'])->name('login.dosen')->middleware('guest:dosen');
Route::post('/login/dosen', [AuthController::class, 'loginDosen'])->name('login.dosen.post');

// Halaman login untuk admin (untuk pengguna yang belum login)
Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('login.admin')->middleware('guest:admin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('login.admin.post');


// Halaman Dashboard ================================================================================================================================================================================


// Halaman dashboard untuk mahasiswa (hanya bisa diakses oleh mahasiswa yang sudah login)
Route::get('/mahasiswa/dashboard', function () {
    return view('dashboard.mahasiswa.dashboard');
})->name('mahasiswa.dashboard')->middleware('auth:mahasiswa');

// Halaman pengajuan untuk Mahasiswa
Route::get('/mahasiswa/pengajuan', [PengajuanJadwalController::class, 'index'])
    ->name('mahasiswa.pengajuan')
    ->middleware('auth:mahasiswa');

    // Route untuk buat pengajuan
    Route::post('/mahasiswa/pengajuan', [PengajuanJadwalController::class, 'store'])->name('pengajuan.store');

    // Route untuk menangani request data berdasarkan kodePengajuan
    // Route::put('/mahasiswa/pengajuan/update/{kodePengajuan}', [PengajuanJadwalController::class, 'update'])->name('pengajuan.update');
    Route::put('/mahasiswa/pengajuan/update/{kodePengajuan}', [PengajuanJadwalController::class, 'update'])->name('pengajuan.update');



    // Route untuk membatalkan pengajuan
    Route::patch('mahasiswa/pengajuan/{kodePengajuan}/batalkan', [PengajuanJadwalController::class, 'updateStatus']);



// Halaman detail pengajuan untuk Mahasiswa
Route::get('/mahasiswa/detail-pengajuan/{kodePengajuan}', [PengajuanJadwalController::class, 'detail'])
    ->name('mahasiswa.detail-pengajuan')
    ->middleware('auth:mahasiswa');

// Halaman Riwayat Pengajuan
Route::get('/mahasiswa/riwayat-pengajuan', [PengajuanJadwalController::class, 'riwayatPengajuanMahasiswa'])
    ->name('mahasiswa.riwayat-pengajuan')
    ->middleware('auth:mahasiswa');

// Halaman detail riwayat pengajuan untuk Mahasiswa
Route::get('/mahasiswa/detail-riwayat-pengajuan/{kodePengajuan}', [PengajuanJadwalController::class, 'detailRiwayatPengajuanMahasiswa'])
    ->name('mahasiswa.detail-riwayat-pengajuan')
    ->middleware('auth:mahasiswa');


// Route untuk Mahasiswa Jadwal Bimbingan
Route::get('/mahasiswa/jadwal-bimbingan', [JadwalBimbinganController::class, 'indexMahasiswa'])
    ->name('mahasiswa.jadwal-bimbingan')
    ->middleware('auth:mahasiswa');

    Route::put('/mahasiswa/jadwal-bimbingan/tunda/{kodeJadwal}', [JadwalBimbinganController::class, 'tunda'])
        ->name('mahasiswa.jadwal-bimbingan.tunda')
        ->middleware('auth:mahasiswa');

    Route::put('/mahasiswa/jadwal-bimbingan/batalkan/{kodeJadwal}', [JadwalBimbinganController::class, 'batalkanMahasiswa'])
        ->name('mahasiswa.jadwal-bimbingan.batalkan')
        ->middleware('auth:mahasiswa');

    Route::put('/mahasiswa/jadwal-bimbingan/selesai/{kodePengajuan}', [JadwalBimbinganController::class, 'selesai'])
        ->name('dosen.jadwal-bimbingan.selesai')
        ->middleware('auth:dosen');

// Halaman detail pengajuan untuk Mahasiswa
Route::get('/mahasiswa/detail-jadwal-bimbingan/{kodeJadwal}', [JadwalBimbinganController::class, 'detailMahasiswa'])
    ->name('mahasiswa.detail-jadwal-bimbingan')
    ->middleware('auth:mahasiswa');

// Halaman Riwayat jadwal bimbingan
Route::get('/mahasiswa/riwayat-jadwal-bimbingan', [JadwalBimbinganController::class, 'riwayatJadwalMahasiswa'])
    ->name('mahasiswa.riwayat-jadwal-bimbingan')
    ->middleware('auth:mahasiswa');

// Halaman detail riwayat jadwal untuk Mahasiswa
Route::get('/mahasiswa/detail-riwayat-jadwal-bimbingan/{kodeJadwal}', [JadwalBimbinganController::class, 'detailRiwayatMahasiswa'])
    ->name('mahasiswa.detail-riwayat-jadwal-bimbingan')
    ->middleware('auth:mahasiswa');

// Halaman daftar logbook untuk mahasiswa
Route::get('/mahasiswa/logbook', [LogbookController::class, 'indexMahasiswa'])
    ->name('mahasiswa.logbook')
    ->middleware('auth:mahasiswa');

// Halaman form logbook untuk Mahasiswa (edit)
Route::get('/mahasiswa/form-logbook/{kodeLogbook}', [LogbookController::class, 'formLogbookMahasiswa'])
->name('mahasiswa.form-logbook')
->middleware('auth:mahasiswa');

    // Route untuk mengupdate logbook
    Route::put('/mahasiswa/form-logbook/update/{kodeLogbook}', [LogbookController::class, 'updateMahasiswa'])
        ->name('mahasiswa.form-logbook.update')
        ->middleware('auth:mahasiswa');



// LANJUTAN ROUTE MAHASISWA BY YUSUF ********************************************************************************************************************




Route::get('/mahasiswa/profil', function () {
    return view('dashboard.mahasiswa.profile');
})->name('mahasiswa.profile')
    ->middleware('auth:mahasiswa');






// END LANJUTAN ROUTE MAHASISWA BY YUSUF ***********************************************************************************************************************************


//-----------------------------------------------------------------------------------------------------------------------------------------


// Halaman dashboard untuk dosen (hanya bisa diakses oleh dosen yang sudah login)
Route::get('/dosen/dashboard', function () {
    return view('dashboard.dosen.dashboard');
})->name('dosen.dashboard')->middleware('auth:dosen');

// Route untuk Dosen Pengajuan
Route::get('/dosen/pengajuan', [PengajuanJadwalController::class, 'indexDosen'])
    ->name('dosen.pengajuan')
    ->middleware('auth:dosen');

    // Route::put('/mahasiswa/pengajuan/update/{kodePengajuan}', [PengajuanJadwalController::class, 'update'])->name('pengajuan.update');
    
    Route::put('/dosen/pengajuan/tolakPengajuan/{kodePengajuan}', [PengajuanJadwalController::class, 'tolakPengajuan'])
        ->name('dosen.pengajuan.tolak')
        ->middleware('auth:dosen');

    Route::put('/dosen/pengajuan/bandingPengajuan/{kodePengajuan}', [PengajuanJadwalController::class, 'bandingPengajuan'])
        ->name('dosen.pengajuan.banding')
        ->middleware('auth:dosen');

    Route::put('/dosen/pengajuan/terimaPengajuan/{kodePengajuan}', [PengajuanJadwalController::class, 'terimaPengajuan'])
        ->name('dosen.pengajuan.terima')
        ->middleware('auth:dosen');

// Halaman Riwayat Pengajuan
Route::get('/dosen/riwayat-pengajuan', [PengajuanJadwalController::class, 'riwayatPengajuanDosen'])
    ->name('dosen.riwayat-pengajuan')
    ->middleware('auth:dosen');

// Halaman detail riwayat pengajuan untuk Dosen
Route::get('/dosen/detail-riwayat-pengajuan/{kodePengajuan}', [PengajuanJadwalController::class, 'detailRiwayatPengajuanDosen'])
    ->name('dosen.detail-riwayat-pengajuan')
    ->middleware('auth:dosen');

// Route untuk Dosen Jadwal Bimbingan
Route::get('/dosen/jadwal-bimbingan', [JadwalBimbinganController::class, 'indexDosen'])
    ->name('dosen.jadwal-bimbingan')
    ->middleware('auth:dosen');

    Route::put('/dosen/jadwal-bimbingan/tunda/{kodeJadwal}', [JadwalBimbinganController::class, 'tunda'])
        ->name('dosen.jadwal-bimbingan.tunda')
        ->middleware('auth:dosen');

    Route::put('/dosen/jadwal-bimbingan/batalkan/{kodeJadwal}', [JadwalBimbinganController::class, 'batalkanDosen'])
        ->name('dosen.jadwal-bimbingan.batalkan')
        ->middleware('auth:dosen');

// Halaman detail pengajuan untuk Dosen
Route::get('/dosen/detail-jadwal-bimbingan/{kodeJadwal}', [JadwalBimbinganController::class, 'detailDosen'])
    ->name('dosen.detail-jadwal-bimbingan')
    ->middleware('auth:dosen');

// Halaman Riwayat jadwal bimbingan
Route::get('/dosen/riwayat-jadwal-bimbingan', [JadwalBimbinganController::class, 'riwayatJadwalDosen'])
    ->name('dosen.riwayat-jadwal-bimbingan')
    ->middleware('auth:dosen');

// Halaman detail riwayat jadwal untuk dosen
Route::get('/dosen/detail-riwayat-jadwal-bimbingan/{kodeJadwal}', [JadwalBimbinganController::class, 'detailRiwayatDosen'])
    ->name('dosen.detail-riwayat-jadwal-bimbingan')
    ->middleware('auth:dosen');

    
// Halaman daftar logbook seluruh mahasiswa
Route::get('/dosen/logbook', [LogbookController::class, 'indexDosen'])
    ->name('dosen.logbook')
    ->middleware('auth:dosen');

// Halaman logbook mahasiswa yang dipilih
Route::get('/dosen/daftar-logbook/{nim}', [LogbookController::class, 'indexMahasiswaDosen'])
    ->name('dosen.daftar-logbook')
    ->middleware('auth:dosen');

// Halaman form logbook untuk dosen (edit)
Route::get('/mahasiswa/form-logbook/{kodeLogbook}', [LogbookController::class, 'formLogbookMahasiswa'])
->name('mahasiswa.form-logbook')
->middleware('auth:mahasiswa');



// LANJUTAN ROUTE DOSEN BY YUSUF********************************************************************************************************************

Route::get('/dosen/profil', function () {
    return view('dashboard.dosen.profil');
})->name('dosen.profil')
    ->middleware('auth:dosen');

Route::get('/dosen/logbook', function () {
    return view('dashboard.dosen.logbook');
})->name('dosen.logbook')
    ->middleware('auth:dosen');




// END LANJUTAN ROUTE DOSEN BY YUSUF ***********************************************************************************************************************************



//--------------------------------------------------------------------------------------------------------------------------------------------------


// Halaman dashboard untuk admin (hanya bisa diakses oleh admin yang sudah login)
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin.dashboard');
})->name('admin.dashboard')->middleware('auth:admin');


// Halaman dashboard untuk admin (hanya bisa diakses oleh admin yang sudah login)



Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/daftar-dosen', [KehendakAdminController::class, 'index'])->name('admin.daftar-dosen');
});

    Route::post('/admin/daftar-dosen', [KehendakAdminController::class, 'store'])->name('daftar-dosen.store');
    Route::put('/admin/daftar-dosen/update/{nik}', [KehendakAdminController::class, 'update'])->name('daftar-dosen.update');

Route::get('/admin/daftar-mahasiswa', function () {
    return view('dashboard.admin.daftar-mahasiswa');
})->name('admin.daftar-mahasiswa')
    ->middleware('auth:admin');

Route::get('/admin/hubungkan-mahasiswa', function () {
    return view('dashboard.admin.hubungkan-mahasiswa');
})->name('admin.hubungkan-mahasiswa')
    ->middleware('auth:admin');

Route::get('/admin/lihat-bimbingan', function () {
    return view('dashboard.admin.lihat-bimbingan');
})->name('admin.lihat-bimbingan')
    ->middleware('auth:admin');

// END LANJUTAN ROUTE ADMIN BY YUSUF ***********************************************************************************************************************************



// Rute logout================================================================================================================================================================================


// Rute logout untuk admin
Route::get('/logout/admin', [AuthController::class, 'logout'])->name('logout.admin');

// Rute logout untuk dosen
Route::get('/logout/dosen', [AuthController::class, 'logoutDosen'])->name('logout.dosen');

// Rute logout untuk mahasiswa
Route::get('/logout/mahasiswa', [AuthController::class, 'logoutMahasiswa'])->name('logout.mahasiswa');

// Fallback login untuk rute lain (halaman login default jika belum login)
Route::get('/login', function () {
    // Jika sudah login, arahkan ke dashboard masing-masing
    if (auth('mahasiswa')->check()) {
        return redirect()->route('mahasiswa.dashboard');
    } elseif (auth('dosen')->check()) {
        return redirect()->route('dosen.dashboard');
    } elseif (auth('admin')->check()) {
        return redirect()->route('admin.dashboard');
    }

    // Jika belum login, arahkan kembali ke landing page
    return redirect()->route('login.admin');
})->name('login');


// Halaman login untuk Mahasiswa (untuk pengguna yang belum login)
Route::get('/login/mahasiswa', [AuthController::class, 'showLoginMahasiswa'])
    ->name('login.mahasiswa')
    ->middleware('guest');  // Memastikan hanya pengguna yang belum login

// Halaman login untuk dosen (untuk pengguna yang belum login)
Route::get('/login/dosen', [AuthController::class, 'showLoginDosen'])
    ->name('login.dosen')
    ->middleware('guest');  // Memastikan hanya pengguna yang belum login

// Halaman login untuk admin (untuk pengguna yang belum login)
Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])
    ->name('login.admin')
    ->middleware('guest');  // Memastikan hanya pengguna yang belum login

