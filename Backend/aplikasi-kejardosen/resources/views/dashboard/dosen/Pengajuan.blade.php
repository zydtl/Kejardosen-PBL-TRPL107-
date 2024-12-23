@extends('dashboard.dosen.layout.master')
@section('css')
    <link rel="stylesheet" href=  "{{ asset('assets/dashboard/asset/css/sidebar-navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/asset/css/Pengajuan-dosen.css') }}" />
@endsection

@section('content')
  <!-- Main Content -->
  <div class="main-content utama">
    <div class="title">
      <h1>Pengajuan</h1>
    </div>
    <div class="search-container">
      <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian" />
    </div>
    <ul class="responsive-table">
      <li class="table-row baris-pengajuan">
        <div class="col col-1" data-label="img">
          <img src="{{asset('assets/dashboard/asset/img/avatar.png')}}" alt="" />
        </div>
        <div class="col col-2" data-label="Diajukan Pada">
          <h1>Muhammad Maulana Yusuf</h1>
          <p>4342401XXX - TRPL 7B Pagi</p>
        </div>
        <div class="col col-3" data-label="Tanggal Pengajuan">
          <h1>Pengajuan Jadwal:</h1>
          <p>12 September 2024 09:00 WIB</p>
        </div>
        <div class="col col-4" data-label="Status">
          <h1>Status</h1>
          <span class="status-waiting">Menunggu</span>
          <!-- <span class="status-resched">Alternatif</span> -->
        </div>
        <a><button type="button" id="openFormpengajuan" class="btn btnku btnkeren">
            Lihat Pengajuan
          </button></a>
      </li>
    </ul>
    <!-- Pagination -->
    <div class="pagination">
      <button type="button" class="prev-page">Prev</button>
      <span class="page-numbers">
        <span class="page-number active">1</span>
        <span class="page-number">2</span>
        <span class="page-number">3</span>
        <!-- Tambahkan lebih banyak page number sesuai dengan jumlah data -->
      </span>
      <button type="button" class="next-page">Next</button>
    </div>
  </div>
@endsection

@section('modalDosen')
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
            <p>4342401XXX - TRPL 7B Pagi</p>
        </div>
        <div class="detail-item" data-label="Diajukan Pada">
            <h4>Judul Tugas AKhir</h4>
            <p>
              Optimasi Algoritma Pencarian Terdistribusi untuk Big Data di
              Platform Cloud Computing
            </p>
        </div>
        <div class="detail-item" data-label="Tanggal Diajukan">
            <h4>Diajukan Pada:</h4>
            <p>11 September 2024 09:00 WIB</p>
        </div>
        <div class="detail-item" data-label="Waktu Pengajuan">
            <h4>Kode Pengajuan:</h4>
            <p>WKWHGG54</p>
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
                <div class="value">12 September 2024</div>
                <!-- Menampilkan nilai tanggal -->
              </div>
              <div class="detail">
                <label>Waktu Pengajuan</label>
                <div class="value">09:00 WIB</div>
                <!-- Menampilkan nilai waktu -->
              </div>
            </div>
            <div class="detail">
              <label>Judul Bimbingan</label>
              <div class="value">Contoh Judul Bimbingan</div>
              <!-- Menampilkan nilai judul bimbingan -->
            </div>

            <div class="detail">
              <label>Catatan Mahasiswa</label>
              <div class="value">
                Selamat Pagi Bu, izin ingin meminta bantuan ibu untuk
                mengecek isi tugas akhir saya di bab 1
              </div>
              <!-- Menampilkan catatan mahasiswa -->
            </div>
        </div>

        <div class="kosong">
            <div class="kosong-img">
              <img src="{{asset('assets/dashboard/asset/img/kosong.png')}}" title="Kosong" />
            </div>
            <div class="pesan">
              Kosong, silahkan pilih aksi terlebih dahulu
            </div>
        </div>

        <!-- Isian Dosen -->
        <form action="/" id="terima" class="hidden form-aksi">
            <div class="form-group">
              <label for="jenis-bimbingan">Pilih Jenis Bimbingan</label>
              <select id="jenis-bimbingan" class="form-control" required>
                <option value="default" selected disabled>Offline/Online</option>
                <option value="Offline">Offline</option>
                <option value="Online">Online</option>
              </select>
            </div>
            <div class="form-group">
              <label for="ruangan">Ruangan</label>
              <input type="text" id="ruangan" class="form-control" placeholder="cth: TA.12 / Zoom meeting" required />
            </div>
            <div class="form-group">
              <label for="catatan-terima">Catatan Dosen</label>
              <textarea id="catatan-terima" class="form-control" rows="4"
                placeholder="Tambahkan catatan untuk mahasiswa"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btnku btnkeren">Kirim</button>
            </div>
        </form>

        <form action="/" id="tolak" class="hidden form-aksi">
            <div class="form-group">
              <label for="catatan-tolak">Catatan Dosen</label>
              <textarea id="catatan-tolak" class="form-control" rows="4"
                placeholder="Tambahkan catatan untuk mahasiswa"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btnku btnkeren">Kirim</button>
            </div>
        </form>

        <form action="/" id="banding" class="hidden form-aksi">
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
              <textarea id="catatan-banding" class="form-control" rows="4"
                placeholder="Tambahkan catatan untuk mahasiswa"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btnku btnkeren">Kirim</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('assets/dashboard/asset/javascript/alert-pengajuan-dosen.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/ganti-form.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/pengajuanDosen.js') }}"></script>
    <script src="{{ asset('assets/dashboard/asset/javascript/sidebar-navbar.js') }}"></script>
@endsection
