@extends('dashboard.admin.layout.master')

@section('title')
    Dashboard - Admin
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Dashboard-admin.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}" />
@endsection

@section('content')
    <div class="main-content">
        <div class="left">
            <div class="card-welcome">
                <div class="text">
                    <h1>👋🏻Halo!🤗</h1>
                    <div class="nama">Username : {{ $admin->username }}🧑🏻‍💻 <span>({{ $admin->nama }})</span></div>
                    <div class="slogan">Kontrol Penuh, Proses Lancar</div>
                </div>
                <img class="img-welcome-admin" src="{{asset('assets/dashboard/asset/img/admin_ilustration.png')}}" alt="" />
            </div>

            <div class="info-cards">
                <div class="card-info">
                    <div class="card-info-icon">
                        <i class="fi fi-br-time-check"></i>
                    </div>
                    <div class="card-info-details">
                        @if ($mahasiswa > 0)
                            <h4>0{{ $mahasiswa }}</h4>
                        @else
                            <h4>00</h4>
                        @endif
                        <span>Mahasiswa</span>
                    </div>
                </div>
                <div class="card-info">
                    <div class="card-info-icon">
                        <i class="fi fi-br-duration-alt"></i>
                    </div>
                    <div class="card-info-details">
                        @if ($dosen > 0)
                            <h4>0{{ $dosen }}</h4>
                        @else
                            <h4>00</h4>
                        @endif
                        <span>Dosen Pembimbing</span>
                    </div>
                </div>
                <div class="card-info">
                    <div class="card-info-icon">
                        <i class="fi fi-br-time-check"></i>
                    </div>
                    <div class="card-info-details">
                        @if ($jadwal > 0)
                            <h4>0{{ $jadwal }}</h4>
                        @else
                            <h4>00</h4>
                        @endif
                        <span>Jumlah Bimbingan Aktif</span>
                    </div>
                </div>
            </div>
            <div class="spacer"></div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection