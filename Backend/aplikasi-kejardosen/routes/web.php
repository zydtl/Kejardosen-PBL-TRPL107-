<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get('/mahasiswa/pengajuan', function () {
    return view('dashboard.mahasiswa.pengajuan');
})->name('mahasiswa.pengajuan')
    ->middleware('auth:mahasiswa');




//-----------------------------------------------------------------------------------------------------------------------------------------


// Halaman dashboard untuk dosen (hanya bisa diakses oleh dosen yang sudah login)
Route::get('/dosen/dashboard', function () {
    return view('dashboard.dosen.dashboard');
})->name('dosen.dashboard')->middleware('auth:dosen');

// Halaman pengajuan untuk Dosen
Route::get('/dosen/pengajuan', function () {
    return view('dashboard.dosen.pengajuan');
})->name('dosen.pengajuan')
    ->middleware('auth:dosen');

Route::get('/dosen/form-logbook', function () {
    return view('dashboard.dosen.form-logbook');
})->name('dosen.form-logbook')
    ->middleware('auth:dosen');

Route::get('/dosen/jadwal-bimbingan', function () {
    return view('dashboard.dosen.jadwal-bimbingan');
})->name('dosen.jadwal-bimbingan')
    ->middleware('auth:dosen');


//--------------------------------------------------------------------------------------------------------------------------------------------------


// Halaman dashboard untuk admin (hanya bisa diakses oleh admin yang sudah login)
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin.dashboard');
})->name('admin.dashboard')->middleware('auth:admin');



// Rute logout================================================================================================================================================================================


// Rute logout untuk admin
Route::post('/logout/admin', [AuthController::class, 'logout'])->name('logout.admin');

// Rute logout untuk dosen
Route::post('/logout/dosen', [AuthController::class, 'logoutDosen'])->name('logout.dosen');

// Rute logout untuk mahasiswa
Route::post('/logout/mahasiswa', [AuthController::class, 'logoutMahasiswa'])->name('logout.mahasiswa');

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

