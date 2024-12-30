@extends('dashboard.dosen.layout.master')

@section('title')
    Riwayat Pengajuan - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/riwayat-pengajuan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <div class="title"><h1>Riwayat Pengajuan</h1></div>
        <div class="search-container">
            <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
        </div>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">NIM Mahasiswa</div>
                <div class="col col-2">Diajukan Pada</div>
                <div class="col col-3">Tanggal Pengajuan</div>
                <div class="col col-4">Waktu Pengajuan</div>
                <div class="col col-5">Status</div>
                <div class="col col-6">Aksi</div>
            </li>

            @foreach ($pengajuan as $item)
                <li class="table-row">
                    <div class="col col-1" data-label="Kode Pengajuan">{{ $item->nim }}</div>
                    <div class="col col-2" data-label="Diajukan Pada">{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('d F Y - H:i') }} WIB</div>
                    <div class="col col-3" data-label="Tanggal Pengajuan">{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->translatedFormat('l, d F Y') }}</div>
                    <div class="col col-4" data-label="Waktu Pengajuan">{{ \Carbon\Carbon::parse($item->waktu_pengajuan)->timezone('Asia/Jakarta')->format('H:i') }} WIB</div>
                    <div class="col col-5" data-label="Status">
                        <span
                            class="
                                @if ($item->status == 'menunggu' || $item->status == 'alternatif')
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
                            ">{{ $item->status }}
                        </span>
                    </div>
                    <!-- <div class="col col-5" data-label="Status"><span class="status-reject">Ditolak</span></div> -->
                    <!-- <div class="col col-5" data-label="Status"><span class="status-resched">Reschedule</span></div> -->
                    <div class="col col-6" data-id="{{ $item->kodePengajuan }}" data-label="Aksi">
                        <a href="{{ route('dosen.detail-riwayat-pengajuan', ['kodePengajuan' => $item->kodePengajuan]) }}">
                            <i class="fi fi-br-info"></i>
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
