@extends('dashboard.mahasiswa.layout.master')

@section('title')
    Riwayat Jadwal Bimbingan - Mahasiswa
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/riwayat-jadwal-bimbingan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content">
                
        <div class="title"><h1>Riwayat Jadwal Bimbingan</h1></div>  
        <div class="search-container">
            <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
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
                <div class="col col-5" data-label="Status"><span class="status-finish">Selesai</span></div>
                <!-- <div class="col col-5" data-label="Status"><span class="status-cancel">Dibatalkan</span></div> -->
                <div class="col col-6" data-label="Aksi"><a href="/"><i class="fi fi-br-info"></i></a></div>
            </li>               
        </ul>
        <!-- Pagination -->
        <div class="pagination">
            <button class="prev-page">Prev</button>
            <span class="page-numbers">
                <span class="page-number active">1</span>
                <span class="page-number">2</span>
                <span class="page-number">3</span>
                <!-- Tambahkan lebih banyak page number sesuai dengan jumlah data -->
            </span>
            <button class="next-page">Next</button>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/riwayat.js')}}"></script>
@endsection