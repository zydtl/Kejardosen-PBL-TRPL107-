@extends('dashboard.mahasiswa.layout.master')

@section('title')
    Profil - Mahasiswa
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
                <img class="foto-profil" src="{{asset('assets/dashboard/asset/img/avatar.png')}}" alt="" />
            </div>
            <div class="identitas">
                <div class="title-identitas">
                    <h3>Informasi Pribadi</h3>
                </div>
                <div class="isi-identitas">
                    <div class="row">
                        <div class="left-column">
                            <div class="ket">Nama</div>
                            <div class="value">{{ $mahasiswa->nama_mahasiswa }}</div>

                            <div class="ket">NIM</div>
                            <div class="value">{{ $mahasiswa->nim }}</div>

                            <div class="ket">Kelas</div>
                            <div class="value">{{ $mahasiswa->kelas }}</div>
                        </div>
                        <div class="right-column">
                            <div class="ket">Email</div>
                            <div class="value">{{ $mahasiswa->email }}</div>

                            <div class="ket">Jenis Kelamin</div>
                            <div class="value">{{ $mahasiswa->jenis_kelamin }}</div>

                            <div class="ket">No Telp</div>
                            <div class="value">{{ $mahasiswa->no_telp }}</div>
                        </div>
                    </div>
                </div>
                <div class="title-tugas">
                    <h3>Informasi Tugas Akhir</h3>
                </div>
                <div class="isi-tugas">
                    <div class="row">
                        <div class="left-column">
                            <div class="ket">Judul Tugas Akhir</div>
                            <div class="value">{{ $mahasiswa->judul_tugas_akhir }}</div>

                            <div class="ket">Dosen Pembimbing</div>
                            <div class="value">{{ $mahasiswa->dosen->nama_dosen }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection