<aside id="sidebar" class="sidebar">
    <!-- logo -->
    <div class="logo-section">
        <a href="{{ route('dosen.dashboard') }}"><img src="{{ asset('assets/dashboard/asset/img/logokjrdns.png') }}"
                alt="Kejardosen Logo" class="logokjr" /></a>
    </div>
    <ul class="menu">
        <li>
            <a href="{{ route('dosen.dashboard') }}"><i class="fi fi-br-home"></i>
                <span class="menu-text">Beranda</span></a>
        </li>
        <li>
            <a href="{{ route('dosen.pengajuan') }}"><i class="fi fi-br-graduation-cap"></i>
                <span class="menu-text">Pengajuan</span></a>
        </li>
        <li>
            <a href="{{ route('dosen.jadwal-bimbingan') }}"><i class="fi fi-br-list-check"></i>
                <span class="menu-text">Jadwal Bimbingan</span></a>
        </li>
        <li>
            <a href=""><i class="fi fi-br-calendar"></i>
                <span class="menu-text">Waktu Dosen</span></a>
        </li>
        <li>
            <a href="{{ route('dosen.logbook') }}"><i class="fi fi-br-memo"></i>
                <span class="menu-text">Logbook</span></a>
        </li>
        <li class="menu-item has-submenu">
            <div class="submenu-toggle">
                <i class="fi fi-br-time-past"></i>
                <span class="menu-text">Riwayat</span>
            </div>
            <ul class="submenu">
                <li>
                    <a href="{{ route('dosen.riwayat-pengajuan') }}"><i class="fi fi-br-time-past"></i>
                        <span class="menu-text">Riwayat Pengajuan</span></a>
                </li>
                <li>
                    <a href="{{ route('dosen.riwayat-jadwal-bimbingan') }}"><i class="fi fi-br-time-past"></i>
                        <span class="menu-text">Riwayat Jadwal Bimbingan</span></a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('dosen.profile') }}"><i class="fi fi-br-user"></i>
                <span class="menu-text">Profil</span></a>
        </li>
    </ul>
</aside>