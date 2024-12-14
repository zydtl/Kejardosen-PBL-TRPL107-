<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset('assets/dashboard/asset/img/kejardosen-logo-circle.png')}}" />
    <title>Dashboard - Mahasiswa</title>

    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Dashboard-mahasiswa.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}" />
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css" />
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css" />
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css" />
</head>

<body>
    <header class="navbar">
        <!-- HAMBURGER BUTTON -->
        <button onclick="toggleSidebar()" class="toggle-button">&#9776;</button>
        <div class="navbar-right">
            <a href="/"><i class="fi fi-br-bell"></i></a>
            <a href="/"><i class="fi fi-br-power"></i></a>
            <a href="/"><img src="{{asset('assets/dashboard/asset/img/avatar.png')}}" alt="User Profile" class="profile-icon" /></a>
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
                        <span class="menu-text">Pengajuan</span></a>
                </li>
                <li>
                    <a href="/"><i class="fi fi-br-list-check"></i>
                        <span class="menu-text">Jadwal Bimbingan</span></a>
                </li>
                <li>
                    <a href="/"><i class="fi fi-br-calendar"></i>
                        <span class="menu-text">Kalender</span></a>
                </li>
                <li>
                    <a href="/"><i class="fi fi-br-memo"></i>
                        <span class="menu-text">Logbook</span></a>
                </li>
                <li class="menu-item has-submenu">
                    <div class="submenu-toggle">
                        <i class="fi fi-br-time-past"></i>
                        <span class="menu-text">Riwayat</span>
                    </div>
                    <ul class="submenu">
                        <li>
                            <a href="/"><i class="fi fi-br-time-past"></i>
                                <span class="menu-text">Riwayat Pengajuan</span></a>
                        </li>
                        <li>
                            <a href="/"><i class="fi fi-br-time-past"></i>
                                <span class="menu-text">Riwayat Jadwal Bimbingan</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/"><i class="fi fi-br-user"></i>
                        <span class="menu-text">Profil</span></a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <div class="left">
                <div class="card-welcome">
                    <div class="text">
                        <h1>Halo!</h1>
                        <div class="nama">Muhammad Maulana Yusuf</div>
                        <div class="slogan">Bimbingan on time, skripsi on point!</div>
                        <button href="#" class="ajukan"><h3>Ajukan Jadwal</h3><i class="fi fi-br-calendar"></i></button>
                    </div>
                    <img class="img-welcome-mahasiswa" src="{{asset('assets/dashboard/asset/img/student_ilustration.png')}}" alt="" />
                </div>

                <div class="progress-container">
                    <div class="progress-header">
                        <div class="progress-title">
                            <i class="fi fi-br-chart"></i>
                            <span>Progres TA</span>
                        </div>
                        <button class="edit-button">
                            <i class="fi fi-br-edit"></i>
                            Edit Progres
                        </button>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 25%;">
                            <span class="progress-text">25%</span>
                        </div>
                    </div>
                </div>

                <div class="card-jadwal-dosen">
                    <div class="weekly-schedule">
                        <i class="fi fi-br-calendar"></i>
                        <h3>Jadwal Dosen Pembimbing</h3>
                    </div>
                    <div class="profile">
                        <img src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}">
                        <div class="profile-details">
                            <h4>Alena Uperiati, S.T., M.Cs</h4>
                            <span>122279</span>
                            <div class="button-container">
                                <a href="#">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="schedule">
                        <div class="day">9</div>
                        <div class="day">10</div>
                        <div class="day disabled">11</div>
                        <div class="day">12</div>
                        <div class="day">13</div>
                        <div class="day disabled">14</div>
                        <div class="day disabled">15</div>
                    </div>
                </div>
                <div class="spacer"></div>
            </div>
            <div class="right">
                <h2>Jadwal Bimbingan</h2>

                <div class="card-pengajuan">
                    <div class="detail1">
                        <div><img src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}" alt="" /></div>
                        <div class="value">
                            <h4 class="dosen">Alena Uperiati, S.T., M.Cs</h4>
                            <div class="tanggal"><i class="fi fi-br-calendar"></i> 12 September 2024</div>
                            <div class="jam"><i class="fi fi-br-clock"></i> 09:00 WIB</div>
                        </div>
                    </div>
                
                    <div class="detail2">
                        <div class="item">
                            <i class="fi fi-br-map-marker-home"></i>
                            <p>Ruangan</p>
                            <span>TA.12</span>
                        </div>
                        <div class="item">
                            <i class="fi fi-br-time-add"></i>
                            <p>Dibuat</p>
                            <span>10 September 2024</span>
                        </div>
                        <div class="item">
                            <i class="fi fi-br-memo"></i>
                            <p>Kode Pengajuan</p>
                            <span>KJR98KQAM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
</body>

</html>