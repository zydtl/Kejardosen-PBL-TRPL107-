@extends('dashboard.mahasiswa.layout.master')

@section('title')
    Jadwal Bimbingan - Mahasiswa
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Jadwal-bimbingan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <div class="title"><h1>Jadwal Bimbingan</h1></div>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Kode Jadwal</div>
                <div class="col col-2">NIM</div>
                <div class="col col-3">Tanggal Bimbingan</div>
                <div class="col col-4">Waktu Bimbingan</div>
                <div class="col col-5">Status</div>
                <div class="col col-6">Aksi</div>
            </li>
            <li class="table-row">
                <div class="col col-1" data-label="Kode Jadwal">KJR98KQAM</div>
                <div class="col col-2" data-label="NIM">4342401057</div>
                <div class="col col-3" data-label="Tanggal Bimbingan">12 September 2024</div>
                <div class="col col-4" data-label="Waktu Bimbingan">09.00 WIB</div>
                <div class="col col-5" data-label="Status"><span class="status-ongoing">Berlangsung</span></div>
                <!-- <div class="col col-5" data-label="Status"><span class="status-cancel">Dibatalkan</span></div> -->
                <!-- <div class="col col-5" data-label="Status"><span class="status-delay">Ditunda</span></div> -->
                <!-- <div class="col col-5" data-label="Status"><span class="status-finish">Selesai</span></div> -->
                <div class="col col-6" data-label="Aksi">
                    <button class="btn-tolak" title="Batalkan" data-role="mahasiswa"><i class="fi fi-br-ban delete"></i></button>
                    <button class="btn-info" title="Info"><i class="fi fi-br-info info"></i></button>
                    <button class="btn-selesai" title="Bimbingan Selesai"><i class="fi fi-br-check selesai"></i></button>
                </div>
            </li>
        </ul>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/Jadwal-bimbingan-mhs.js')}}"></script>
@endsection
