@extends('dashboard.mahasiswa.layout.master')

@section('title')
  Info Riwayat Jadwal Bimbingan - Mahasiswa
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/info.css')}}">
@endsection

@section('content')
  <div class="main-content">
    <div class="title-and-button">
      <div class="title">
          <h1>Riwayat Jadwal Bimbingan</h1>
      </div>
      <button class="btn btn-primary">Kembali</button>
    </div>
    <div class="card-header">
      <div class="img-header"> <img src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}" alt="Profile Picture" class="profile-pic">
      </div>
      <div class="text-header">
        <b>Kode Jadwal: KJR98KQAM</b><br>
        <small>Diajukan Pada: 10 September 2024 13.00 WIB</small>
      </div>
      <div class="col col-5" data-label="Status"><span class="status-finish">Selesai</span></div>
      <!-- <div class="col col-5" data-label="Status"><span class="status-cancel">Dibatalkan</span></div> -->
    </div>
    <div class="detail-title">
      <h3>Detail Bimbingan</h3>
    </div>
    <div class="detail">
      <div class="ket">Nama Dosen Pembimbing</div>
      <div class="isi">Alena Uperiati,S.T.,M.CS</div>
    </div>
    <div class="detail">
      <div class="ket">NIK/NIDN</div>
      <div class="isi">122279</div>
    </div>
    <div class="detail">
      <div class="ket">Tanggal Bimbingan</div>
      <div class="isi">Kamis, 12 September 2024</div>
    </div>
    <div class="detail">
      <div class="ket">Waktu Bimbingan</div>
      <div class="isi">09.00 WIB</div>
    </div>
    <div class="detail">
      <div class="ket">Ruangan</div>
      <div class="isi">TA 12</div>
    </div>
    <div class="detail">
      <div class="ket">Judul Bimbingan</div>
      <div class="isi">Bimbingan ke-6 Revisi Bab III</div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection