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
            <a href="{{ route('dosen.daftar-logbook', ['nim' => $logbook->jadwal->pengajuan->mahasiswa->nim]) }}"><button class="keluar">Kembali</button></a>
        </div>

        <!-- Header tambahan untuk informasi mahasiswa dan dosen -->
        <div class="logbook-header">
            <div class="info-box">
                <label for="nim">NIM Mahasiswa</label>
                <div id="nim" class="value">{{ $logbook->jadwal->pengajuan->mahasiswa->nim }}</div>
            </div>
            <div class="info-box">
                <label for="nama-mahasiswa">Nama Mahasiswa</label>
                <div id="nama-mahasiswa" class="value">{{ $logbook->jadwal->pengajuan->mahasiswa->nama_mahasiswa }}</div>
            </div>
            <div class="info-box">
                <label for="nik">NIK Dosen</label>
                <div id="nik" class="value">{{ $logbook->jadwal->pengajuan->mahasiswa->dosen->nik }}</div>
            </div>
            <div class="info-box">
                <label for="nama-dosen">Nama Dosen</label>
                <div id="nama-dosen" class="value">{{ $logbook->jadwal->pengajuan->mahasiswa->dosen->nama_dosen }}</div>
            </div>
            <div class="info-box">
                <label for="judul-ta">Judul Tugas Akhir</label>
                <div id="judul-ta" class="value">{{ $logbook->jadwal->pengajuan->mahasiswa->judul_tugas_akhir }}</div>
            </div>
        </div>

        <div class="readonly-form">
            <div class="logbook-details">
                <div class="input-box">
                    <label for="tanggal">Tanggal</label>
                    <div id="tanggal" class="readonly-text">{{ \Carbon\Carbon::parse($logbook->jadwal->tanggal_bimbingan)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y') }}</div>
                </div>
                <div class="input-box">
                    <label for="waktu">Waktu</label>
                    <div id="waktu" class="readonly-text">{{ \Carbon\Carbon::parse($logbook->jadwal->waktu_bimbingan)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('H:i') }} WIB</div>
                </div>
                <div class="input-box">
                    <label for="progres">Progres</label>
                    <div id="progres" class="readonly-text">{{ $logbook->progres }}%</div>
                </div>
            </div>
            <div class="logbook-content">
                <div class="input-box">
                    <label for="judul-logbook">Judul Logbook</label>
                    <div id="judul-logbook" class="readonly-text">{{ $logbook->judul_logbook }}</div>
                </div>
                <div class="input-box">
                    <label for="catatan-mahasiswa">Logbook Mahasiswa</label>
                    {{-- <div id="catatan-mahasiswa" class="richtext-editor">{{ $logbook->catatan_mahasiswa }}</div> --}}
                    <textarea id="catatan-mahasiswa" name="catatan_mahasiswa" class="richtext-editor" >{{ $logbook->catatan_mahasiswa ?? '⛔ Mahasiswa belum mengisi logbook' }}</textarea>

                </div>
                <div class="input-box">
                    <label for="catatan-dosen">Catatan Dosen</label>
                    <textarea id="catatan-dosen" name="catatan_dosen" class="richtext-editor" >{{ $logbook->catatan_dosen ?? '⛔ Dosen belum memberi catatan' }}</textarea>
                    {{-- <div id="catatan-dosen" class="readonly-text">{{ $logbook->catatan_dosen }}</div> --}}
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

