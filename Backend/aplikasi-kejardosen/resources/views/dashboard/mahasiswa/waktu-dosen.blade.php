@extends('dashboard.mahasiswa.layout.master')

@section('title')
    Waktu Dosen
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/waktu-dosen.css')}}">
<link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
<div class="main-content">
    <div class="title">
        <h1>Waktu Dosen</h1>
    </div>
    <div class="card-info-dosen">
        <div class="foto-profil">
            <img src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}" alt="Foto Profil Dosen">
        </div>
        <div class="info">
            <h2>{{ $waktuDosen->dosen->nama_dosen }}</h2>
            <p>NIK: {{ $waktuDosen->dosen->nik }}</p>
            <p>Email: {{ $waktuDosen->dosen->email }}</p>
            <p>No. Telp: +62 {{ $waktuDosen->dosen->no_telp }}</p>
            <span class="info-jadwal">Berikut adalah jadwal bimbingan yang telah diatur dosen selama satu minggu</span>
            <div class="contoh-warna">
                <div class="contoh-warna-aktif"></div> 
                <p>hari aktif</p>
                <div class="contoh-warna-tidak-aktif"></div>
                <p>hari tidak aktif</p>
            </div>
        </div>
        
    </div>
    
    
    <div class="card-hari">
        <div class="card-header">
            <div class="header-text">Jadwal {{ $waktuDosen->dosen->nama_dosen }}:</div>
            <a href="{{ route('mahasiswa.pengajuan') }}" class="atur-jadwal-btn">Ajukan Jadwal</a>
            {{-- <button class="atur-jadwal-btn">Atur Jadwal</button> --}}
        </div>
    
        <div class="hari {{ $waktuDosen->kondisi_senin == 1 ? 'checked' : '' }}" id="kondisi-senin">
            <h3>Senin</h3>
        </div>
        <div class="hari {{ $waktuDosen->kondisi_selasa == 1 ? 'checked' : '' }}" id="kondisi-selasa">
            <h3>Selasa</h3>
        </div>
        <div class="hari {{ $waktuDosen->kondisi_rabu == 1 ? 'checked' : '' }}" id="kondisi-rabu">
            <h3>Rabu</h3>
        </div>
        <div class="hari {{ $waktuDosen->kondisi_kamis == 1 ? 'checked' : '' }}" id="kondisi-kamis">
            <h3>Kamis</h3>
        </div>
        <div class="hari {{ $waktuDosen->kondisi_jumat == 1 ? 'checked' : '' }}" id="kondisi-jumat">
            <h3>Jumat</h3>
        </div>
        <div class="hari {{ $waktuDosen->kondisi_sabtu == 1 ? 'checked' : '' }}" id="kondisi-sabtu">
            <h3>Sabtu</h3>
        </div>
        <div class="hari {{ $waktuDosen->kondisi_minggu == 1 ? 'checked' : '' }}" id="kondisi-minggu">
            <h3>Minggu</h3>
        </div>
    </div>            
</div>

@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/waktu-dosen.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection