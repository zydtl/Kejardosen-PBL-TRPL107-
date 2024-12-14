<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('assets/dashboard/asset/img/kejardosen-logo-circle.png')}}">
    <title>Lihat Bimbingan</title>
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/admin.css')}}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>

</head>
<body>
    <header class="navbar">
        <!-- HAMBURGER BUTTON -->
        <button onclick="toggleSidebar()" class="toggle-button">&#9776;</button>
        <div class="navbar-right">
            <a href="/"><i class="fi fi-br-bell"></i></a>
            <a href="/"><i class="fi fi-br-power"></i></a>
            <a href="/"><img src="{{asset('assets/dashboard/asset/img/avatar-admin.jpg')}}" alt="User Profile" class="profile-icon" /></a>
        </div>
    </header>

    <div class="container">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar">
            <div class="logo-section">
                <a href="/"><img src="{{asset('assets/dashboard/asset/img/logokjrdns.png')}}" alt="Kejardosen Logo" class="logokjr" /></a>
            </div>
            <ul class="menu">
                <li>
                    <a href="/"><i class="fi fi-br-home"></i>
                        <span class="menu-text">Beranda</span></a>
                </li>
                <li>
                    <a href="/"><i class="fi fi-br-graduation-cap"></i>
                        <span class="menu-text">Daftar Mahasiswa</span></a>
                </li>
                <li>
                    <a href="/"><i class="fi fi-br-lesson-class"></i>
                        <span class="menu-text">Daftar Dosen</span></a>
                </li>
                <li>
                    <a href="/"><i class="fi fi-br-people-network-partner"></i>
                        <span class="menu-text">Hubungkan Mahasiswa</span></a>
                </li>
                <li>
                    <a href="/"><i class="fi fi-br-workshop"></i>
                        <span class="menu-text">Lihat Bimbingan</span></a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
         <div class="main-content" >
                     
            <div class="title"><h1>Lihat Bimbingan</h1></div>
            <div class="search-container">
                <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
            </div> 
            <ul class="responsive-table-bimbingan">
                <li class="table-header">
                    <div class="col col-1">Kode Jadwal</div>
                    <div class="col col-2">NIM</div>
                    <div class="col col-3">NIK/NIDN</div>
                    <div class="col col-4">Waktu Bimbingan</div>
                </li>
                <li class="table-row">
                    <div class="col col-1" data-label="NIK/NIDN">KJR98KQAM</div>
                    <div class="col col-2" data-label="NIM">4342401057</div>
                    <div class="col col-3" data-label="NIK/NIDN">122279</div>
                    <div class="col col-4" data-label="Waktu Bimbingan">12-09-2024 11:00 WIB</div>
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

<script src="{{asset('assets/dashboard/asset/javascript/admin.js')}}"></script>
<script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>


</body>

</html>
