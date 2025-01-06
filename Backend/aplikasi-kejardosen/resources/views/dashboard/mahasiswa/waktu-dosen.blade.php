@extends('dashboard.mahasiswa.layout.master')

@section('title')
    Waktu Dosen
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/waktu-dosen.css')}}">
<link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
<div class="main-content">
    <div class="title">
        <h1>Waktu Dosen</h1>
    </div>
    <div class="card-info-dosen">
        <div class="foto-profil">
            <img src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}" alt="Foto Profil Dosen">
        </div>
        <div class="info">
            <h2>Dr. John Doe</h2>
            <p>NIK: 12345678</p>
            <p>Email: johndoe@example.com</p>
            <p>No. Telp: +62 812 3456 7890</p>
            <span class="info-jadwal">Berikut adalah jadwal bimbingan yang telah diatur dosen selama satu minggu</span>
            <div class="contoh-warna">
                <div class="contoh-warna-aktif"></div> 
                <p>hari aktif</p>
                <div class="contoh-warna-tidak-aktif"></div>
                <p>hari tidak aktif</p>
            </div>
        </div>
        
    </div>
    
    
    <div class="card-hari">
        <div class="card-header">
            <div class="header-text">Jadwal Anda:</div>
            <button class="atur-jadwal-btn">Atur Jadwal</button>
        </div>
    
        <div class="hari" id="kondisi-senin">
            <h3>Senin</h3>
        </div>
        <div class="hari" id="kondisi-selasa">
            <h3>Selasa</h3>
        </div>
        <div class="hari" id="kondisi-rabu">
            <h3>Rabu</h3>
        </div>
        <div class="hari" id="kondisi-kamis">
            <h3>Kamis</h3>
        </div>
        <div class="hari" id="kondisi-jumat">
            <h3>Jumat</h3>
        </div>
        <div class="hari" id="kondisi-sabtu">
            <h3>Sabtu</h3>
        </div>
        <div class="hari" id="kondisi-minggu">
            <h3>Minggu</h3>
        </div>
    </div>            
</div>
</div>

<div class="modalAturHari hidden" id="modalAturHari">
<div class="modal-content">
    <h3>Atur Waktu</h3>
    <form id="form-atur-hari">
        <div class="atur-hari">
            <label for="senin">Senin:</label>
            <input type="checkbox" id="senin" name="senin" value="senin">
        </div>
        <div class="atur-hari">
            <label for="selasa">Selasa:</label>
            <input type="checkbox" id="selasa" name="selasa" value="selasa">
        </div>
        <div class="atur-hari">
            <label for="rabu">Rabu:</label>
            <input type="checkbox" id="rabu" name="rabu" value="rabu">
        </div>
        <div class="atur-hari">
            <label for="kamis">Kamis:</label>
            <input type="checkbox" id="kamis" name="kamis" value="kamis">
        </div>
        <div class="atur-hari">
            <label for="jumat">Jumat:</label>
            <input type="checkbox" id="jumat" name="jumat" value="jumat">
        </div>
        <div class="atur-hari">
            <label for="sabtu">Sabtu:</label>
            <input type="checkbox" id="sabtu" name="sabtu" value="sabtu">
        </div>
        <div class="atur-hari">
            <label for="minggu">Minggu:</label>
            <input type="checkbox" id="minggu" name="minggu" value="minggu">
        </div>
        <button type="button" id="btn-simpan">Simpan</button>
    </form>
</div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/waktu-dosen.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection