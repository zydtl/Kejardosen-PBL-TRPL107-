@extends('dashboard.dosen.layout.master')

@section('title')
    Riwayat Jadwal Bimbingan - Dosen
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
        <ul class="responsive-table-dsn">
            <li class="table-header">
                <div class="col col-1">Kode Pengajuan</div> 
                <div class="col col-2">NIM</div> 
                <div class="col col-3">Nama</div>
                <div class="col col-4">Tanggal Bimbingan</div>
                <div class="col col-5">Waktu Bimbingan</div>
                <div class="col col-6">Status</div>
                <div class="col col-7">Aksi</div>

            </li>
            @foreach ($jadwal as $item)
            <li class="table-row">
                <div class="col col-1" data-label="Kode Jadwal">{{ $item->kodeJadwal }}</div>
                <div class="col col-2" data-label="NIM">{{ $item->pengajuan->mahasiswa->nim }}</div>
                <div class="col col-3" data-label="Tanggal Bimbingan">{{ $item->pengajuan->mahasiswa->nama_mahasiswa }}</div>
                <div class="col col-4" data-label="Waktu Bimbingan">{{ \Carbon\Carbon::parse($item->tanggal_bimbingan)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y') }}</div>
                <div class="col col-5" data-label="Waktu Bimbingan">{{ \Carbon\Carbon::parse($item->waktu_bimbingan)->timezone('Asia/Jakarta')->format('H:i') }} WIB</div>
                <div class="col col-6" data-label="Status"><span class="
                                @if ($item->status == 'menunggu' || $item->status == 'alternatif' || $item->status == 'ditunda')
                                    status-waiting
                                @elseif($item->status == 'dibatalkan' || $item->status == 'ditolak') 
                                    status-cancel
                                @elseif($item->status == 'diterima') 
                                    status-accept
                                @elseif($item->status == 'berlangsung') 
                                    status-ongoing
                                @elseif($item->status == 'disetujui') 
                                    status-accept                               
                                @elseif($item->status == 'diselesaikan') 
                                    status-finish 
                                @endif
                    ">{{ $item->status }}</span></div>
                <!-- <div class="col col-5" data-label="Status"><span class="status-cancel">Dibatalkan</span></div> -->
                <div class="col col-7" data-label="Aksi">
                    <a href="{{ route('dosen.detail-riwayat-jadwal-bimbingan', ['kodeJadwal' => $item->kodeJadwal]) }}">
                        <i class="fi fi-br-info info"></i>
                    </a>
                </div>

            </li>   
            @endforeach        
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