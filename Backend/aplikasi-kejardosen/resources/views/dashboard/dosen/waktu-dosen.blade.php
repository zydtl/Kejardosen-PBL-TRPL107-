@extends('dashboard.dosen.layout.master')

@section('title')
    Waktu Bimbingan - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/waktu-dosen.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <div class="title">
            <h1>Waktu Bimbingan</h1>
        </div>
        <div class="card-welcome">
            <div class="text">
                <h1>Atur jadwal bimbingan Anda</h1>
                <div class="slogan">Hari yang Anda pilih akan digunakan sebagai default untuk semua minggu kecuali Anda membuat perubahan.</div>
                <div class="contoh-warna">
                    <div class="contoh-warna-aktif"></div> 
                    <p>hari aktif</p>
                    <div class="contoh-warna-tidak-aktif"></div>
                    <p>hari tidak aktif</p>
                </div>
            </div>
            <img class="img-welcome-dosen" src="{{asset('assets/dashboard/asset/img/pilih-waktu.svg')}}"/>
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
@endsection

@section('modalDosen')
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
    </div>
@endsection

@section('js')
    <script src="../asset/javascript/waktu-dosen.js"></script>
    <script src="../asset/javascript/sidebar-navbar.js"></script>
@endsection