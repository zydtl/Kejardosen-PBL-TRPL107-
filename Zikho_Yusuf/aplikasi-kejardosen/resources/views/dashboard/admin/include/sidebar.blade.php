<aside id="sidebar" class="sidebar">
    <div class="logo-section">
        <a href="{{ route('admin.dashboard') }}"><img src="{{asset('assets/dashboard/asset/img/logokjrdns.png')}}" alt="Kejardosen Logo" class="logokjr" /></a>
    </div>
    <ul class="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}"><i class="fi fi-br-home"></i>
                <span class="menu-text">Beranda</span></a>
        </li>
        <li>
            <a href="{{ route('admin.daftar-mahasiswa') }}"><i class="fi fi-br-graduation-cap"></i>
                <span class="menu-text">Daftar Mahasiswa</span></a>
        </li>
        <li>
            <a href="{{ route('admin.daftar-dosen') }}"><i class="fi fi-br-lesson-class"></i>
                <span class="menu-text">Daftar Dosen</span></a>
        </li>
        <li>
            <a href="{{ route('admin.hubungkan-mahasiswa') }}"><i class="fi fi-br-people-network-partner"></i>
                <span class="menu-text">Hubungkan Mahasiswa</span></a>
        </li>
        <li>
            <a href="{{ route('admin.lihat-bimbingan') }}"><i class="fi fi-br-workshop"></i>
                <span class="menu-text">Lihat Bimbingan</span></a>
        </li>
    </ul>
</aside>