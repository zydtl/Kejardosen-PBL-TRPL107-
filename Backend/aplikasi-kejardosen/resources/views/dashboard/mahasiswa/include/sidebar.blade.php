<aside id="sidebar" class="sidebar">
    <!-- logo -->
    <div class="logo-section">
        <a href="{{ route('mahasiswa.dashboard') }}"><img src="{{asset('assets/dashboard/asset/img/logokjrdns.png')}}" alt="Kejardosen Logo" class="logokjr" /></a>
    </div>
    <ul class="menu">
        <li><a href="{{ route('mahasiswa.dashboard') }}"><i class="fi fi-br-home"></i> <span class="menu-text">Beranda</span></a></li>
        <li><a href="{{ route('mahasiswa.pengajuan') }}"><i class="fi fi-br-graduation-cap"></i> <span class="menu-text">Pengajuan</span></a>
        </li>
        <li><a href="{{ route('mahasiswa.jadwal-bimbingan') }}"><i class="fi fi-br-list-check"></i> <span class="menu-text">Jadwal Bimbingan</span></a>
        </li>
        <li><a href=""><i class="fi fi-br-calendar"></i> <span class="menu-text">Waktu Dosen</span></a></li>
        <li><a href="{{ route('mahasiswa.logbook') }}"><i class="fi fi-br-memo"></i> <span class="menu-text">Logbook</span></a></li>
        <li class="menu-item has-submenu">
            <div class="submenu-toggle">
                <i class="fi fi-br-time-past"></i> <span class="menu-text">Riwayat</span>
            </div>
            <ul class="submenu">
                <li><a href="{{ route('mahasiswa.riwayat-pengajuan') }}"><i class="fi fi-br-time-past"></i> <span class="menu-text">Riwayat
                            Pengajuan</span></a></li>
                <li><a href="{{ route('mahasiswa.riwayat-jadwal-bimbingan') }}"><i class="fi fi-br-time-past"></i> <span class="menu-text">Riwayat Jadwal
                            Bimbingan</span></a></li>
            </ul>
        </li>
        <li><a href="{{ route('mahasiswa.profile') }}"><i class="fi fi-br-user"></i> <span class="menu-text">Profil</span></a></li>
    </ul>
</aside>


