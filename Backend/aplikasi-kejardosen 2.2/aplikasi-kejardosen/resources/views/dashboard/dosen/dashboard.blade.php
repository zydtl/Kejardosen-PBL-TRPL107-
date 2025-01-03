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
                    <h1>Halo!👋 </h1>
                    <div class="nama">{{ $dosen->nama_dosen }}</div>
                    <div class="slogan">🎯Bimbingan on time, Tugas Akhir on point!</div>
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
                    <div class="day">Sen</div>
                    <div class="day">Sel</div>
                    <div class="day">Rab</div>
                    <div class="day">Kam</div>
                    <div class="day">Jum</div>
                    <div class="day disabled">Sab</div>
                    <div class="day disabled">Min</div>
                </div>
            </div>

            <div class="info-cards">
                <div class="card-info">
                    <div class="card-info-icon">
                        <i class="fi fi-br-time-check"></i>
                    </div>
                    <div class="card-info-details">
                        @if ($bimbinganBerlangsung > 0)
                            <h4>0{{ $bimbinganBerlangsung }}</h4>
                        @else
                            <h4>00</h4>
                        @endif
                        <span>Bimbingan sedang berlangsung</span>
                    </div>
                </div>
                <div class="card-info">
                    <div class="card-info-icon">
                        <i class="fi fi-br-duration-alt"></i>
                    </div>
                    <div class="card-info-details">
                        @if ($pengajuanMenunggu > 0)
                            <h4>0{{ $pengajuanMenunggu }}</h4>
                        @else
                            <h4>00</h4>
                        @endif
                        <span>Menunggu Persetujuan Dosen</span>
                    </div>
                </div>
            </div>

            <div class="spacer"></div>
        </div>
        <div class="right">
            <h2>Jadwal Bimbingan</h2>

            @if ($jadwal->isNotEmpty())
                @foreach ($jadwal as $bimbingan)
                    <div class="card-pengajuan">
                        <a href="{{ route('dosen.detail-jadwal-bimbingan', ['kodeJadwal' => $bimbingan->kodeJadwal]) }}">
                            <div class="detail1">
                                <div><img src="{{ asset('assets/dashboard/asset/img/avatar.png') }}" alt="" /></div>
                                <div class="value">
                                    <h4 class="dosen">{{ $bimbingan->pengajuan->mahasiswa->nama_mahasiswa ?? 'Nama Mahasiswa' }}</h4>
                                    <div class="tanggal">
                                        <i class="fi fi-br-calendar"></i> 
                                        {{ \Carbon\Carbon::parse($bimbingan->tanggal_bimbingan)->format('d F Y') }}
                                    </div>
                                    <div class="jam">
                                        <i class="fi fi-br-clock"></i> 
                                        {{ \Carbon\Carbon::parse($bimbingan->waktu_bimbingan)->format('H:i') }} WIB
                                    </div>
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
                                    <span>
                                        {{ \Carbon\Carbon::parse($bimbingan->created_at)->format('d F Y') }}
                                    </span>
                                </div>
                                <div class="item">
                                    <i class="fi fi-br-memo"></i>
                                    <p>Kode Pengajuan</p>
                                    <span>{{ $bimbingan->pengajuan->kodePengajuan ?? 'N/A' }}</span>
                                </div>
                                <div class="item">
                                    <i class="fi fi-br-memo"></i>
                                    <p>Kode Jadwal</p>
                                    <span>{{ $bimbingan->kodeJadwal ?? 'N/A' }}</span>
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