@extends('dashboard.mahasiswa.layout.master')

@section('title')
    Dashboard - Mahasiswa
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Dashboard-mahasiswa.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}" />
@endsection

@section('content')
    <div class="main-content">
    <div class="left">
        <div class="card-welcome">
            <div class="text">
                <h1>Halo!</h1>
                <div class="nama">Muhammad Maulana Yusuf</div>
                <div class="slogan">Bimbingan on time, skripsi on point!</div>
                <button href="#" class="ajukan"><h3>Ajukan Jadwal</h3><i class="fi fi-br-calendar"></i></button>
            </div>
            <img class="img-welcome-mahasiswa" src="{{asset('assets/dashboard/asset/img/student_ilustration.png')}}" alt="" />
        </div>

        <div class="progress-container">
            <div class="progress-header">
                <div class="progress-title">
                    <i class="fi fi-br-chart"></i>
                    <span>Progres TA</span>
                </div>
                <button class="edit-button">
                    <i class="fi fi-br-edit"></i>
                    Edit Progres
                </button>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 25%;">
                    <span class="progress-text">25%</span>
                </div>
            </div>
        </div>

        <div class="card-jadwal-dosen">
            <div class="weekly-schedule">
                <i class="fi fi-br-calendar"></i>
                <h3>Jadwal Dosen Pembimbing</h3>
            </div>
            <div class="profile">
                <img src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}">
                <div class="profile-details">
                    <h4>Alena Uperiati, S.T., M.Cs</h4>
                    <span>122279</span>
                    <div class="button-container">
                        <a href="#">Selengkapnya</a>
                    </div>
                </div>
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
        <div class="spacer"></div>
    </div>
    <div class="right">
        <h2>Jadwal Bimbingan</h2>

        <div class="card-pengajuan">
            <div class="detail1">
                <div><img src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}" alt="" /></div>
                <div class="value">
                    <h4 class="dosen">Alena Uperiati, S.T., M.Cs</h4>
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