@extends('dashboard.admin.layout.master')

@section('title')
    Daftar Dosen
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/admin.css')}}">
@endsection

@section('content')
    <div class="main-content" >
                        
        <div class="title"><h1>Daftar Dosen</h1></div>
        <div class="search-and-button">
            <div class="search-container">
                <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
            </div> 
            <button id="tambah-dsn" class="btn btn-primary">Tambah Dosen</button>
        </div>
        
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Nama Dosen</div>
                <div class="col col-2">NIK/NIDN</div>
                <div class="col col-3">Aksi</div>
            </li>
            @foreach($dosen as $data)    
            <li class="table-row">
                <div class="col col-1" data-label="Nama Dosen">
                    {{ $data->nama_dosen }}
                </div>
                <div class="col col-2" data-label="NIK/NIDN">
                    {{ $data->nik }}
                </div>
                <div class="col col-3" data-label="Aksi">
                    <button id="info-dsn" class="btn-info-dsn"><i class="fi fi-br-info info"></i></button>
                    <button id="edit-dsn" class="btn-edit-dsn" 
                        data-nik="{{ $data->nik }}" 
                        data-nama="{{ $data->nama_dosen }}" 
                        data-password="{{ $data->password }}" 
                        data-jenis_kelamin="{{ $data->jenis_kelamin }}" 
                        data-no_telp="{{ $data->no_telp }}" 
                        data-email="{{ $data->email }}"
                    ><i class="fi fi-br-edit edit">
                    </i></button>
                    <button class="btn-hapus-dsn"><i class="fi fi-br-trash trash"></i></button>
                </div>
            </li>
            @endforeach
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

@section('modalAdmin')
    <!-- Modal Admin : Tambah Dosen -->
    <div id="formModalAdminDosen" class="hide">
        <div class="modal1">
            <h2>Tambah Data Dosen</h2>
            <form id="formDosen" action="{{ route('daftar-dosen.store') }}" method="POST">
                @csrf
                <!-- Container Utama -->
                <div class="form-container-dosen">
                    <!-- Form Input -->
                    <div class="form-group">
                        <label for="nama">Nama Dosen</label>
                        <input type="text" id="nama" class="form-control" placeholder="Masukkan nama dosen" required>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK/NIDN</label>
                        <input type="text" id="nik" class="form-control" placeholder="Masukkan NIK/NIDN dosen" required>
                    </div>

                    <div class="form-group">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                        <select id="jenisKelamin" class="form-control" required>
                            <option value="" disabled selected>Pilih jenis kelamin</option>
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="noTelp">Nomor Telepon</label>
                        <input type="text" id="noTelp" class="form-control" placeholder="Masukkan nomor telepon dosen" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Masukkan email dosen" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" id="password" class="form-control" placeholder="Masukkan password dosen" required>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="button-group">
                    <button type="button" id="closeFormDosen" class="btn-batalkan btn-secondary">Batalkan</button>
                    <button type="submit" id="tambahdsn" class="btn-simpan btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal Admin : Info Dosen -->
    <div id="infoModalAdminDosen" class="hide">
        <div class="modal2">
            <h2>Informasi Dosen</h2>
            <div class="form-container">
                <!-- Kolom Informasi Dosen -->
                <div class="column">
                    <!-- Nama Dosen -->
                    <div class="form-group">
                        <label for="namaDosen">Nama Dosen</label>
                        <div id="namaDosen" class="value">Dr. Ahmad Maulana</div>
                    </div>
                    
                    <!-- NIK/NIDN -->
                    <div class="form-group">
                        <label for="nik">NIK/NIDN</label>
                        <div id="nik" class="value">1234567890</div>
                    </div>
                    
                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                        <div id="jenisKelamin" class="value">Laki-Laki</div>
                    </div>
                </div>    
                <div class="column">
                    <!-- Nomor Telepon -->
                    <div class="form-group">
                        <label for="noTelp">Nomor Telepon</label>
                        <div id="noTelp" class="value">081234567890</div>
                    </div>
                    
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div id="email" class="value">ahmad.maulana@example.com</div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div id="password" class="value">dosen123</div>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="button-group">
                <button id="closeInfoDosen" class="btn-batalkan btn-secondary">Tutup</button>
            </div>
        </div>
    </div>


    <!-- Modal Admin : edit Dosen -->
    <div id="editModalAdminDosen" class="hide">
        <div class="modal2">
            <h2>Edit Informasi Dosen</h2>
            <form id="formEditDosen" action="{{ route('daftar-dosen.update', ['nik' => ':nik']) }}" method="POST">
                @csrf
                @method('PUT') <!-- Untuk metode PUT -->
    
                <!-- Input ID Dosen (Hidden) -->
                <input type="hidden" name="id" id="dosenId" value="">
    
                <!-- Nama Dosen -->
                <div class="form-group">
                    <label for="nama_edit">Nama Dosen</label>
                    <input type="text" name="nama_dosen" id="nama_edit" class="form-control" required>
                </div>
    
                <!-- NIK/NIDN -->
                <div class="form-group">
                    <label for="nik">NIK/NIDN</label>
                    <input type="text" name="nik_edit" id="nik_edit" class="form-control" required>
                </div>
    
                <!-- Jenis Kelamin -->
                <div class="form-group">
                    <label for="jenisKelamin_edit">Jenis Kelamin</label>
                    <select id="jenisKelamin_edit" class="form-control" required>
                        <option value="" disabled selected>Pilih jenis kelamin</option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
    
                <!-- Nomor Telepon -->
                <div class="form-group">
                    <label for="no_telp_edit">Nomor Telepon</label>
                    <input type="text" name="no_telp" id="no_telp_edit" class="form-control" required>
                </div>
    
                <!-- Email -->
                <div class="form-group">
                    <label for="email_edit">Email</label>
                    <input type="email" name="email" id="email_edit" class="form-control" required>
                </div>
    
                <!-- Password -->
                <div class="form-group">
                    <label for="password_edit">Password (Opsional)</label>
                    <input type="text" placeholder="kosongkan input ini jikalau tidak ingin diubah 🤗🤗🤗" name="password" id="password_edit" class="form-control">
                </div>
    
                <!-- Tombol Aksi -->
                <div class="button-group">
                    <button type="submit" class="btn-save btn-primary">Simpan</button>
                    <button type="button" id="closeEditDosen" class="btn-batalkan btn-secondary">Batal</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/admin.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/daftar-dosen.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection