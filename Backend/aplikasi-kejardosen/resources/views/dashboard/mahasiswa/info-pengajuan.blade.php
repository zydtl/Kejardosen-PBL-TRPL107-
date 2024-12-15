@extends('dashboard.mahasiswa.layout.master')

@section('title')
  Info Pengajuan - Mahasiswa
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/info.css')}}">
@endsection

@section('content')
  <div class="main-content">
    <div class="title-and-button">
      <div class="title">
          <h1>Pengajuan</h1>
      </div>
      <button class="btn btn-primary">Kembali</button>
    </div>
    <div class="card-header">
      <div class="img-header"> <img src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}" alt="Profile Picture" class="profile-pic">
      </div>
      <div class="text-header">
        <b>Kode Pengajuan: AWQP436</b><br>
        <small>Diajukan Pada: 10 September 2024 13.00 WIB</small>
      </div>
      <div class="col col-5" data-label="Status"><span class="status-waiting">Menunggu</span></div>
      <!-- <div class="col col-5" data-label="Status"><span class="status-resched">Reschedule</span></div> -->
    </div>
    <div class="detail-title">
      <h3>Detail Pengajuan</h3>
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
      <div class="ket">Tanggal Pengajuan Bimbingan</div>
      <div class="isi">Kamis, 12 September 2024</div>
    </div>
    <div class="detail">
      <div class="ket">Waktu Pengajuan Bimbingan</div>
      <div class="isi">09.00 WIB</div>
    </div>
    <div class="detail">
      <div class="ket">Tanggal Anjuran Dosen</div>
      <div class="isi">-</div>
    </div>
    <div class="detail">
      <div class="ket">Waktu Anjuran Dosen</div>
      <div class="isi">-</div>
    </div>
    <div class="detail">
      <div class="ket">Judul Bimbingan</div>
      <div class="isi">Bimbingan ke-6 Revisi Bab III</div>
    </div>
    <div class="detail">
      <div class="ket">Catatan Mahasiswa</div>
      <div class="isi">Assalamualaikum Bu, mohon bantuannya bu untuk mengoreksi isi bab 3 yang sudah saya buat </div>
    </div>
    <div class="detail">
      <div class="ket">Catatan Dosen</div>
      <div class="isi">-</div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection