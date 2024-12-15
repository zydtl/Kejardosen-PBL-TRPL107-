@extends('dashboard.admin.layout.master')

@section('title')
    Daftar Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/admin.css')}}">
@endsection

@section('content')
    <div class="main-content" >
                        
        <div class="title"><h1>Daftar Dosen</h1></div>
        <div class="search-and-button">
            <div class="search-container">
                <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
            </div> 
            <button id="tambah-dsn" class="btn btn-primary">Tambah Dosen</button>
        </div> 
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">NIK/NIDN</div>
                <div class="col col-2">Nama</div>
                <div class="col col-3">Program Studi</div>
                <div class="col col-4">Aksi</div>
            </li>
            <li class="table-row">
                <div class="col col-1" data-label="NIK/NIDN">122279</div>
                <div class="col col-2" data-label="Nama">Alena Uperiati.S.T.M.Cs</div>
                <div class="col col-3" data-label="Program Studi">Teknologi Rekayasa Perangkat Lunak</div>
                <div class="col col-4" data-label="Aksi">
                    <button class="btn-hapus-dsn"><i class="fi fi-br-trash trash"></i></button>
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
    <script src="{{asset('assets/dashboard/asset/javascript/daftar-dosen.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection