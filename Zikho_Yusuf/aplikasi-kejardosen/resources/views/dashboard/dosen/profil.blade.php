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
                            <div class="value">Alena Uperiati, S.T., M.Cs</div>

                            <div class="ket">NIK/NIDN</div>
                            <div class="value">122279</div>

                            <div class="ket">Prodi</div>
                            <div class="value">Teknologi Rekayasa Perangkat Lunak</div>
                        </div>
                        <div class="right-column">
                            <div class="ket">Email</div>
                            <div class="value">alena@polibatam.ac.id</div>

                            <div class="ket">Jenis Kelamin</div>
                            <div class="value">Perempuan</div>

                            <div class="ket">No Telp</div>
                            <div class="value">089576849586</div>
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