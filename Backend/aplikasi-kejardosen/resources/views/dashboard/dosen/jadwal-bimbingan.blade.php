@extends('dashboard.dosen.layout.master')

@section('title')
    Jadwal Bimbingan - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Jadwal-bimbingan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <div class="title"><h1>Jadwal Bimbingan</h1></div>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Nama Mahasiswa</div>
                <div class="col col-2">NIM</div>
                {{-- <div class="col col-2">Disepakati Pada</div> --}}
                <div class="col col-3">Tanggal Bimbingan</div>
                <div class="col col-4">Waktu Bimbingan</div>
                <div class="col col-5">Status</div>
                <div class="col col-6">Aksi</div>
            </li>
            @forelse ($jadwal as $item)
            <li class="table-row">
                <div class="col col-1" data-label="Kode Jadwal">{{ $item->pengajuan->mahasiswa->nama_mahasiswa }}</div>
                <div class="col col-2" data-label="NIM">{{ $item->pengajuan->mahasiswa->nim }}</div>
                {{-- <div class="col col-2" data-label="NIM">{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y - H:i') }} WIB</div> --}}
                <div class="col col-3" data-label="Tanggal Bimbingan">{{ \Carbon\Carbon::parse($item->tanggal_bimbingan)->translatedFormat('l, d F Y') }}</div>
                <div class="col col-4" data-label="Waktu Bimbingan">{{ \Carbon\Carbon::parse($item->waktu_bimbingan)->timezone('Asia/Jakarta')->format('H:i') }} WIB</div>
                <div class="col col-5" data-label="Status"><span class="
                                @if ($item->status == 'menunggu' || $item->status == 'alternatif' || $item->status == 'ditunda')
                                    status-waiting
                                @elseif($item->status == 'dibatalkan' || $item->status == 'ditolak') 
                                    status-cancel
                                @elseif($item->status == 'diterima') 
                                    status-accept
                                @elseif($item->status == 'berlangsung') 
                                    status-ongoing
                                @elseif($item->status == 'disetujui') 
                                    status-accept                               
                                @elseif($item->status == 'diselesaikan') 
                                    status-finish 
                                @endif
                    ">{{ $item->status }}</span></div>
                <!-- <div class="col col-5" data-label="Status"><span class="status-cancel">Dibatalkan</span></div> -->
                <!-- <div class="col col-5" data-label="Status"><span class="status-delay">Ditunda</span></div> -->
                <!-- <div class="col col-5" data-label="Status"><span class="status-finish">Selesai</span></div> -->
                <div class="col col-6" data-label="Aksi">
                    <button class="btn-tolak" title="Batalkan" data-role="dosen" data-kode="{{ $item->kodeJadwal }}"><i class="fi fi-br-ban delete"></i></button>
                    <a href="{{ route('dosen.detail-jadwal-bimbingan', ['kodeJadwal' => $item->kodeJadwal]) }}">
                        <button class="btn-info" title="Info">
                            <i class="fi fi-br-info info"></i>
                        </button>
                    </a>
                    <button class="btn-tunda" title="Tunda" 

                        data-kode="{{ $item->kodeJadwal }}"
                        data-tanggal_bimbingan="{{ $item->tanggal_bimbingan }}"
                        data-waktu_bimbingan="{{ $item->waktu_bimbingan }}"


                        data-tanggal_pengajuan="{{ \Carbon\Carbon::parse($item->pengajuan->tanggal_pengajuan)->locale('id')->translatedFormat('d F Y') }}"
                        data-waktu_pengajuan="{{ \Carbon\Carbon::parse($item->pengajuan->waktu_pengajuan)->timezone('Asia/Jakarta')->format('H:i') }} WIB"
        
                        data-catatan_dosen="{{ $item->catatan_dosen }}"
                        {{-- data-waktu_anjurandosen="{{ $item->waktu_anjuranDosen }}"
                        data-tanggal_anjurandosen="{{ $item->tanggal_anjuranDosen}}" --}}
                    ><i class="fi fi-br-pending delay"></i></button> 
                </div>
            </li>
            @empty
                <li class="table-row gambar-kosong">
                    <div class="col" style="text-align: center; width: 100%;">
                        <img src="{{ asset('assets/dashboard/asset/img/tabel-kosong.svg') }}" alt="Kosong" />
                        <p>Belum ada jadwal bimbingan.</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>     
@endsection

@section('modal')
    <div id="formTundaDosen" class="modal-tunda hidden">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <button class="close-modal" title="Tutup">&times;</button>
            <h2>Penundaan Jadwal Bimbingan</h2>
            <div class="waktu-bimbingan-before">
                <div class="datetime">
                    <div class="detail-group">
                        <div class="detail">
                            <label>Tanggal Bimbingan</label>
                            <div class="value disabled-input" id="tanggal_pengajuan">12 September 2024</div>
                        </div>
                        <div class="detail">
                            <label>Waktu Bimbingan</label>
                            <div class="value disabled-input" id="waktu_pengajuan">09:00 WIB</div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="/" id="tunda" class="form-aksi">
                <div class="form-group">
                    <label for="tanggal-anjuran">Tanggal Penundaan</label>
                    <input type="date" id="tanggal-tunda" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="waktu-anjuran">Waktu Penundaan</label>
                    <input type="time" id="waktu-tunda" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="catatan-tunda">Catatan Dosen</label>
                    <textarea id="catatan-tunda" class="form-control" rows="4"
                        placeholder="Tambahkan catatan untuk mahasiswa" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-submit-tunda">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/Jadwal-bimbingan-dsn.js')}}"></script>
@endsection
