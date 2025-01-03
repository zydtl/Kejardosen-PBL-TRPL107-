@extends('dashboard.dosen.layout.master')

@section('title')
    Detail Jadwal Bimbingan - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/asset/css/sidebar-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/asset/css/info.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <div class="title-and-button">
            <div class="title">
                <h1>Jadwal Bimbingan</h1>
            </div>
            <a href="{{ route('dosen.jadwal-bimbingan') }}" ><button class="btn btn-primary">Kembali</button></a>
            
        </div>
        <div class="card-header">
            <div class="img-header"> <img src="{{ asset('assets/dashboard/asset/img/avatar.png') }}" alt="Profile Picture"
                    class="profile-pic">
            </div>
            <div class="text-header">
                <b>Kode Jadwal: {{ $jadwal->kodeJadwal ?? '-' }}</b><br>
                <small><b>Disepakati Pada:
                    </b>{{ \Carbon\Carbon::parse($jadwal->created_at)->translatedFormat('l, d F Y') }} | <b>Jam :
                    </b>{{ \Carbon\Carbon::parse($jadwal->created_at)->format('H:i') }} WIB</small>
                </small>
            </div>
            <div class="col col-5" data-label="Status"><span
                    class="
                                @if ($jadwal->status == 'menunggu' || $jadwal->status == 'alternatif' || $jadwal->status == 'ditunda') status-waiting
                                @elseif($jadwal->status == 'dibatalkan' || $jadwal->status == 'ditolak') 
                                    status-cancel
                                @elseif($jadwal->status == 'diterima') 
                                    status-accept
                                @elseif($jadwal->status == 'berlangsung') 
                                    status-ongoing
                                @elseif($jadwal->status == 'disetujui') 
                                    status-accept                               
                                @elseif($jadwal->status == 'diselesaikan') 
                                    status-finish @endif
              ">{{ $jadwal->status }}</span>
            </div>
            <!-- <div class="col col-5" data-label="Status"><span class="status-waiting">Menunggu Jadwal</span></div> -->
        </div>
        <div class="detail-title">
            <h3>Detail Bimbingan</h3>
        </div>
        <div class="detail">
            <div class="ket">Nama Mahasiswa</div>
            <div class="isi">{{ $jadwal->pengajuan->mahasiswa->nama_mahasiswa ?? '-' }}</div>
        </div>
        <div class="detail">
          <div class="ket">NIM</div>
          <div class="isi">{{ $jadwal->pengajuan->mahasiswa->nim ?? '-' }}</div>
        </div>
        <div class="detail">
            <div class="ket">Kelas</div>
            <div class="isi">{{ $jadwal->pengajuan->mahasiswa->kelas ?? '-' }}</div>
        </div>
        <div class="detail">
          <div class="ket">Judul Tugas Akhir</div>
          <div class="isi">{{ $jadwal->pengajuan->mahasiswa->judul_tugas_akhir }}</div>
        
        </div>
        <div class="detail">
            <div class="ket">Tanggal Kesepakatan</div>
            <div class="isi">📅{{ \Carbon\Carbon::parse($jadwal->pengajuan->tanggal_pengajuan)->translatedFormat('l, d F Y') }}</div>
        </div>
        <div class="detail">
            <div class="ket">Waktu Kesepakatan</div>
            <div class="isi">⏰{{ \Carbon\Carbon::parse($jadwal->pengajuan->waktu_pengajuan)->format('H:i') }} WIB</div>
        </div>
        <div class="detail">
            <div class="ket">Tanggal Bimbingan</div>
            <div class="isi">
                📅{{ $jadwal->tanggal_bimbingan ? \Carbon\Carbon::parse($jadwal->tanggal_bimbingan)->translatedFormat('l, d F Y') : '⛔ Tidak ada' }}
            </div>
        </div>
        <div class="detail">
            <div class="ket">Waktu Bimbingan</div>
            <div class="isi">
                ⏰{{ $jadwal->waktu_bimbingan ? \Carbon\Carbon::parse($jadwal->waktu_bimbingan)->format('H:i') . ' WIB' : '⛔ Tidak ada' }}
            </div>
        </div>
        <div class="detail">
          <div class="ket">Jenis Bimbingan</div>
          <div class="isi">
            @if($jadwal->jenis_bimbingan === 'luring')
              👩🏻‍🏫
            @elseif($jadwal->jenis_bimbingan === 'daring')
              👨🏻‍💻
            @else
              ⛔ Tidak ada
            @endif
            {{ $jadwal->jenis_bimbingan ?? '⛔ Tidak ada' }}
          </div>
        </div>
        <div class="detail">
            <div class="ket">Ruangan</div>
            <div class="isi">📍{{ $jadwal->tempat ?? '⛔ Tidak ada' }}</div>
        </div>
        <div class="detail">
            <div class="ket">Judul Bimbingan</div>
            <div class="isi">{{ $jadwal->pengajuan->judul_bimbingan ?? '⛔ Tidak ada' }}</div>
        </div>
        <div class="detail">
            <div class="ket">Catatan Mahasiswa</div>
            <div class="isi">
              @if(!empty($jadwal->catatan_mahasiswa))
                📝 {{ $jadwal->catatan_mahasiswa }}
              @else
                ⛔ Tidak ada
              @endif
            </div>
        </div>
        <div class="detail">
            <div class="ket">Catatan Dosen</div>
            <div class="isi">
              @if(!empty($jadwal->catatan_dosen))
                📝 {{ $jadwal->catatan_dosen }}
              @else
                ⛔ Tidak ada
              @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/dashboard/asset/javascript/info.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/sidebar-navbar.js') }}"></script>
@endsection
