<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>

    <link rel="stylesheet" href="{{ asset('assets/dashboard/asset/css/Dashboard-mahasiswa.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/asset/css/sidebar-navbar.css') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
</head>

<body>
    <header class="navbar">
        <button onclick="toggleSidebar()" class="toggle-button">☰</button>
        <div class="navbar-right">
            <i class="fi fi-br-bell"></i>
            <i class="fi fi-br-power"></i>
            <img src="{{ asset('assets/dashboard/asset/img/avatar.png') }}" alt="User Profile" class="profile-icon">
        </div>
    </header>

    <div class="container">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar">
            <!-- logo -->
            <div class="logo-section">
                <img src="{{ asset('assets/dashboard/asset/img/logokjrdns.png') }}" alt="Kejardosen Logo" class="logokjr" />
            </div>
            <ul class="menu">
                <li><i class="fi fi-br-home"></i> <span class="menu-text">Beranda</span></li>
                <li><i class="fi fi-br-graduation-cap"></i> <span class="menu-text">Pengajuan</span></li>
                <li><i class="fi fi-rr-list-check"></i> <span class="menu-text">Daftar Bimbingan</span></li>
                <li><i class="fi fi-br-calendar"></i> <span class="menu-text">Kalender</span></li>
                <li><i class="fi fi-rr-memo"></i> <span class="menu-text">Logbook</span></li>
                <li><i class="fi fi-rr-time-past"></i> <span class="menu-text">Riwayat</span></li>
                <li><i class="fi fi-rr-user"></i> <span class="menu-text">Profil</span></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="kolom">
                    <div class="box">
                        <div class="text">
                            <div class="h1">
                                <h1>Halo!</h1>
                            </div>
                            <div class="h2">Juan Immanuel Tinambunan</div>
                            <div class="h3">Bimbingan on time, skripsi on point!</div>
                            <div href="#" class="button">
                                <a href="#" class="button">Ajukan Jadwal <img src="../asset/img/calendar.png" alt=""></a> 
                            </div>
                        </div>
                        <img class="gambar" src="{{ asset('assets/dashboard/asset/img/undraw_hello_re_3evm.svg') }}" alt="">
                    </div>

                    <div class="kotak">
                        <div class="box1">
                            <div class="kotak1">
                                <ol><i class="fi fi-br-chart-histogram"></i></ol>
                                <div class="Jadwal-Dosenok">
                                    <h1><b>Progres Tugas Akhir</b></h1>
                                </div>
                                <div href="#" class="buttonlogbook">
                                    <a href="#" class="buttonprogres"><img src="{{ asset('assets/dashboard/asset/img/edit.png') }}"
                                            alt="">Edit Progres </a>
                                </div>
                            </div>

                            <div class="bar-progress">
                                <div class="progress-container">
                                    <div class="progress-bar" id="progress-bar" style="width: 0%;">25%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="kolom2">
                    <div class="teksjadwal1">
                        <div>
                            <h1>Jadwal Bimbingan</h1>
                        </div>
                    </div>

                    <div class="profil">
                        <div class="garis1">
                            <div><img src="{{ asset('assets/dashboard/asset/img/avatar.png') }}" alt=""></div>
                            <div class="info">
                                <h4>Alena Uperiati, S.T.,M.Cs</h4>
                                <div>
                                    <ol class="line1"><i class="fi fi-br-calendar"></i>12 September 2024 </ol>
                                </div>
                                <div>
                                    <ol class="line2"><i class="fi fi-br-clock"></i>09:00 WIB </ol>
                                </div>
                            </div>
                        </div>

                        <div class="garis2">
                            <div class="ruangan">
                                <i class="fi fi-rs-map-marker-home"></i>
                                <p class="tempat">Ruangan</p>
                                <p class="lokasi">TA.12.4</p>
                            </div>

                            <div class="tanggal">
                                <i class="fi fi-rr-time-add"></i>
                                <p class="tempat">Dibuat</p>
                                <p class="lokasi2">10 September 2024</p>
                            </div>

                            <div class="kode">
                                <i class="fi fi-rr-memo"></i>
                                <p class="tempat">Kode Jadwal</p>
                                <p class="lokasi3">KJRD05AM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-kedua">
                <div class="kalender">
                    <ol><i class="fi fi-br-calendar"></i></ol>
                    <div class="Jadwal-Dosen">
                        <h1><b>Kalender</b></h1>
                    </div>
                </div>

                <div class="js-calender">
                    <div id='calendar'></div>
                </div>

                <div class="boxjadwal">

                    <div class="kotak1">
                        <ol><i class="fi fi-br-calendar"></i></ol>
                        <div class="Jadwal-Dosen">
                            <h1><b>JADWAL DOSEN</b></h1>
                        </div>
                    </div>

                    <div class="pilih-jadwal">

                        <div class="pemilihan-jadwal">


                            <div class="gambardosen">
                                <img src="{{ asset('assets/dashboard/asset/img/avatar.png') }}" alt="">
                            </div>

                            <div class="teksone">
                                <div class="ruangan">
                                    <i class="fi fi-rs-map-marker-home"></i>
                                    <p class="tempatmu">Ruangan</p>
                                    <p class="lokasixy">TA.12.4</p>
                                </div>

                                <div class="tanggal10">
                                    <i class="fi fi-rr-time-add"></i>
                                    <p class="tempatku">Dibuat</p>
                                    <p class="lokasi7">10 September 2024</p>
                                </div>

                                <div class="button-x">
                                    <a href="#" class="button">Selengkapnya <img src="{{ asset('assets/dashboard/asset/img/arrow-up-right.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>



                        <div class="jadwal">
                            <a href="#" class="text">Senin <br> 9</a>
                            <a href="#" class="text">Selasa <br> 10</a>
                            <a href="#" class="text">Rabu <br> 11</a>
                            <a href="#" class="text">Kamis <br> 12</a>
                            <a href="#" class="text">Jumat <br> 13</a>
                            <a href="#" class="text">Sabtu <br> 14</a>
                            <a href="#" class="text">Minggu <br> 15</a>
                        </div>
                    </div>
                </div>



            </div>

        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales-all.min.js"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/dashboard-mahasiswa.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/sidebar-navbar.js') }}"></script>


</body>

</html>