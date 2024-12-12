<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan - Dosen</title>
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/riwayat-pengajuan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    

    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css">    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
   
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
                <a href="/"><img src="{{asset('assets/dashboard/asset/img/logokjrdns.png')}}" alt="Kejardosen Logo" class="logokjr"/></a>
            </div>
            <ul class="menu">
                <li><a href="/"><i class="fi fi-br-home"></i> <span class="menu-text">Beranda</span></a></li>
                <li><a href="/"><i class="fi fi-br-graduation-cap"></i> <span class="menu-text">Pengajuan</span></a></li>
                <li><a href="/"><i class="fi fi-br-list-check"></i> <span class="menu-text">Jadwal Bimbingan</span></a></li>
                <li><a href="/"><i class="fi fi-br-calendar"></i> <span class="menu-text">Kalender</span></a></li>
                <li><a href="/"><i class="fi fi-br-memo"></i> <span class="menu-text">Logbook</span></a></li>
                <li class="menu-item has-submenu">
                    <div class="submenu-toggle">
                        <i class="fi fi-br-time-past"></i> <span class="menu-text">Riwayat</span>
                    </div>
                    <ul class="submenu">
                        <li><a href="/"><i class="fi fi-br-time-past"></i> <span class="menu-text">Riwayat Pengajuan</span></a></li>
                        <li><a href="/"><i class="fi fi-br-time-past"></i> <span class="menu-text">Riwayat Jadwal Bimbingan</span></a></li>
                    </ul>
                </li>
                <li><a href="/"><i class="fi fi-br-user"></i> <span class="menu-text">Profil</span></a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <div class="title"><h1>Riwayat Pengajuan</h1></div>
            <div class="search-container">
                <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
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
                    <div class="col col-5" data-label="Status"><span class="status-accept">Diterima</span></div>
                    <!-- <div class="col col-5" data-label="Status"><span class="status-reject">Ditolak</span></div> -->
                    <!-- <div class="col col-5" data-label="Status"><span class="status-resched">Reschedule</span></div> -->
                    <div class="col col-6" data-label="Aksi"><a href="/"><i class="fi fi-br-info"></i></a></div>
                </li>  
            </ul>
            <!-- Pagination -->
            <div class="pagination">
                <button class="prev-page">Prev</button>
                <span class="page-numbers">
                    <span class="page-number active">1</span>
                    <span class="page-number">2</span>
                    <span class="page-number">3</span>
                    <!-- Tambahkan lebih banyak page number sesuai dengan jumlah data -->
                </span>
                <button class="next-page">Next</button>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/riwayat.js')}}"></script>

</body>
</html>