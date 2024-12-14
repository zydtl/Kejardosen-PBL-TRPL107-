@extends('dashboard.admin.layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Dashboard-Admin.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="box">
                <div class="text">
                    <div class="h1">
                        <h1>Halo!</h1>
                    </div>
                    <div class="h2">Admin101</div>
                    <div class="h3"> Selamat datang sebagai Admin</div>
                </div>

                <img class="gambar" src="{{ asset('assets/dashboard/asset/img/undraw_personal_settings_re_i6w4.svg') }}" alt="">
            </div>

            <div class="kotak">
                <div class="box1">
                    <img class="graduation" src="{{ asset('assets/dashboard/asset/img/graduation-cap (1).png') }}"
                        alt="">

                    <div class="kotak2">
                        <div class="h1">
                            <h1>03</h1>
                        </div>
                        <div class="h2">Mahasiswa</div>
                    </div>
                </div>
                <div class="box2">

                    <img class="graduation" src="{{ asset('assets/dashboard/asset/img/graduation-cap (1).png') }}"
                        alt="">



                    <div class="kotak2">
                        <div class="h1">
                            <h1>03</h1>
                        </div>
                        <div class="h2">Dosen Pembimbing</div>
                    </div>
                </div>
                <div class="box3">

                    <img class="graduation" src="{{ asset('assets/dashboard/asset/img/graduation-cap (1).png') }}" alt="">



                    <div class="kotak2">
                        <div class="h1">
                            <h1>03</h1>
                        </div>
                        <div class="h2">Jumlah Bimbingan Aktif</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/dashboard-admin.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection


