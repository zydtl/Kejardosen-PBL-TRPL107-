@extends('dashboard.dosen.layout.master')

@section('title')
    Logbook - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/logbook.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content" >
                        
        <div class="title"><h1>Logbook</h1></div>
        <div class="search-container">
            <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
        </div> 
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">NIM</div>
                <div class="col col-2">Nama</div>
                <div class="col col-3">Terakhir Diubah</div>
                <div class="col col-4">Progres TA</div>
                <div class="col col-5">Aksi</div>
            </li>
            <li class="table-row">
                <div class="col col-1" data-label="NIM">4342401057</div>
                <div class="col col-2" data-label="Nama">Muhammad Maulana Yusuf</div>
                <div class="col col-3" data-label="Terakhir Diubah">10 September 2024 07:00 WIB</div>
                <div class="col col-4" data-label="Progres TA">25%</div>
                <div class="col col-5" data-label="Aksi">
                    <button class="btn-list"><i class="fi fi-br-list list"></i></button>
                </div>
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
    <script src="{{asset('assets/dashboard/asset/javascript/logbook.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection
