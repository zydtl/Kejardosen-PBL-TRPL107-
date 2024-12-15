@extends('dashboard.admin.layout.master')

@section('title')
    Lihat Bimbingan
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/admin.css')}}">
@endsection

@section('content')
    <div class="main-content" >
                        
        <div class="title"><h1>Lihat Bimbingan</h1></div>
        <div class="search-container">
            <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
        </div> 
        <ul class="responsive-table-bimbingan">
            <li class="table-header">
                <div class="col col-1">Kode Jadwal</div>
                <div class="col col-2">NIM</div>
                <div class="col col-3">NIK/NIDN</div>
                <div class="col col-4">Waktu Bimbingan</div>
            </li>
            <li class="table-row">
                <div class="col col-1" data-label="NIK/NIDN">KJR98KQAM</div>
                <div class="col col-2" data-label="NIM">4342401057</div>
                <div class="col col-3" data-label="NIK/NIDN">122279</div>
                <div class="col col-4" data-label="Waktu Bimbingan">12-09-2024 11:00 WIB</div>
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
    <script src="{{asset('assets/dashboard/asset/javascript/admin.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection