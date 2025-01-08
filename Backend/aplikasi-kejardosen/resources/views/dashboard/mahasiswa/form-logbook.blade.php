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
        <form action="{{ route('mahasiswa.form-logbook.update', $logbook->kodeLogbook) }}" method="POST" id="logbook-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="logbook-details">
                <div class="input-box">
                    <label for="tanggal">Tanggal bimbingan tugas akhir</label>
                    <input type="date" disabled id="tanggal" value="{{ $logbook->jadwal->tanggal_bimbingan }}" placeholder="Masukkan tanggal" required>
                </div>
                <div class="input-box">
                    <label for="waktu">Waktu bimbingan tugas akhir</label>
                    <input type="time" disabled id="waktu" value="{{ $logbook->jadwal->waktu_bimbingan }}" placeholder="Masukkan Waktu Bimbingan" required>
                </div>
                <div class="input-box">
                    <label for="progres">Progres (%)</label>
                    <input type="number" id="progres" name="progres" value="{{ $logbook->progres }}" placeholder="Persentase Progres" min="0" max="100" required>
                </div>        
            </div>
            <div class="logbook-content">
                <div class="input-box">
                    <label for="judul-logbook">Judul Logbook</label>
                    <input type="text" id="judul-logbook" name="judul_logbook" placeholder="Masukkan Judul Logbook" value="{{ $logbook->judul_logbook }}" required>
                </div>
                <div class="input-box">
                    <label for="catatan-mahasiswa">Logbook Mahasiswa</label>
                    <textarea id="catatan-mahasiswa" name="catatan_mahasiswa" class="richtext-editor" >{{ $logbook->catatan_mahasiswa }}</textarea>
                </div>
                <div class="input-box">
                    <label for="catatan-dosen">Catatan Dosen</label>
                    {{-- <div id="catatan-dosen" class="richtext-editor">{{ $logbook->catatan_dosen }}</div> --}}
                    <textarea id="catatan-dosen" name="catatan_dosen" class="richtext-editor" >{{ $logbook->catatan_dosen ?? '⛔ Dosen belum memberi catatan' }}</textarea>
                </div>
            </div>
            <div class="button">
                <input class="cancel" type="button" value="Batal" onclick="window.location.href='{{ route('mahasiswa.logbook') }}';">
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
    <script src="{{asset('assets/dashboard/asset/javascript/text-editor-mhs.js')}}"></script>
@endsection