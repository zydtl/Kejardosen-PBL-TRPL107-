@extends('dashboard.dosen.layout.master')
    @section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="kolom">
                <div class="box">
                    <div class="text">
                        <div class="h1">
                            <h1>Halo!</h1>
                        </div>
                        <div class="h2">Alena Uperiati, S.T.,M.Cs</div>
                        <div class="h3"> Atur jadwal bimbingan anda</div>
                        <div href="#" class="button">
                            <a href="#" class="btn">Atur Jadwal</a>
                            <img src="../asset/img/calendar.png" alt="">
                        </div>
                    </div>

                    <img class="gambar" src="../asset/img/undraw_teacher_re_sico.svg" alt="">
                </div>

                <div class="kotak">
                    <div class="box1">

                        <div class="kotak1">
                            <ol><i class="fi fi-br-calendar"></i></ol>
                            <div class="Jadwal-Dosen">
                                <h1><b>JADWAL DOSEN</b></h1>
                            </div>

                        </div>

                        <div class="jadwal">
                            <a href="#" class="text">Senin <br> 9</a>
                            <a href="#" class="text">Selasa <br> 10</a>
                            <a href="#" class="text">Rabu <br> 11</a>
                            <a href="#" class="text">Kamis <br> 12</a>
                            <a href="#" class="text">Jumat <br> 13</a>
                            <a href="#" class="text">Sabtu <br> 14</a>
                            <a href="#" class="text">Minggu <br> 15</a>
                        </div>
                    </div>

                    <div class="keren">
                        <div class="box2">

                            <img class="graduation" src="../asset/img/graduation-cap (1).png" alt="">



                            <div class="kotak2">
                                <div class="h1">
                                    <h1>02</h1>
                                </div>
                                <div class="h2">Bimbingan yang Disetujui</div>
                            </div>
                        </div>
                        <div class="box3">

                            <img class="graduation" src="../asset/img/graduation-cap (1).png" alt="">



                            <div class="kotak3">
                                <div class="h1">
                                    <h1>07</h1>
                                </div>
                                <div class="h2">Menunggu Persetujuan Dosen</div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>


            <div class="kolom2">
                <div class="teksjadwal1">
                    <div>
                        <h1>Jadwal Bimbingan</h1>
                    </div>
                </div>

                <div class="profil">
                    <div class="garis1">
                        <div><img src="../asset/img/avatar.png" alt=""></div>
                        <div class="info">
                            <h4>Muhammad Maulana Yusuf</h4>
                            <div>
                                <ol class="line1"><i class="fi fi-br-calendar"></i>12 September 2024 </ol>
                            </div>
                            <div>
                                <ol class="line2"><i class="fi fi-br-clock"></i>09:00 WIB </ol>
                            </div>
                        </div>
                    </div>

                    <div class="garis2">
                        <div class="ruangan">
                            <i class="fi fi-rs-map-marker-home"></i>
                            <p class="tempat">Ruangan</p>
                            <p class="lokasi">TA.12.4</p>
                        </div>

                        <div class="tanggal">
                            <i class="fi fi-rr-time-add"></i>
                            <p class="tempat">Dibuat</p>
                            <p class="lokasi2">10 September 2024</p>
                        </div>

                        <div class="kode">
                            <i class="fi fi-rr-memo"></i>
                            <p class="tempat">Kode Jadwal</p>
                            <p class="lokasi3">KJRD05AM</p>
                        </div>
                    </div>
                </div>

                <div class="profil">
                    <div class="garis1">
                        <div><img src="../asset/img/avatar.png" alt=""></div>
                        <div class="info">
                            <h4>Juan Immanuel Tinambu....</h4>
                            <div>
                                <ol class="line1"><i class="fi fi-br-calendar"></i>13 September 2024 </ol>
                            </div>
                            <div>
                                <ol class="line2"><i class="fi fi-br-clock"></i>10:00 WIB </ol>
                            </div>
                        </div>
                    </div>

                    <div class="garis2">
                        <div class="ruangan">
                            <i class="fi fi-rs-map-marker-home"></i>
                            <p class="tempat">Ruangan</p>
                            <p class="lokasionline">https://us05web.zoom.us...</p>
                        </div>

                        <div class="tanggal">
                            <i class="fi fi-rr-time-add"></i>
                            <p class="tempat">Dibuat</p>
                            <p class="lokasi2">12 September 2024</p>
                        </div>

                        <div class="kode">
                            <i class="fi fi-rr-memo"></i>
                            <p class="tempat">Kode Jadwal</p>
                            <p class="lokasi3">KJRD047M</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="container-kedua">
            <div class="kalender">
                <ol><i class="fi fi-br-calendar"></i></ol>
                <div class="Jadwal-Dosen">
                    <h1><b>Kalender</b></h1>
                </div>
            </div>

            <div class="js-calender">
                <div id='calendar'></div>
            </div>



        </div>

    </div>
@endsection