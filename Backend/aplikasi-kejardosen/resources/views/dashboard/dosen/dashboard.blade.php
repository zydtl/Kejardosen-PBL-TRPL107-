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
                    <a href="{{ route('dosen.waktu-dosen') }}">
                        <button  class="atur"><i class="fi fi-br-calendar"></i> <h3>Atur waktu Anda</h3></button>
                    </a>
                </div>
                <img class="img-welcome-dosen" src="{{asset('assets/dashboard/asset/img/teacher_ilustration.png')}}" alt="" />
            </div>

            <div class="card-jadwal-dosen">
                <div class="weekly-schedule">
                    <i class="fi fi-br-calendar"></i>
                    <h3>Jadwal Dosen Pembimbing</h3>
                </div>
                <div class="schedule">
                    <div class="day {{ $waktuDosen->kondisi_senin == 0 ? 'disabled' : '' }}">Sen</div>
                    <div class="day {{ $waktuDosen->kondisi_selasa == 0 ? 'disabled' : '' }}">Sel</div>
                    <div class="day {{ $waktuDosen->kondisi_rabu == 0 ? 'disabled' : '' }}">Rab</div>
                    <div class="day {{ $waktuDosen->kondisi_kamis == 0 ? 'disabled' : '' }}">Kam</div>
                    <div class="day {{ $waktuDosen->kondisi_jumat == 0 ? 'disabled' : '' }}">Jum</div>
                    <div class="day {{ $waktuDosen->kondisi_sabtu == 0 ? 'disabled' : '' }}">Sab</div>
                    <div class="day {{ $waktuDosen->kondisi_minggu == 0 ? 'disabled' : '' }}">Min</div>
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

            <h2 class="notif">🔔 Pemberitahuan</h2>

            
            @forelse($notifikasi as $notif)
            <div class="notif-item">
                <div class="notif-icon 
                    @if($notif['type'] === 'Pengajuan Jadwal') blue 
                    @elseif($notif['type'] === 'Bimbingan Dibatalkan') red
                    @elseif($notif['type'] === 'Logbook') blue
                    @else gray @endif">
                    <i class="
                        @if($notif['type'] === 'Pengajuan Jadwal') fi fi-br-graduation-cap
                        @elseif($notif['type'] === 'Bimbingan Dibatalkan') fi fi-br-calendar
                        @elseif($notif['type'] === 'Logbook') fi fi-br-memo
                        @else fi fi-br-bell-slash @endif
                    "></i>
                </div>
                <div class="notif-text">
                    <h4>{{ $notif['type'] }}</h4>
                    <p>{{ $notif['mahasiswa'] }} {{ $notif['description'] }}</p>
                    <small class="date-text-notif" >{{ \Carbon\Carbon::parse($notif['updated_at'])->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y - H:i') }} WIB</small>
                </div>
            </div>
            @empty
                <div class="notif-item">
                    <div class="notif-icon gray">
                        <i class="fi fi-br-bell-slash"></i>
                    </div>
                    <div class="notif-text">
                        <h4>Tidak Ada Notifikasi</h4>
                        <p>Anda tidak memiliki notifikasi dalam 7 hari terakhir.</p>
                    </div>
                </div>
            @endforelse
        

            <h2>📅 Jadwal Bimbingan</h2>

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
                                        {{ \Carbon\Carbon::parse($bimbingan->tanggal_bimbingan)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y') }}
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
                                        {{ \Carbon\Carbon::parse($bimbingan->created_at)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y') }}
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
                <img class="bimbingan-kosong" src="{{asset('assets/dashboard/asset/img/bimbingan_kosong_dsn.svg')}}" alt="">
            @endif

            {{-- <div class="notif-item">
                <div class="notif-icon">
                    <i class="fi fi-br-graduation-cap"></i>
                </div>
                <div class="notif-text">
                    <h4>Pengajuan Jadwal</h4>
                    <p>Mahasiswa Anda mengajukan jadwal bimbingan. Silakan tinjau dan konfirmasi.</p>
                </div>
            </div>                

            <div class="notif-item">
                <div class="notif-icon yellow">
                    <i class="fi fi-br-graduation-cap"></i>
                </div>
                <div class="notif-text">
                    <h4>Jadwal Alternatif</h4>
                    <p>Mahasiswa Anda menerima perubahan jadwal. Silakan tinjau dan konfirmasi.</p>
                </div>
            </div>                
                
            <div class="notif-item">
                <div class="notif-icon red">
                    <i class="fi fi-br-calendar"></i>
                </div>
                <div class="notif-text">
                    <h4>Bimbingan Dibatalkan</h4>
                    <p>Mahasiswa membatalkan jadwal bimbingan. Periksa untuk detail lebih lanjut.</p>
                </div>
            </div>                
            
            <div class="notif-item">
                <div class="notif-icon yellow">
                    <i class="fi fi-br-calendar"></i>
                </div>
                <div class="notif-text">
                    <h4>Jadwal Diperbarui</h4>
                    <p>Mahasiswa Anda menerima penundaan waktu bimbingan. Silakan periksa jadwal baru.</p>
                </div>
            </div>
                        
            <div class="notif-item">
                <div class="notif-icon">
                    <i class="fi fi-br-memo"></i>
                </div>
                <div class="notif-text">
                    <h4>Logbook Mahasiswa</h4>
                    <p>Mahasiswa baru saja mengisi logbook. Segera periksa.</p>
                </div>
            </div>   --}}
            <div class="spacer"></div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection