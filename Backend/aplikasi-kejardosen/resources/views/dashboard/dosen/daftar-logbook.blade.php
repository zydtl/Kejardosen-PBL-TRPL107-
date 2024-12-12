<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logbook - Dosen</title>
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/logbook.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">

    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css">    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="navbar">
        <!-- HAMBURGER BUTTON -->
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
                     
            <div class="title"><h1>Logbook</h1></div>
            <div class="search-container">
                <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
            </div> 
            <ul class="responsive-table-daftar">
                <li class="table-header">
                    <div class="col col-1">Kode Logbook</div>
                    <div class="col col-2">Kode Jadwal</div>
                    <div class="col col-3">Terakhir Diubah</div>
                    <div class="col col-4">Judul Logbook</div>
                    <div class="col col-5">Progres</div>
                    <div class="col col-6">Aksi</div>
                </li>
                <li class="table-row">
                    <div class="col col-1" data-label="Kode Logbook">LB120924001</div>
                    <div class="col col-2" data-label="Kode Jadwal">KJR98KQAM</div>
                    <div class="col col-3" data-label="Terakhir Diubah">12-09-2024 11:00  WIB</div>
                    <div class="col col-4" data-label="Judul Logbook">Bimbingan ke-6 Revisi Bab III</div>
                    <div class="col col-5" data-label="Progres TA">25%</div>
                    <div class="col col-6" data-label="Aksi">
                        <button class="btn-edit"><i class="fi fi-br-edit edit"></i></button>
                    </div>
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
    <script src="{{asset('assets/dashboard/asset/javascript/logbook.js')}}"></script>

</body>
</html>
