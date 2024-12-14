<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengajuan - Dosen</title>
    @yield('css')
    
    <link rel="icon" href="{{asset('assets/dashboard/asset/img/kejardosen-logo-circle.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css" />
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css" />
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body>
    @include('dashboard.dosen.include.header')



    <div class="container">
        <!-- Sidebar -->
        @include('dashboard.dosen.include.sidebar')


        <!-- Main Content -->
        @yield('content')

    </div>

    <!-- Form melihat pengajuan mahasiswa -->
    <div id="formModaledit" class="hidden modal">
        <div class="modal-content modalpengajuan">
            <div class="cancel"><button class="btn close-modal">X</button></div>
            <form>
                <div class="pengajuan-split">
                    <div id="double5" class="form-group kepanjangan1">
                        <div class="profil">
                            <img class="foto-profil" src="{{ asset('assets/dashboard/asset/img/avatar.png') }}"
                                alt="" />
                        </div>
                        <div class="detail-item" data-label="Diajukan Pada">
                            <h4>Muhammad Maulana Yusuf</h4>
                            <p>4342401XXX - TRPL 7B Pagi</p>
                        </div>
                        <div class="detail-item" data-label="Tanggal Pengajuan">
                            <h4>Pengajuan Jadwal:</h4>
                            <p>12 September 2024 09:00 WIB</p>
                        </div>
                        <div class="detail-item" data-label="Waktu Pengajuan">
                            <h4>Kode Pengajuan:</h4>
                            <p>WKWHGG54</p>
                        </div>
                        <div class="banding">
                            <button type="button" id="btnAturUlang" class="btn btnku btnkeren btnlagi"
                                onclick="switchToForm2()">
                                Atur Ulang Jadwal
                            </button>
                        </div>
                        <div class="respon">
                            <button id="tolak" class="tolak"><i class="fi fi-br-cross"></i></button>
                            <button id="terima" class="terima"><i class="fi fi-br-check"></i></button>
                        </div>
                    </div>
                    <div class="bagian2">
                        <div class="form-group two-col">
                            <div class="double">
                                <label for="tanggal">
                                    <p>Tanggal Pengajuan</p>
                                </label>
                                <input class="mati1" type="date" id="tanggal1" class="form-control1 mati"
                                    disabled />
                            </div>
                            <div class="double2">
                                <label for="tanggal">
                                    <p>Waktu Pengajuan</p>
                                </label>
                                <input type="time" id="tanggal2" class="form-control1oke lebar1" disabled />
                            </div>
                        </div>
                        <div id="double2" class="form-group">
                            <div class="double3">
                                <label for="judul">Judul Bimbingan</label>
                                <input class="mati" type="text" id="judul " class="form-control1 lebar mati"
                                    placeholder="Judul Bimbingan" disabled />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="judul">Catatan Mahasiswa</label>
                            <textarea id="catatandosen" class="form-control poke" rows="4"
                                placeholder="Selamat Pagi Bu, izin ingin meminta bantuan ibu untuk mengecek isi tugas akhir saya di bab 1"
                                disabled></textarea>
                        </div>
                        <div id="double7" class="form-group" style="display: none">
                            <div class="double1 just1">
                                <p for="tanggal"><b>Tanggal Anjuran Dosen</b></p>
                                <!-- <input type="date" id="tanggal1" class="form-control1 mati atur1" /> -->
                                <input type="date" id="tanggal" required>
                            </div>
                            <div class="double2 just">
                                <p for="waktu"><b> Waktu Anjuran Dosen</b></p>
                                <input type="time" id="waktu" class="form-control1oke lebar1 atur1" />
                            </div>
                        </div>
                        <div class="form-group">
                            <form method="post" class="">
                                <label for="judul">Pilih Jenis Bimbingan</label>
                                <select id="judul" class="form-control poke" name="jurusan">
                                    <option class="item" value="#">Offline<br /></option>
                                    <option class="item" value="#">Online <br /></option>
                                </select>
                            </form>
                        </div>
                        <div class="form-group">
                            <label for="judul">Ruangan</label>
                            <input type="text" id="judul" class="form-control poke"
                                placeholder="cth: TA.12, Zoom meeting" />
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan Dosen</label>
                            <textarea id="catatan" class="form-control poke" rows="4" placeholder="Tambahkan catatan untuk mahasiswa"></textarea>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    @yield('js')


</body>

</html>
