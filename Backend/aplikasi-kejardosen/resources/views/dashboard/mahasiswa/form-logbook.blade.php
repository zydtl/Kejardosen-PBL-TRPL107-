@extends('dashboard.mahasiswa.layout.master')

@section('title')
    Logbook - Mahasiswa
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/form-logbook.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/rte_theme_default.css')}}"/>
@endsection

@section('content')
    <div class="main-content">
        <div class="containerlogbook">
        <div class="title"><h1>Logbook</h1></div>
        <form action="#" id="logbook-form">
            <div class="logbook-details">
                <div class="input-box">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" placeholder="Masukkan tanggal" required>
                </div>
                <div class="input-box">
                    <label for="waktu">Waktu</label>
                    <input type="time" id="waktu" placeholder="Masukkan Waktu Bimbingan" required>
                </div>
                <div class="input-box">
                    <label for="progres">Progres</label>
                    <input type="number" id="progres" placeholder="Persentase Progres" min="0" max="100" required>
                </div>
            </div>
            <div class="logbook-content">
                <div class="input-box">
                    <label for="judul-logbook">Judul Logbook</label>
                    <input type="text" id="judul-logbook" placeholder="Masukkan Judul Logbook" required>
                </div>
                <div class="input-box">
                    <label for="catatan-mahasiswa">Catatan Mahasiswa</label>
                    <div id="catatan-mahasiswa" class="richtext-editor"></div>
                </div>
                <div class="input-box">
                    <label for="catatan-dosen">Catatan Dosen</label>
                    <div id="catatan-dosen" class="richtext-editor"></div>
                </div>
            </div>
            <div class="button">
                <input class="cancel" type="button" value="Batal">
                <input class="submit" type="submit" value="Simpan">
            </div>          
        </form>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/rte.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/plugins/all_plugins.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/form-logbook.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/text-editor-mhs.js')}}"></script>
@endsection