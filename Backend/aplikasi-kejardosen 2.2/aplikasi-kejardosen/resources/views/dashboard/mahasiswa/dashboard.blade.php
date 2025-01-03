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
                <h1>Halo!👋</h1>
                <div class="nama">{{ $mahasiswa->nama_mahasiswa }}</div>
                <div class="slogan">🎯Bimbingan on time, Tugas Akhir on point!</div>
                <a href="{{ route('mahasiswa.pengajuan') }}">
                    <button href="" class="ajukan"><h3>Ajukan Jadwal</h3><i class="fi fi-br-calendar"></i></button>
                </a>
            </div>
            <img class="img-welcome-mahasiswa" src="{{asset('assets/dashboard/asset/img/student_ilustration.png')}}" alt="" />
        </div>

        <div class="progress-container">
            <div class="progress-header">
                <div class="progress-title">
                    <i class="fi fi-br-chart"></i>
                    <span>Progres TA</span>
                </div>
                @if (!empty($logbook->kodeLogbook))
                    <a href="{{ route('mahasiswa.form-logbook', ['kodeLogbook' => $logbook->kodeLogbook]) }}">
                        <button class="edit-button">
                            <i class="fi fi-br-edit"></i>
                            Edit Progres
                        </button>
                    </a>
                @else
                <a href="{{ route('mahasiswa.logbook') }}">
                    <button class="edit-button">
                        <i class="fi fi-br-edit"></i>
                        Edit Progres
                    </button>
                </a>
                @endif
            </div>
            <div class="progress-bar">
                {{-- <div class="progress-fill" style="width: {{ $logbook->first()->progres ?? 100 }}%;"> --}}
                    @if (!empty($logbook->progres))
                        <div class="progress-fill" style="width: {{ $logbook->progres > 0 ? $logbook->progres : 100 }}%;">
                    @else
                        <div class="progress-fill-kosong" style="width:100%">
                    @endif


                    @if (!empty($logbook->progres))
                        <span class="progress-text">{{ $logbook->progres }}%</span>
                    @else
                        <span class="progress-text">Logbook masih kosong</span>
                    @endif
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
                    <h4>{{ $mahasiswa->dosen->nama_dosen }}</h4>
                    <span>NIK : {{ $mahasiswa->nik_dosen }}</span>
                    <div class="button-container">
                        <a href="#">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="schedule">
                <div class="day">Sen</div>
                <div class="day">Sel</div>
                <div class="day">Rab</div>
                <div class="day">Kam</div>
                <div class="day">Jum</div>
                <div class="day disabled">Sab</div>
                <div class="day disabled">Min</div>
            </div>
        </div>
        <div class="spacer"></div>
    </div>
    <div class="right">
        <h2>Jadwal Bimbingan</h2>
        @if ($jadwal->isNotEmpty())
            @foreach ($jadwal as $bimbingan)
                <div class="card-pengajuan">
                    <a  href="{{ route('dosen.detail-jadwal-bimbingan', ['kodeJadwal' => $bimbingan->kodeJadwal]) }}">
                        <div class="detail1">
                            <div><img src="{{asset('assets/dashboard/asset/img/avatar-dosen.png')}}" alt="" /></div>
                            <div class="value">
                                <h4 class="dosen">{{ $bimbingan->pengajuan->mahasiswa->dosen->nama_dosen }}</h4>
                                <div class="tanggal"><i class="fi fi-br-calendar"></i>{{ \Carbon\Carbon::parse($bimbingan->tanggal_bimbingan)->format('d F Y') }}</div>
                                <div class="jam"><i class="fi fi-br-clock"></i>{{ \Carbon\Carbon::parse($bimbingan->waktu_bimbingan)->format('H:i') }} WIB</div>
                            </div>
                        </div>
                    
                        <div class="detail2">
                            <div class="item">
                                <i class="fi fi-br-map-marker-home"></i>
                                <p>Ruangan</p>
                                <span>{{ strlen($bimbingan->tempat) > 24 ? 'Lihat selengkapnya  ➡️' : ($bimbingan->tempat ?? 'Tidak ada') }}</span>
                            </div>
                            <div class="item">
                                <i class="fi fi-br-time-add"></i>
                                <p>Dibuat</p>
                                <span>{{ \Carbon\Carbon::parse($bimbingan->created_at)->format('d F Y') }}</span>
                            </div>
                            <div class="item">
                                <i class="fi fi-br-memo"></i>
                                <p>Kode Pengajuan</p>
                                <span>{{ $bimbingan->pengajuan->kodePengajuan ?? 'N/A' }}   </span>
                            </div>
                            <div class="item">
                                <i class="fi fi-br-memo"></i>
                                <p>Kode Jadwal</p>
                                <span>{{ $bimbingan->kodeJadwal ?? 'N/A' }} </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
             <img class="bimbingan-kosong" src="{{asset('assets/dashboard/asset/img/bimbingan_kosong.svg')}}" alt="">
        @endif


    </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection