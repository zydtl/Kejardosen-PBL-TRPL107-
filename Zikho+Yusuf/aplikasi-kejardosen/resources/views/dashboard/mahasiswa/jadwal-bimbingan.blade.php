@extends('dashboard.mahasiswa.layout.master')

@section('title')
    Jadwal Bimbingan - Mahasiswa
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Jadwal-bimbingan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <div class="title"><h1>Jadwal Bimbingan</h1></div>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Kode Jadwal</div>
                <div class="col col-2">Disepakati Pada</div>
                <div class="col col-3">Tanggal Bimbingan</div>
                <div class="col col-4">Waktu Bimbingan</div>
                <div class="col col-5">Status</div>
                <div class="col col-6">Aksi</div>
            </li>

            @foreach ($jadwal as $item)
            <li class="table-row">
                <div class="col col-1" data-label="Kode Jadwal">{{ $item->kodeJadwal }}</div>
                <div class="col col-2" data-label="NIM">{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y - H:i') }} WIB</div>
                <div class="col col-3" data-label="Tanggal Bimbingan">{{ \Carbon\Carbon::parse($item->tanggal_bimbingan)->translatedFormat('l, d F Y') }}</div>
                <div class="col col-4" data-label="Waktu Bimbingan">{{ \Carbon\Carbon::parse($item->waktu_bimbingan)->timezone('Asia/Jakarta')->format('H:i') }} WIB</div>
                <div class="col col-5" data-label="Status"><span class="
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
                <!-- <div class="col col-5" data-label="Status"><span class="status-delay">Ditunda</span></div> -->
                <!-- <div class="col col-5" data-label="Status"><span class="status-finish">Selesai</span></div> -->
                <div class="col col-6" data-label="Aksi">
                    <button class="btn-tolak" title="Batalkan" data-role="dosen" data-kode="{{ $item->kodeJadwal }}"><i class="fi fi-br-ban delete"></i></button>
                    <a href="{{ route('mahasiswa.detail-jadwal-bimbingan', ['kodeJadwal' => $item->kodeJadwal]) }}">
                        <button class="btn-info" title="Info">
                            <i class="fi fi-br-info info"></i>
                        </button>
                    </a>
                    <button class="btn-selesai" title="Bimbingan Selesai" data-kode="{{ $item->kodeJadwal }}"><i class="fi fi-br-check selesai"></i></button>

                </div>
            </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/Jadwal-bimbingan-mhs.js')}}"></script>
@endsection
