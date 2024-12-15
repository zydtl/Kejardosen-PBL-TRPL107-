<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('assets/dashboard/asset/img/kejardosen-logo-circle.png')}}">
  <title>Riwayat Jadwal Bimbingan - Dosen</title>
  <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/info.css')}}">

  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">
  <link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
  <link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
  <link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
</head>

<body>
  <header class="navbar">
    <!-- HUMBURGER BUTTON -->
    <button onclick="toggleSidebar()" class="toggle-button">&#9776;</button>
    <div class="navbar-right">
      <a href="/"><i class="fi fi-br-bell"></i></a>
      <a href="/"><i class="fi fi-br-power"></i></a>
      <a href="/"><img src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}" alt="User Profile" class="profile-icon"></a>
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
      <div class="title-and-button">
        <div class="title">
            <h1>Riwayat Jadwal Bimbingan</h1>
        </div>
        <button class="btn btn-primary">Kembali</button>
      </div>
      <div class="card-header">
        <div class="img-header"> <img src="{{asset('assets/dashboard/asset/img/avatar.png')}}" alt="Profile Picture" class="profile-pic">
        </div>
        <div class="text-header">
          <b>Kode Jadwal: KJR98KQAM</b><br>
          <small>Diajukan Pada: 10 September 2024 13.00 WIB</small>
        </div>
        <div class="col col-5" data-label="Status"><span class="status-finish">Selesai</span></div>
        <!-- <div class="col col-5" data-label="Status"><span class="status-cancel">Dibatalkan</span></div> -->
      </div>
      <div class="detail-title">
        <h3>Detail Bimbingan</h3>
      </div>
      <div class="detail">
        <div class="ket">Nama Mahasiswa</div>
        <div class="isi">Muhammad Maulana Yusuf</div>
      </div>
      <div class="detail">
        <div class="ket">Kelas</div>
        <div class="isi">TRPL 7B Pagi</div>
      </div>
      <div class="detail">
        <div class="ket">NIM</div>
        <div class="isi">4342401057</div>
      </div>
      <div class="detail">
        <div class="ket">Tanggal Bimbingan</div>
        <div class="isi">Kamis, 12 September 2024</div>
      </div>
      <div class="detail">
        <div class="ket">Waktu Bimbingan</div>
        <div class="isi">09.00 WIB</div>
      </div>
      <div class="detail">
        <div class="ket">Ruangan</div>
        <div class="isi">TA 12</div>
      </div>
      <div class="detail">
        <div class="ket">Judul Bimbingan</div>
        <div class="isi">Bimbingan ke-6 Revisi Bab III</div>
      </div>
    </div>
  </div>

  <script src="{{asset('assets/dashboard/asset/javascript/info.js')}}"></script>
  <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>



</body>

</html>