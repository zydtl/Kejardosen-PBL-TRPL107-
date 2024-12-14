@extends('dashboard.dosen.layout.master')
@section('css')
    <link rel="stylesheet" href=  "{{ asset('assets/dashboard/asset/css/sidebar-navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/asset/css/Pengajuan-dosen.css') }}" />
@endsection

@section('content')
    <div class="main-content utama">
            <div class="title">
                <h1>Pengajuan</h1>
            </div>
            <div class="search-container">
                <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
            </div>
            <ul class="responsive-table">
                <li class="table-row baris-pengajuan">
                    <div class="col col-1" data-label="img">
                        <img src="{{ asset('assets/dashboard/asset/img/avatar-dosen.png') }}" alt="" />
                    </div>
                    <div class="col col-2" data-label="Diajukan Pada">
                        <h1>Muhammad Maulana Yusuf</h1>
                        <p>4342401XXX - TRPL 7B Pagi</p>
                    </div>
                    <div class="col col-3" data-label="Tanggal Pengajuan">
                        <h1>Pengajuan Jadwal:</h1>
                        <p>12 September 2024 09:00 WIB</p>
                    </div>
                    <div class="col col-4" data-label="Waktu Pengajuan">
                        <h1>Kode Pengajuan:</h1>
                        <p>WKWHGG54</p>
                    </div>
                    <a><button id="openFormpengajuan" class="btn btnku btnkeren">
                            Lihat Pengajuan
                        </button></a>
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
    <script src="{{ asset('assets/dashboard/asset/javascript/Alert_Pengajuan-Dosen.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/Ganti-form.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/pengajuanDosen.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/sidebar-navbar.js') }}"></script>
@endsection
