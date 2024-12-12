<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan - Mahasiswa</title>

    @yield('css')


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>

</head>

<body>

    @include('dashboard.mahasiswa.include.header')




    <div class="container">

        <!-- Sidebar -->
        @include('dashboard.mahasiswa.include.sidebar')


        <!-- Main Content -->
        @yield('content')

    </div>



    <div id="formModal">
        <div class="modal">
            <h2>Buat Pengajuan</h2>
            <form>
                <div class="form-group">
                    <label for="tanggal">Pilih Tanggal</label>
                    <input type="date" id="tanggal" class="form-control1">
                </div>
                <div class="form-group">
                    <label for="waktu">Pilih Waktu</label>
                    <input type="time" id="waktu" class="form-control1">
                </div>
                <div class="form-group">
                    <label for="judul">Judul Bimbingan</label>
                    <input type="text" id="judul" class="form-controljudul" placeholder="Judul Bimbingan">
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea id="catatan" class="form-controlcatatan" rows="4"
                        placeholder="Tambahkan catatan..."></textarea>
                </div>
                <div class="button-group">
                    <button type="button" id="closeForm" class="btn btn-secondary1">Batalkan</button>
                    <button type="submit" class="buat btn btn-primary">Buat Pengajuan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="formModaledit">
        <div class="modal1">
            <h2>Pengajuan Ulang</h2>
            <form>
                <div id="double" class="form-group">
                    <div class="double1">
                        <label for="tanggal1">Pilih Tanggal</label>
                        <input type="date" id="tanggal1" class="form-control1">
                    </div>
                    <div class="double2">
                        <label for="tanggal">Tanggal Anjuran Dosen</label>
                        <input type="date" id="tanggal2" class="form-control1oke" disabled>
                    </div>
                </div>
                <div id="double" class="form-group">
                    <div class="double1">
                        <label for="tanggal">Pilih Waktu</label>
                        <input type="time" id="tanggal1" class="form-control1">
                    </div>
                    <div class="double2">
                        <label for="tanggal">Waktu Anjuran Dosen</label>
                        <input type="time" id="tanggal2" class="form-control1oke" disabled>
                    </div>
                </div>
                
                <div class="teks"><i class="fi fi-rr-info"></i>
                    <div class="alert">Sesuaikan tanggal dan
                        waktu bimbingan dengan jadwal anjuran dosen</div>
                </div>
                <div class="form-group">
                    <label for="judul">Catatan Dosen</label>
                    <textarea id="catatandosen" class="form-control" rows="4"
                        placeholder="Catatan dari dosen pembimbing" disabled></textarea>
                </div>
                <div class="form-group">
                    <label for="judul">Judul Bimbingan</label>
                    <input type="text" id="judul" class="form-control" placeholder="Judul Bimbingan">
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan Mahasiswa</label>
                    <textarea id="catatan" class="form-control" rows="4" placeholder="Tambahkan catatan..."></textarea>
                </div>
                <div class="button-group">
                    <button type="button" id="closeFormedit" class="btn btn-secondary">Batalkan</button>
                    <button type="submit" class="ubah btn btn-primary">Ubah Pengajuan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    
    @yield('js')


</body>

</html>