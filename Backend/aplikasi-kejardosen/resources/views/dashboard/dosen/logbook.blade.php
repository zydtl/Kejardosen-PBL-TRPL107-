@extends('dashboard.dosen.layout.master')

@section('title')
    Logbook - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/logbook.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content" >
                        
        <div class="title"><h1>Logbook</h1></div>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">NIM</div>
                <div class="col col-2">Nama</div>
                <div class="col col-3">Terakhir Diubah</div>
                <div class="col col-4">Progres TA</div>
                <div class="col col-5">Aksi</div>
            </li>
            @foreach ($mahasiswa as $item)
            <li class="table-row">
                <div class="col col-1" data-label="NIM">{{ $item->nim }}</div>
                <div class="col col-2" data-label="Nama">{{ $item->nama_mahasiswa }}</div>
                <div class="col col-3" data-label="Terakhir Diubah">

                @php
                    $lastLogbook = $item->pengajuan->flatMap->jadwal->flatMap->logbooks->last();
                @endphp

                @if ($lastLogbook)
                    {{ \Carbon\Carbon::parse($lastLogbook->created_at)->translatedFormat('l, d F Y - H:i') }} WIB
                @else
                    -
                @endif
    
                </div>
                <div class="col col-4" data-label="Progres TA">
                    @if ($lastLogbook)
                        {{ $lastLogbook->progres }}%
                    @else
                        0%
                    @endif
                </div>
                <div class="col col-5" data-label="Aksi">
                    <a href="{{ route('dosen.daftar-logbook', ['nim' => $item->nim]) }}">
                        <button class="btn-list"><i class="fi fi-br-list list"></i></button>
                    </a>
                    <button class="btn-profil" 
                    data-nama = "{{ $item->nama_mahasiswa }}"
                    data-nim = "{{ $item->nim }}"
                    data-email = "{{ $item->email }}"
                    data-no_telp= "{{ $item->no_telp }}"
                    data-judul_tugas_akhir = "{{ $item->judul_tugas_akhir }}"
                    data-jenis_kelamin = "{{ $item->jenis_kelamin }}"
                    data-kelas = "{{ $item->kelas }}"
                    ><i class="fi fi-br-user profil"></i></button>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('modal')
<div id="modal-profil" class="modal-overlay hidden">
    <div class="modal">
        <div class="modal-header">
            <h2>Informasi Mahasiswa</h2>
            <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="modal-content">
                <div class="profile-photo">
                    <!-- Gambar Profil Mahasiswa -->
                    <img src="{{asset('assets/dashboard/asset/img/avatar.png')}}" alt="Foto Profil Mahasiswa" class="profil-img">
                </div>
                <div class="student-info">
                    <p><strong>Nama:</strong> Maulana Yusuf</p>
                    <p><strong>NIM:</strong> 4342401057</p>
                    <p><strong>Email:</strong> maulana@example.com</p>
                    <p><strong>No Telepon:</strong> 081234567890</p>
                    <p><strong>Judul Tugas Akhir:</strong> Pengembangan Aplikasi Jadwal Bimbingan</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/logbook.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/modal-logbook.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection
