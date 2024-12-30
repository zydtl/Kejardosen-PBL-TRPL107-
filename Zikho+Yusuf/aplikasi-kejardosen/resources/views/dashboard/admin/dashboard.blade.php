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
                    <h1>Halo!</h1>
                    <div class="nama">AdminKJR</div>
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
                        <h4>120</h4>
                        <span>Mahasiswa</span>
                    </div>
                </div>
                <div class="card-info">
                    <div class="card-info-icon">
                        <i class="fi fi-br-duration-alt"></i>
                    </div>
                    <div class="card-info-details">
                        <h4>40</h4>
                        <span>Dosen Pembimbing</span>
                    </div>
                </div>
                <div class="card-info">
                    <div class="card-info-icon">
                        <i class="fi fi-br-time-check"></i>
                    </div>
                    <div class="card-info-details">
                        <h4>02</h4>
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