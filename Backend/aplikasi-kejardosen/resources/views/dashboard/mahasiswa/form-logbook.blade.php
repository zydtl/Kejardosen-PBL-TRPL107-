<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logbook Mahasiswa</title>
    
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/form-logbook.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/rte_theme_default.css')}}"/>

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
            <div class="containerlogbook">
            <div class="title"><h1>Logbook</h1></div>
            <form action="#" id="logbook-form">
                <div class="logbook-details">
                    <div class="input-box">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" id="tanggal" placeholder="Masukkan tanggal" required>
                    </div>
                    <div class="input-box">
                        <label for="waktu">Waktu</label>
                        <input type="time" id="waktu" placeholder="Masukkan Waktu Bimbingan" required>
                    </div>
                    <div class="input-box">
                        <label for="progres">Progres</label>
                        <input type="number" id="progres" placeholder="Persentase Progres" min="0" max="100" required>
                    </div>
                </div>
                <div class="logbook-content">
                    <div class="input-box">
                        <label for="judul-logbook">Judul Logbook</label>
                        <input type="text" id="judul-logbook" placeholder="Masukkan Judul Logbook" required>
                    </div>
                    <div class="input-box">
                        <label for="catatan-mahasiswa">Catatan Mahasiswa</label>
                        <div id="catatan-mahasiswa" class="richtext-editor"></div>
                    </div>
                    <div class="input-box">
                        <label for="catatan-dosen">Catatan Dosen</label>
                        <div id="catatan-dosen" class="richtext-editor"></div>
                    </div>
                </div>
                <div class="button">
                    <input class="cancel" type="button" value="Batal">
                    <input class="submit" type="submit" value="Simpan">
                </div>          
            </form>
        </div>
    </div>
    </div>

    <script type="text/javascript" src="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/rte.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/plugins/all_plugins.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/form-logbook.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/text-editor-mhs.js')}}"></script>


</body>
</html>