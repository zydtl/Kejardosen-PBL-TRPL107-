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
                            <div class="value">Muhammad Maulana Yusuf</div>

                            <div class="ket">NIM</div>
                            <div class="value">4342401057</div>

                            <div class="ket">Kelas</div>
                            <div class="value">TRPL 7B Pagi</div>
                        </div>
                        <div class="right-column">
                            <div class="ket">Email</div>
                            <div class="value">maulanayusuf@gmail.com</div>

                            <div class="ket">Jenis Kelamin</div>
                            <div class="value">Laki-laki</div>

                            <div class="ket">No Telp</div>
                            <div class="value">085943094008</div>
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
                            <div class="value">Optimasi Algoritma Pencarian Terdistribusi untuk Big Data di Platform Cloud Computing</div>

                            <div class="ket">Dosen Pembimbing</div>
                            <div class="value">Alena Uperiati, S.T., M.Cs</div>
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