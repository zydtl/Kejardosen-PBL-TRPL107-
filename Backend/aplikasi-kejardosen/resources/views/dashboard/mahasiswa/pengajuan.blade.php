@extends('dashboard.dosen.layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Pengajuan-mahasiswa.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <div class="title-and-button">
            <div class="title">
                <h1>Pengajuan</h1>
            </div>
            <button id="openForm" class="btn btn-primary">Buat Pengajuan</button>
        </div>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Kode Pengajuan</div>
                <div class="col col-2">Diajukan Pada</div>
                <div class="col col-3">Tanggal Pengajuan</div>
                <div class="col col-4">Waktu Pengajuan</div>
                <div class="col col-5">Status</div>
                <div class="col col-6">Aksi</div>
            </li>
            <li class="table-row">
                <div class="col col-1" data-label="Kode Pengajuan">AWQP436</div>
                <div class="col col-2" data-label="Diajukan Pada">10 September 2024 07:00 WIB</div>
                <div class="col col-3" data-label="Tanggal Pengajuan">12 September 2024</div>
                <div class="col col-4" data-label="Waktu Pengajuan">09.00 WIB</div>
                <div class="col col-5" data-label="Status"><span class="status-waiting">Menunggu</span></div>
                <!-- <div class="col col-5" data-label="Status"><span class="status-resched">Reschedule</span></div> -->
                <div class="col col-6" data-label="Aksi">
                    <button class="btn-info"><i class="fi fi-br-info info"></i></button>
                    <button class="btn-tolak" id="openFormdelete"><i class="fi fi-br-ban delete"></i></button>
                    <button class="btn-edit" id="openFormedit"><i class="fi fi-br-edit edit"></i></button>
                </div>
            </li>
        </ul>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/Pengajuan-mahasiswa.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection


