<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('assets/dashboard/asset/img/kejardosen-logo-circle.png')}}">
    <title>Pengajuan - Mahasiswa</title>
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Pengajuan-mahasiswa.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>

</head>

<body>
    <header class="navbar">
        <!-- HUMBURGER BUTTON -->
        <button onclick="toggleSidebar()" class="toggle-button">&#9776;</button>
        <div class="navbar-right">
            <a href="/"><i class="fi fi-br-bell"></i></a>
            <a href="/"><i class="fi fi-br-power"></i></a>
            <a href="/"><img src="{{asset('assets/dashboard/asset/img/avatar.png')}}" alt="User Profile" class="profile-icon"></a>
        </div>
    </header>

    <div class="container">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar">
            <!-- logo -->
            <div class="logo-section">
                <a href="/"><img src="{{asset('assets/dashboard/asset/img/logokjrdns.png')}}" alt="Kejardosen Logo" class="logokjr" /></a>
            </div>
            <ul class="menu">
                <li><a href="/"><i class="fi fi-br-home"></i> <span class="menu-text">Beranda</span></a></li>
                <li><a href="/"><i class="fi fi-br-graduation-cap"></i> <span class="menu-text">Pengajuan</span></a>
                </li>
                <li><a href="/"><i class="fi fi-br-list-check"></i> <span class="menu-text">Jadwal Bimbingan</span></a>
                </li>
                <li><a href="/"><i class="fi fi-br-calendar"></i> <span class="menu-text">Kalender</span></a></li>
                <li><a href="/"><i class="fi fi-br-memo"></i> <span class="menu-text">Logbook</span></a></li>
                <li class="menu-item has-submenu">
                    <div class="submenu-toggle">
                        <i class="fi fi-br-time-past"></i> <span class="menu-text">Riwayat</span>
                    </div>
                    <ul class="submenu">
                        <li><a href="/"><i class="fi fi-br-time-past"></i> <span class="menu-text">Riwayat
                                    Pengajuan</span></a></li>
                        <li><a href="/"><i class="fi fi-br-time-past"></i> <span class="menu-text">Riwayat Jadwal
                                    Bimbingan</span></a></li>
                    </ul>
                </li>
                <li><a href="/"><i class="fi fi-br-user"></i> <span class="menu-text">Profil</span></a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <div class="title-and-button">
                <div class="title">
                    <h1>Pengajuan</h1>
                </div>
                <button id="openForm" class="btn btn-primary">Buat Pengajuan</button>
            </div>
            <ul class="responsive-table">
                <li class="table-header">
                    <div class="col col-1">Kode Pengajuan</div>
                    <div class="col col-2">Diajukan Pada</div>
                    <div class="col col-3">Tanggal Pengajuan</div>
                    <div class="col col-4">Waktu Pengajuan</div>
                    <div class="col col-5">Status</div>
                    <div class="col col-6">Aksi</div>
                </li>
                <li class="table-row">
                    <div class="col col-1" data-label="Kode Pengajuan">AWQP436</div>
                    <div class="col col-2" data-label="Diajukan Pada">10 September 2024 07:00 WIB</div>
                    <div class="col col-3" data-label="Tanggal Pengajuan">12 September 2024</div>
                    <div class="col col-4" data-label="Waktu Pengajuan">09.00 WIB</div>
                    <div class="col col-5" data-label="Status"><span class="status-waiting">Menunggu</span></div>
                    <!-- <div class="col col-5" data-label="Status"><span class="status-resched">Reschedule</span></div> -->
                    <div class="col col-6" data-label="Aksi">
                        <button class="btn-info"><i class="fi fi-br-info info"></i></button>
                        <button class="btn-tolak" id="openFormdelete"><i class="fi fi-br-ban delete"></i></button>
                        <button class="btn-edit" id="openFormedit"><i class="fi fi-br-edit edit"></i></button>
                    </div>
                </li>
            </ul>
        </div>
    </div>



    <div id="formModal">
        <div class="modal">
            <h2>Buat Pengajuan</h2>
            <form>
                <div class="form-group">
                    <label for="tanggal">Pilih Tanggal</label>
                    <input type="date" id="tanggal" class="form-control1">
                </div>
                <div class="form-group">
                    <label for="waktu">Pilih Waktu</label>
                    <input type="time" id="waktu" class="form-control1">
                </div>
                <div class="form-group">
                    <label for="judul">Judul Bimbingan</label>
                    <input type="text" id="judul" class="form-controljudul" placeholder="Judul Bimbingan">
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea id="catatan" class="form-controlcatatan" rows="4"
                        placeholder="Tambahkan catatan..."></textarea>
                </div>
                <div class="button-group">
                    <button type="button" id="closeForm" class="btn btn-secondary1">Batalkan</button>
                    <button type="submit" class="buat btn btn-primary">Buat Pengajuan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="formModaledit">
        <div class="modal1">
            <h2>Pengajuan Ulang</h2>
            <form>
                <div id="double" class="form-group">
                    <div class="double1">
                        <label for="tanggal1">Pilih Tanggal</label>
                        <input type="date" id="tanggal1" class="form-control1">
                    </div>
                    <div class="double2">
                        <label for="tanggal">Tanggal Anjuran Dosen</label>
                        <input type="date" id="tanggal2" class="form-control1oke" disabled>
                    </div>
                </div>
                <div id="double" class="form-group">
                    <div class="double1">
                        <label for="tanggal">Pilih Waktu</label>
                        <input type="time" id="tanggal1" class="form-control1">
                    </div>
                    <div class="double2">
                        <label for="tanggal">Waktu Anjuran Dosen</label>
                        <input type="time" id="tanggal2" class="form-control1oke" disabled>
                    </div>
                </div>
                
                <div class="teks"><i class="fi fi-rr-info"></i>
                    <div class="alert">Sesuaikan tanggal dan
                        waktu bimbingan dengan jadwal anjuran dosen</div>
                </div>
                <div class="form-group">
                    <label for="judul">Catatan Dosen</label>
                    <textarea id="catatandosen" class="form-control" rows="4"
                        placeholder="Catatan dari dosen pembimbing" disabled></textarea>
                </div>
                <div class="form-group">
                    <label for="judul">Judul Bimbingan</label>
                    <input type="text" id="judul" class="form-control" placeholder="Judul Bimbingan">
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan Mahasiswa</label>
                    <textarea id="catatan" class="form-control" rows="4" placeholder="Tambahkan catatan..."></textarea>
                </div>
                <div class="button-group">
                    <button type="button" id="closeFormedit" class="btn btn-secondary">Batalkan</button>
                    <button type="submit" class="ubah btn btn-primary">Ubah Pengajuan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/Pengajuan-mahasiswa.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>


</body>

</html>