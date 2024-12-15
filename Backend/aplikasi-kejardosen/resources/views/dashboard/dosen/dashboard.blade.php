@extends('dashboard.dosen.layout.master')

@section('title')
    Dashboard - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Dashboard-dosen.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}" />
@endsection

@section('content')
    <div class="main-content">
        <div class="left">
            <div class="card-welcome">
                <div class="text">
                    <h1>Halo!</h1>
                    <div class="nama">Alena Uperiati, S.T., M.Cs</div>
                    <div class="slogan">Bimbingan on time, skripsi on point!</div>
                    <button href="#" class="atur"><h3>Atur Jadwal</h3><i class="fi fi-br-calendar"></i></button>
                </div>
                <img class="img-welcome-dosen" src="{{asset('assets/dashboard/asset/img/teacher_ilustration.png')}}" alt="" />
            </div>

            <div class="card-jadwal-dosen">
                <div class="weekly-schedule">
                    <i class="fi fi-br-calendar"></i>
                    <h3>Jadwal Dosen Pembimbing</h3>
                </div>
                <div class="schedule">
                    <div class="day">9</div>
                    <div class="day">10</div>
                    <div class="day disabled">11</div>
                    <div class="day">12</div>
                    <div class="day">13</div>
                    <div class="day disabled">14</div>
                    <div class="day disabled">15</div>
                </div>
            </div>

            <div class="info-cards">
                <div class="card-info">
                    <div class="card-info-icon">
                        <i class="fi fi-br-time-check"></i>
                    </div>
                    <div class="card-info-details">
                        <h4>02</h4>
                        <span>Bimbingan sedang berlangsung</span>
                    </div>
                </div>
                <div class="card-info">
                    <div class="card-info-icon">
                        <i class="fi fi-br-duration-alt"></i>
                    </div>
                    <div class="card-info-details">
                        <h4>07</h4>
                        <span>Menunggu Persetujuan Dosen</span>
                    </div>
                </div>
            </div>

            <div class="spacer"></div>
        </div>
        <div class="right">
            <h2>Jadwal Bimbingan</h2>

            <div class="card-pengajuan">
                <div class="detail1">
                    <div><img src="{{asset('assets/dashboard/asset/img/avatar.png')}}" alt="" /></div>
                    <div class="value">
                        <h4 class="dosen">Muhammad Maulana Yusuf</h4>
                        <div class="tanggal"><i class="fi fi-br-calendar"></i> 12 September 2024</div>
                        <div class="jam"><i class="fi fi-br-clock"></i> 09:00 WIB</div>
                    </div>
                </div>
            
                <div class="detail2">
                    <div class="item">
                        <i class="fi fi-br-map-marker-home"></i>
                        <p>Ruangan</p>
                        <span>TA.12</span>
                    </div>
                    <div class="item">
                        <i class="fi fi-br-time-add"></i>
                        <p>Dibuat</p>
                        <span>10 September 2024</span>
                    </div>
                    <div class="item">
                        <i class="fi fi-br-memo"></i>
                        <p>Kode Pengajuan</p>
                        <span>KJR98KQAM</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection