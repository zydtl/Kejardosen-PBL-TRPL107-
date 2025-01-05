@extends('dashboard.dosen.layout.master')

@section('title')
    Pengajuan - Dosen
@endsection

@section('css')
    <link rel="stylesheet" href=  "{{ asset('assets/dashboard/asset/css/sidebar-navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/asset/css/Pengajuan-dosen.css') }}" />
@endsection

@section('content')
    <div class="main-content utama">
        <div class="title">
            <h1>Pengajuan</h1>
        </div>
        <div class="search-container">
            <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
        </div>
        <ul class="responsive-table">
            @forelse ($pengajuan as $item)
                <li class="table-row baris-pengajuan">
                    <div class="col col-1" data-label="img">
                        <img src="{{ asset('assets/dashboard/asset/img/avatar.png') }}" alt="" />
                    </div>
                    <div class="col col-2" data-label="Diajukan Pada">
                        <h1>{{ $item->mahasiswa->nama_mahasiswa }}</h1>
                        <p><b>NIM:</b>{{ $item->mahasiswa->nim }} | <b>KELAS:</b>{{ $item->mahasiswa->kelas }}</p>
                    </div>
                    <div class="col col-3" data-label="Tanggal Pengajuan">
                        <h1>Pengajuan Jadwal:</h1>
                        <p>{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->locale('id')->translatedFormat('d F Y') }} <b> | </b>{{ \Carbon\Carbon::parse($item->waktu_pengajuan)->timezone('Asia/Jakarta')->format('H:i') }} <b>WIB</b></p>
                    </div>
                    <div class="col col-4" data-label="Waktu Pengajuan">
                        <h1>Status:</h1>
                        <span class="
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
                            @endif
                        ">
                            {{ $item->status }}
                        </span>
                    </div>
                    <a>
                        <button id="openFormpengajuan" class="btn btnku btnkeren btnmuncul"
                            data-nama_mahasiswa="{{ $item->mahasiswa->nama_mahasiswa }}"
                            data-nim="{{ $item->mahasiswa->nim }}"
                            data-kelas="{{ $item->mahasiswa->kelas }}"
                            data-judul_tugas_akhir="{{ $item->mahasiswa->judul_tugas_akhir }}"
                            data-kodepengajuan="{{ $item->kodePengajuan }}"
                            data-created_at="{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('d F Y  H:i') }} WIB"
                            data-updated_at="{{ \Carbon\Carbon::parse($item->updated_at)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('d F Y  H:i') }} WIB"
                            data-judul="{{ $item->judul_bimbingan }}"
                            data-catatan_mahasiswa="{{ $item->catatan_mahasiswa }}"
                            data-tanggal_pengajuan="{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->locale('id')->translatedFormat('d F Y') }}"
                            data-waktu_pengajuan="{{ \Carbon\Carbon::parse($item->waktu_pengajuan)->timezone('Asia/Jakarta')->format('H:i') }} WIB"
                            data-catatan_dosen="{{ $item->catatan_dosen }}"
                            data-waktu_anjurandosen="{{ $item->waktu_anjuranDosen }}"
                            data-tanggal_anjurandosen="{{ $item->tanggal_anjuranDosen}}"
                        >
                            Lihat Pengajuan
                        </button>
                    </a>
                </li>
            @empty
                <div class="gambar-kosong">
                    <img src="{{asset('assets/dashboard/asset/img/tabel-kosong.svg')}}" alt="Kosong" />
                    <p>Belum ada pengajuan.</p>
                </div>
            @endforelse
        </ul>
        
        <!-- Pagination -->
        <div class="pagination">
            <button class="prev-page">Prev</button>
            <span class="page-numbers">
                <span class="page-number active">1</span>
                <span class="page-number">2</span>
                <span class="page-number">3</span>
                <!-- Tambahkan lebih banyak page number sesuai dengan jumlah data -->
            </span>
            <button class="next-page">Next</button>
        </div>
    </div>
@endsection

@section('modal')
    <!-- Form melihat pengajuan mahasiswa -->
    <div id="formModaledit" class="hidden modal">
        <div class="modal-content modalpengajuan">
            <div class="cancel">
                <button type="button" class="btn close-modal">X</button>
            </div>
            <div class="pengajuan-split">
                <!-- Informasi Pengajuan -->
                <div id="double5" class="form-group kepanjangan1">
                    <div class="profil">
                        <img class="foto-profil" src="{{asset('assets/dashboard/asset/img/avatar.png')}}" alt="" />
                    </div>
                    <div class="detail-item" data-label="Diajukan Pada">
                        <h4 id="namaMahasiswa">Muhammad Maulana Yusuf</h4>
                        <p><span id="nim">4342401XXX</span> <span><b> | </b></span><span id="kelas">TRPL 7B Pagi</span></p>
                    </div>
                    <div class="detail-item" data-label="Diajukan Pada">
                        <h4>Judul Tugas AKhir</h4>
                        <p id="judul_tugas_akhir">Optimasi Algoritma Pencarian Terdistribusi untuk Big Data di Platform Cloud Computing</p>
                    </div>
                    <div class="detail-item" data-label="Tanggal Diajukan">
                        <h4>Diajukan Pada:</h4>
                        <p id="created_at">11 September 2024 09:00 WIB</p>
                    </div>
                    <div class="detail-item" data-label="Tanggal Diajukan">
                        <h4>Diajukan Ulang Pada:</h4>
                        <p id="updated_at">11 September 2024 09:00 WIB</p>
                    </div>  
                    <div class="detail-item" data-label="Waktu Pengajuan">
                        <h4>Kode Pengajuan:</h4>
                        <p id="kodePengajuan">WKWHGG54</p>
                    </div>
                    <div class="respon">
                        <label for="aksi"><strong>Aksi</strong></label>
                        <select id="aksi" name="aksi">
                            <option value="default" disabled selected>Pilih Opsi</option>
                            <option value="tolak">Tolak</option>
                            <option value="terima">Terima</option>
                            <option value="banding">Banding</option>
                        </select>
                    </div>
                </div>

                <!-- Form Pengajuan Mahasiswa-->
                <div class="bagian1">
                    <div class="input-mahasiswa">
                        <div class="datetime">
                            <div class="detail">
                                <label>Tanggal Pengajuan</label>
                                <div class="value" id="tanggal_pengajuan">12 September 2024</div>
                                <!-- Menampilkan nilai tanggal -->
                            </div>
                            <div class="detail">
                                <label>Waktu Pengajuan</label>
                                <div class="value" id="waktu_pengajuan">09:00 WIB</div>
                                <!-- Menampilkan nilai waktu -->
                            </div>
                        </div>
                        <div class="detail">
                            <label>Judul Bimbingan</label>
                            <div class="value" id="judul_bimbingan">Contoh Judul Bimbingan</div>
                            <!-- Menampilkan nilai judul bimbingan -->
                        </div>

                        <div class="detail">
                            <label>Catatan Mahasiswa</label>
                            <div class="value" id="catatan_mahasiswa">
                                Selamat Pagi Bu, izin ingin meminta bantuan ibu untuk
                                mengecek isi tugas akhir saya di bab 1
                            </div>
                            <!-- Menampilkan catatan mahasiswa -->
                        </div>
                    </div>

                    <div class="kosong">
                        <div class="kosong-img">
                            <img src="{{ asset('assets/dashboard/asset/img/kosong.png') }}" title="Kosong" />
                        </div>
                        <div class="pesan">
                            Kosong, silahkan pilih aksi terlebih dahulu
                        </div>
                    </div>

                    <!-- Isian Dosen -->
                    <form action="{{ route('dosen.pengajuan.terima', ['kodePengajuan' => '$kodaPengajuan']) }}" id="terima" class="hidden form-aksi">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="jenis-bimbingan">Pilih Jenis Bimbingan</label>
                            <select id="jenis-bimbingan" class="form-control" required>
                                <option value="default" selected disabled>Offline/Online</option>
                                <option value="luring">luring</option>
                                <option value="daring">daring</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ruangan">Ruangan</label>
                            <input type="text" id="ruangan" class="form-control"
                                placeholder="cth: TA.12 / Zoom meeting" required />
                        </div>
                        <div class="form-group">
                            <label for="catatan-terima">Catatan Dosen</label>
                            <textarea id="catatan-terima" class="form-control" rows="4" placeholder="Tambahkan catatan untuk mahasiswa"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btnku btnkeren btn-terima">Kirim</button>
                        </div>
                    </form> 

                    <form action="{{ route('dosen.pengajuan.tolak', ['kodePengajuan' => '$kodaPengajuan']) }}" id="tolak" class="hidden form-aksi">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="catatan-tolak">Catatan Dosen</label>
                            <textarea id="catatan-tolak" class="form-control" rows="4" placeholder="Tambahkan catatan untuk mahasiswa"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btnku btnkeren btn-tolak">Kirim</button>
                        </div>
                    </form>

                    <form action="{{ route('dosen.pengajuan.banding', ['kodePengajuan' => '$kodaPengajuan']) }}" id="banding" class="hidden form-aksi">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="tanggal-anjuran">Tanggal Anjuran Dosen</label>
                            <input type="date" id="tanggal-anjuran" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="waktu-anjuran">Waktu Anjuran Dosen</label>
                            <input type="time" id="waktu-anjuran" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="catatan-banding">Catatan Dosen</label>
                            <textarea id="catatan-banding" class="form-control" rows="4" placeholder="Tambahkan catatan untuk mahasiswa"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btnku btnkeren btn-banding">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/dashboard/asset/javascript/Alert_Pengajuan-Dosen.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/Ganti-form.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/pengajuanDosen.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/sidebar-navbar.js') }}"></script>
@endsection
