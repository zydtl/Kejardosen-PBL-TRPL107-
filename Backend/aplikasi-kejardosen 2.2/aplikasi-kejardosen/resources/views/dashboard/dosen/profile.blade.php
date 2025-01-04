@extends('dashboard.dosen.layout.master')

@section('title')
    Profil - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/profil.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <div class="title">
            <h1>Profil Saya</h1>
        </div>
        <div class="profil">
            <div class="foto">
                <img class="foto-profil" src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}" alt="" />
            </div>
            <div class="identitas">
                <div class="title-identitas">
                    <h3>Informasi Pribadi</h3>
                </div>
                <div class="isi-identitas">
                    <div class="row">
                        <div class="left-column">
                            <div class="ket">Nama</div>
                            <div class="value">{{ $dosen->nama_dosen }}</div>

                            <div class="ket">NIK/NIDN</div>
                            <div class="value">{{ $dosen->nik }}</div>

                            <div class="ket">Jumlah Mahasiswa</div>
                            @if ($mahasiswa > 0)
                                <div class="value">{{ $mahasiswa }}</div>
                            @else
                                <div class="value">⛔Belum memiliki mahasiswa</div>
                            @endif
                        </div>
                        <div class="right-column">
                            <div class="ket">Email</div>
                            <div class="value">{{ $dosen->email }}</div>

                            <div class="ket">Jenis Kelamin</div>
                            <div class="value">{{ $dosen->jenis_kelamin }}</div>

                            <div class="ket">No Telp</div>
                            <div class="value">{{ $dosen->no_telp }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/info.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection