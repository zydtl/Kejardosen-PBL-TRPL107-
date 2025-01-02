@extends('dashboard.dosen.layout.master')

@section('title')
    Daftar Logbook - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/logbook.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content">
                        
        <div class="title"><h1>Logbook</h1></div>
        <div class="search-container">
            <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
        </div> 
        <ul class="responsive-table-daftar">
            <li class="table-header">
                <div class="col col-5">Logbook ke</div>
                <div class="col col-1">Kode Logbook</div>
                <div class="col col-1">Kode Jadwal</div>
                <div class="col col-3">Terakhir Diubah</div>
                <div class="col col-4">Judul Logbook</div>
                <div class="col col-5">Progres</div>
                <div class="col col-6">Aksi</div>
            </li>
            @forelse ($logbook as $item)
                <li class="table-row">
                    <div class="col col-5" data-label="Logbook ke">{{ $loop->iteration }}</div>
                    <div class="col col-1" data-label="Kode Logbook">{{ $item->kodeLogbook }}</div>
                    <div class="col col-1" data-label="Kode Jadwal">{{ $item->jadwal->kodeJadwal }}</div>
                    <div class="col col-3" data-label="Terakhir Diubah">
                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y - H:i') }}
                    </div>
                    <div class="col col-4" data-label="Judul Logbook">{{ $item->judul_logbook }}</div>
                    <div class="col col-5" data-label="Progres TA">{{ $item->progres }}%</div>
                    <div class="col col-6" data-label="Aksi">
                        <a href="{{ route('dosen.form-logbook', ['kodeLogbook' => $item->kodeLogbook]) }}">
                            <button class="btn-edit"><i class="fi fi-br-edit edit"></i></button>
                        </a>
                        <a href="">
                            <button class="btn-info"><i class="fi fi-br-info info"></i></button>
                        </a>

                    </div>
                </li>
            @empty
                <li class="table-row gambar-kosong">
                    <div class="col" style="text-align: center; width: 100%;">
                        <img src="{{ asset('assets/dashboard/asset/img/tabel-kosong.svg') }}" alt="Kosong" />
                        <p>Belum ada logbook pada mahasiswa ini.</p>
                    </div>
                </li>
            @endforelse
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
    <script src="{{asset('assets/dashboard/asset/javascript/logbook.js')}}"></script>
@endsection