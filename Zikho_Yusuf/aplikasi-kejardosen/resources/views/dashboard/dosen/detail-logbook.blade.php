@extends('dashboard.dosen.layout.master')

@section('title')
    Detail Logbook - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/detail-logbook.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/rte_theme_default.css')}}" />
@endsection

@section('content')
    <div class="main-content">
        <div class="containerlogbook">
            <div class="header">
                <div class="title">
                    <h1>Logbook</h1>
                </div>
                <button class="keluar">Keluar</button>
            </div>

            <!-- Header tambahan untuk informasi mahasiswa dan dosen -->
            <div class="logbook-header">
                <div class="info-box">
                    <label for="nim">NIM Mahasiswa</label>
                    <div id="nim" class="value">4342401057</div>
                </div>
                <div class="info-box">
                    <label for="nama-mahasiswa">Nama Mahasiswa</label>
                    <div id="nama-mahasiswa" class="value">Maulana Yusuf</div>
                </div>
                <div class="info-box">
                    <label for="nik">NIK Dosen</label>
                    <div id="nik" class="value">1234567890</div>
                </div>
                <div class="info-box">
                    <label for="nama-dosen">Nama Dosen</label>
                    <div id="nama-dosen" class="value">Bapak Gilang Bagus Ramadhan</div>
                </div>
                <div class="info-box">
                    <label for="judul-ta">Judul Tugas Akhir</label>
                    <div id="judul-ta" class="value">Aplikasi Penjadwalan Bimbingan Mahasiswa</div>
                </div>
            </div>

            <div class="readonly-form">
                <div class="logbook-details">
                    <div class="input-box">
                        <label for="tanggal">Tanggal</label>
                        <div id="tanggal" class="readonly-text">2024-12-29</div>
                    </div>
                    <div class="input-box">
                        <label for="waktu">Waktu</label>
                        <div id="waktu" class="readonly-text">10:00</div>
                    </div>
                    <div class="input-box">
                        <label for="progres">Progres</label>
                        <div id="progres" class="readonly-text">75%</div>
                    </div>
                </div>
                <div class="logbook-content">
                    <div class="input-box">
                        <label for="judul-logbook">Judul Logbook</label>
                        <div id="judul-logbook" class="readonly-text">Bimbingan Proyek</div>
                    </div>
                    <div class="input-box">
                        <label for="catatan-mahasiswa">Catatan Mahasiswa</label>
                        <div id="catatan-mahasiswa" class="readonly-text">Progres berjalan lancar, diskusi dengan dosen tentang aplikasi web.</div>
                    </div>
                    <div class="input-box">
                        <label for="catatan-dosen">Catatan Dosen</label>
                        <div id="catatan-dosen" class="readonly-text">Perlu fokus lebih pada backend dan database.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/rte.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/plugins/all_plugins.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/form-logbook.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/detail-logbook.js')}}"></script>
@endsection

