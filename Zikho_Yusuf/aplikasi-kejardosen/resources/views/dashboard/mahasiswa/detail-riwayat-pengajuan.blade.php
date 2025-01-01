@extends('dashboard.mahasiswa.layout.master')

@section('title')
    Detail Riwayat Pengajuan - Mahasiswa
@endsection

@section('css') 
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/info.css')}}">
@endsection

@section('content')
<div class="main-content">
    <div class="title-and-button">
        <div class="title">
            <h1>Riwayat Pengajuan</h1>
        </div>
        <a href="{{ route('mahasiswa.riwayat-pengajuan') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-header">
        <div class="img-header">
            <img src="{{ asset('assets/dashboard/asset/img/avatar-dosen.png') }}" alt="Profile Picture" class="profile-pic">
        </div>
        <div class="text-header">
            <b>Kode Pengajuan: {{ $pengajuan->kodePengajuan }}</b><br>
            <small><b>Diajukan Pada : </b>{{ \Carbon\Carbon::parse($pengajuan->created_at)->translatedFormat('l, d F Y') }}   |   <b>Jam : </b>{{ \Carbon\Carbon::parse($pengajuan->created_at)->format('H:i') }} WIB</small>
        </div>
        <div class="col col-5" data-label="Status">
            <span class="
                            @if($pengajuan->status == 'menunggu' || $pengajuan->status == 'alternatif') 
                                status-waiting
                            @elseif($pengajuan->status == 'dibatalkan' || $pengajuan->status == 'ditolak') 
                                status-cancel
                            @elseif($pengajuan->status == 'diterima') 
                                status-accept
                            @elseif($pengajuan->status == 'berlangsung') 
                                status-ongoing
                            @elseif($pengajuan->status == 'disetujui') 
                                status-accept                               
                            @elseif($pengajuan->status == 'diselesaikan') 
                                status-finish
                            @endif
            ">
                {{ $pengajuan->status }}
            </span>
        </div>
    </div>
    <div class="detail-title">
        <h3>Detail Pengajuan</h3>
    </div>
    <div class="detail">
        <div class="ket">Nama Dosen Pembimbing</div>
        <div class="isi">{{ $pengajuan->mahasiswa->dosen->nama_dosen ?? '-' }}</div>
    </div>
    <div class="detail">
        <div class="ket">NIK/NIDN</div>
        <div class="isi">{{ $pengajuan->mahasiswa->dosen->nik ?? '-' }}</div>
    </div>
    <div class="detail">
        <div class="ket">Tanggal Pengajuan Bimbingan</div>
        {{-- <div class="isi">{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('l, d F Y') }}</div> --}}
        <div class="isi">{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('l, d F Y') }}</div>

    </div>
    <div class="detail">
        <div class="ket">Waktu Pengajuan Bimbingan</div>
        <div class="isi">{{ \Carbon\Carbon::parse($pengajuan->waktu_pengajuan)->format('H:i') }} WIB</div>
    </div>
    <div class="detail">
        <div class="ket">Tanggal Anjuran Dosen</div>
        {{-- <div class="isi">{{ \Carbon\Carbon::parse($pengajuan->tanggal_anjuranDosen ?? '-' )->translatedFormat('l, d F Y') }}</div> --}}
        <div class="isi">
            {{ $pengajuan->tanggal_anjuranDosen ? \Carbon\Carbon::parse($pengajuan->tanggal_anjuranDosen)->translatedFormat('l, d F Y') : '⛔ Tidak ada' }}
        </div>
        
    </div>
    <div class="detail">
        <div class="ket">Waktu Anjuran Dosen</div>
        <div class="isi">
            {{ $pengajuan->waktu_anjuranDosen ? \Carbon\Carbon::parse($pengajuan->waktu_anjuranDosen)->format('H:i') . ' WIB' : '⛔ Tidak ada' }}
        </div>
        
        
    </div>
    <div class="detail">
        <div class="ket">Judul Bimbingan</div>
        <div class="isi">{{ $pengajuan->judul_bimbingan }}</div>
    </div>
    <div class="detail">
        <div class="ket">Catatan Mahasiswa</div>
        <div class="isi">{{ $pengajuan->catatan_mahasiswa }}</div>
    </div>
    <div class="detail">
        <div class="ket">Catatan Dosen</div>
        <div class="isi">{{ $pengajuan->catatan_dosen ?? '⛔ Tidak ada' }}</div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/info.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection