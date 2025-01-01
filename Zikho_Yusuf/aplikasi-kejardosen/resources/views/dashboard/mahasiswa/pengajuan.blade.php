@extends('dashboard.mahasiswa.layout.master')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/Pengajuan-mahasiswa.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <div class="title-and-button">
            <div class="title">
                <h1>Pengajuan</h1>
            </div>
            <button id="openForm" class="btn btn-primary">Buat Pengajuan</button>
        </div>
        <ul class="responsive-table" id="tabelPengajuan">
            <li class="table-header">
                <div class="col col-1">Kode Pengajuan</div>
                <div class="col col-2">Diajukan Pada</div>
                <div class="col col-3">Tanggal Pengajuan</div>
                <div class="col col-4">Waktu Pengajuan</div>
                <div class="col col-5">Status</div>
                <div class="col col-6">Aksi</div>
            </li>


            @if ($pengajuan->isEmpty())
            <li class="table-row">
                <div>
                    <button hidden  class="btn-edit" id="openFormedit" ><i class="fi fi-br-edit edit"></i></button>
                    <h1 class="">Data pengajuan kosong</h1>
                </div>
            </li>
            @else
            @foreach ($pengajuan as $item)
            <li class="table-row">
                
                <div class="col col-1" data-label="Kode Pengajuan">{{ $item->kodePengajuan }}</div>
                <div class="col col-2" data-label="Diajukan Pada">{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('d F Y - H:i') }} WIB</div>
                <div class="col col-3" data-label="Tanggal Pengajuan">{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->locale('id')->translatedFormat('d F Y') }}</div>
                <div class="col col-4" data-label="Waktu Pengajuan">{{ \Carbon\Carbon::parse($item->waktu_pengajuan)->timezone('Asia/Jakarta')->format('H:i') }} WIB</div>
                <div class="col col-5" data-label="Status">
                    <span class=" -mt-2
                            @if($item->status == 'menunggu' || $item->status == 'alternatif') 
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
                            @endif">{{ $item->status }}
                    </span>
                </div>
                <!-- <div class="col col-5" data-label="Status"><span class="status-resched">Reschedule</span></div> -->
                <div class="col col-6" data-label="Aksi">
                    <button class="btn-info" data-id="{{ $item->kodePengajuan }}"><i class="fi fi-br-info info"></i></button>
                    <button class="btn-tolak" @if($item->status == 'dibatalkan') style="background-color: #ddd" @endif  @if($item->status == 'dibatalkan') disabled @endif id="openFormdelete" data-id="{{ $item->kodePengajuan }}"><i class="fi fi-br-ban delete"></i></button>
                    <button class="btn-edit" id="openFormedit" 
                    data-kode="{{ $item->kodePengajuan }}" 
                    data-tanggal1="{{ $item->tanggal_pengajuan }}" 
                    data-waktu1="{{ $item->waktu_pengajuan }}"
                    data-tanggal2="{{ $item->tanggal_anjuranDosen }}" 
                    data-waktu2="{{ $item->waktu_anjuranDosen }}"
                    data-judul="{{ $item->judul_bimbingan }}" 
                    data-catatanmahasiswa="{{ $item->catatan_mahasiswa }}" 
                    data-catatandosen="{{ $item->catatan_dosen }}"><i class="fi fi-br-edit edit"></i></button>
                </div>
            </li>
            @endforeach
            @endif  

        </ul>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/Pengajuan-mahasiswa.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection

@section('modal')
    <div id="formModal">
        <div class="modal">
            <h2>Buat Pengajuan</h2>
            <form  id="formModalData" action="{{ route('pengajuan.store') }}" method="POST" id="formModalData">
                @csrf <!-- Token CSRF untuk keamanan -->
                <div class="form-group">
                    <label for="tanggal">Pilih Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal_pengajuan" class="form-control1" required>
                </div>
                <div class="form-group">
                    <label for="waktu">Pilih Waktu</label>
                    <input type="time" id="waktu" name="waktu_pengajuan" class="form-control1" required>
                </div>
                <div class="form-group">
                    <label for="judul">Judul Bimbingan</label>
                    <input type="text" id="judul" name="judul_bimbingan" class="form-controljudul" placeholder="Judul Bimbingan" required>
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea id="catatan" name="catatan_mahasiswa" class="form-controlcatatan" rows="4" placeholder="Tambahkan catatan..." required></textarea>
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
            <form action="{{ route('pengajuan.update', ['kodePengajuan' => '$kodaPengajuan']) }}" method="POST" id="formModalEditData">
                @csrf
                @method('PUT')
                <div id="double" class="form-group">
                    <div class="double1">
                        <label for="tanggal1">Pilih Tanggal</label>
                        <input type="date" id="tanggal1" class="form-control1">
                    </div>
                    <div class="double2">
                        <label for="tanggal2">Tanggal Anjuran Dosen</label>
                        <input type="date" id="tanggal2" class="form-control1oke" disabled>
                    </div>
                </div>
                <div id="double" class="form-group">
                    <div class="double1">
                        <label for="waktu1">Pilih Waktu</label>
                        <input type="time" id="waktu1" class="form-control1">
                    </div>
                    <div class="double2">
                        <label for="waktu2">Waktu Anjuran Dosen</label>
                        <input type="time" id="waktu2" class="form-control1oke" disabled>
                    </div>
                </div>
                
                <div class="teks"><i class="fi fi-rr-info"></i>
                    <div class="alert">Sesuaikan tanggal dan waktu bimbingan dengan jadwal anjuran dosen,<br> jika kamu setuju 🥸📝</div>
                </div>
                <div class="form-group">
                    <label for="catatandosen">Catatan Dosen</label>
                    <textarea id="catatandosen" class="form-control" rows="4"placeholder="Dosen mu belum memberi catatan 🤗🥰" disabled></textarea>
                </div>
                <div class="form-group">
                    <label for="judulbimbingan">Judul Bimbingan</label>
                    <input type="text" id="judulbimbingan" class="form-control" placeholder="Judul Bimbingan">
                </div>
                <div class="form-group">
                    <label for="catatanmahasiswa">Catatan Mahasiswa</label>
                    <textarea id="catatanmahasiswa" class="form-control" rows="4" placeholder="Tambahkan catatan..."></textarea>
                </div>
                <div class="button-group">
                    <button type="button" id="closeFormedit" class="btn btn-secondary">Batalkan</button>
                    <button type="submit" class="ubah btn btn-primary">Ubah Pengajuan</button>
                </div>
            </form>
        </div>
    </div>
@endsection




