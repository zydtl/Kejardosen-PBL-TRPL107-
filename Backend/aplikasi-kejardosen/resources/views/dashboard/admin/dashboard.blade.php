<!DOCTYPE html>
<html lang="en">
<head>
    
    
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../asset/css/Dashboard-Admin.css">
    <link rel="stylesheet" href="../asset/css/sidebar-navbar.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
     
</head>
<body>
    <header class="navbar">
        <button onclick="toggleSidebar()" class="toggle-button">☰</button>
        <div class="navbar-right">
            <i class="fi fi-br-bell"></i>
            <i class="fi fi-br-power"></i>
            <img src="../asset/img/avatar.png" alt="User Profile" class="profile-icon">
        </div>
    </header>

    <div class="container">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar bar">
            <!-- logo -->
            <div class="logo-section">
                <img src="{{ asset('assets/dashboard/asset/img/logokjrdns.png') }}" alt="Kejardosen Logo" class="logokjr"/>

            </div>
            <ul class="menu">
                <li><i class="fi fi-br-home"></i> <span class="menu-text">Beranda</span></li>
                <li><i class="fi fi-br-graduation-cap"></i> <span class="menu-text">Daftar Mahasiswa</span></li>
                <li><i class="fi fi-ss-lesson-class"></i> <span class="menu-text">Daftar Dosen</span></li>
                <li><i class="fi fi-rr-people-network-partner"></i> <span class="menu-text">Hubungkan Mahasiswa</span></li>
                <li><i class="fi fi-ss-workshop"></i> <span class="menu-text">Lihat Bimbingan</span></li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="box">
                    <div class="text">
                        <div class="h1"><h1>Halo!</h1></div>
                        <div class="h2">Admin101</div>
                        <div class="h3"> Selamat datang sebagai Admin</div>
                    </div>
                    
                    <img class="gambar" src="../asset/img/undraw_personal_settings_re_i6w4.svg" alt="">
                </div>

                <div class="kotak">
                <div class="box1">
                    <img class="graduation" src="{{ asset('assets/dashboard/asset/img/graduation-cap (1).png') }}" alt="">

                    <div class="kotak2">
                        <div class="h1"><h1>03</h1></div>
                        <div class="h2">Mahasiswa</div>
                        </div>   
                    </div>
                <div class="box2">
                     
                    <img class="graduation" src="{{ asset('assets/dashboard/asset/img/graduation-cap (1).png') }}" alt="">
                 


                 <div class="kotak2">
                    <div class="h1"><h1>03</h1></div>
                    <div class="h2">Dosen Pembimbing</div>
                    </div>   
            </div>
            <div class="box3">
                     
                <img class="graduation" src="../asset/img/graduation-cap (1).png" alt="">
             


             <div class="kotak2">
                <div class="h1"><h1>03</h1></div>
                <div class="h2">Jumlah Bimbingan Aktif</div>
                </div>   
             </div>
                </div>
                </div>
            </div>
            
        </div>
    <script src="../asset/javascript/dashboard-admin.js"></script>
    <script src="../asset/javascript/sidebar-navbar.js"></script>

    
</body>

</html>
