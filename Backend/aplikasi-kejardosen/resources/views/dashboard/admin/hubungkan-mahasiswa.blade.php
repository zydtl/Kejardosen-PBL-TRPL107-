@extends('dashboard.admin.layout.master')

@section('title')
    Hubungkan Mahasiswa
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/admin.css')}}">
@endsection

@section('content')
    <div class="main-content" >
                        
        <div class="title"><h1>Hubungkan Mahasiswa</h1></div>
        <div class="search-and-button">
            <div class="search-container">
                <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
            </div> 
            <button id="hubungkan" class="btn btn-primary">Hubungkan Mahasiswa</button>
        </div>

        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Mahasiswa</div>
                <div class="col col-2">Dosen Pembimbing</div>
                <div class="col col-3">Terakhir Diubah</div>
                <div class="col col-4">Aksi</div>
            </li>
            <li class="table-row">
                <div class="col col-1" data-label="NIK/NIDN">Muhammad Maulana Yusuf</div>
                <div class="col col-2" data-label="Nama">Alena Uperiati.S.T.M.Cs</div>
                <div class="col col-3" data-label="Terakhir Diubah">12-09-2024 11:00 WIB</div>
                <div class="col col-4" data-label="Aksi">
                    <button class="btn-edit"><i class="fi fi-br-edit edit"></i></button>
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
    <script src="{{asset('assets/dashboard/asset/javascript/admin.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/hubungkan.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection
