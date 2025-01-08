@extends('dashboard.dosen.layout.master')

@section('title')
    Logbook - Dosen
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
        <form action="{{ route('dosen.form-logbook.update', $logbook->kodeLogbook) }}" method="POST" id="logbook-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="logbook-details">
                <div class="input-box">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" placeholder="Tanggal Bimbingan" readonly value="{{ $logbook->jadwal->tanggal_bimbingan }}">
                </div>
                <div class="input-box">
                    <label for="waktu">Waktu</label>
                    <input type="time" id="waktu" placeholder="Waktu Bimbingan" readonly value="{{ $logbook->jadwal->waktu_bimbingan }}">
                </div>
                <div class="input-box">
                    <label for="progres">Progres</label>
                    <input type="number" id="progres" placeholder="Persentase Progres" min="0" max="100" readonly value="{{ $logbook->progres }}">
                </div>
            </div>
            <div class="logbook-content">
                <div class="input-box">
                    <label for="judul-logbook">Judul Logbook</label>
                    <input type="text" id="judul-logbook" placeholder="Judul Logbook" readonly value="{{ $logbook->judul_logbook }}">
                </div>
                <div class="input-box">
                    <label for="catatan-mahasiswa">Logbook Mahasiswa</label>
                    {{-- <div id="catatan-mahasiswa" class="richtext-editor">{{ $logbook->catatan_mahasiswa ?? '⛔ Mahasiswa belum mengisi logbook' }}</div> --}}
                    <textarea id="catatan-mahasiswa" name="catatan_mahasiswa" class="richtext-editor" >{{ $logbook->catatan_mahasiswa ?? '⛔ Mahasiswa belum mengisi logbook' }}</textarea>

                </div>
                <div class="input-box">
                    <label for="catatan-dosen">Catatan Dosen</label>
                    <textarea id="catatan-dosen" name="catatan_dosen" class="richtext-editor">{{ $logbook->catatan_dosen }}</textarea>
                </div>
            </div>
            <div class="button">

                {{-- <input class="cancel" type="button" value="Batal" onclick="window.location.href='{{ route('dosen.daftar-logbook', ['nim' => $logbook->nim]) }}';"> --}}
                <input class="cancel" type="button" value="Batal" onclick="window.location.href='{{ route('dosen.daftar-logbook', ['nim' => $logbook->jadwal->pengajuan->mahasiswa->nim]) }}';">
                <input class="submit" type="submit" id="submit-logbook" value="Simpan">

            </div>        
        </form>
    </div>
@endsection

@section('js')

    <script>
    document.getElementById('submit-logbook').addEventListener('click', function (e) {
        e.preventDefault(); // Mencegah pengiriman form langsung

        // Tampilkan notifikasi
        Swal.fire({
            title: "Berhasil!",
            text: "Logbook berhasil diubah.",
            icon: "success",
            confirmButtonText: "OK",
            confirmButtonColor: "#22a0b8"
        }).then(() => {
            // Setelah klik "OK", submit form secara normal
            document.getElementById('logbook-form').submit();
        });
    });
    </script>

    <script type="text/javascript" src="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/rte.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/dashboard/asset/richtexteditor/richtexteditor/plugins/all_plugins.js')}}"></script>

    <script src="{{asset('assets/dashboard/asset/javascript/form-logbook.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/text-editor-dsn.js')}}"></script>
@endsection