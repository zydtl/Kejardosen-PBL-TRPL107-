@extends('dashboard.admin.layout.master')

@section('title')
    Daftar Mahasiswa
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/sidebar-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/asset/css/admin.css')}}">
@endsection

@section('content')
    <div class="main-content" >
                        
        <div class="title"><h1>Daftar Mahasiswa</h1></div>
        <div class="search-and-button">
            <div class="search-container">
                <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Pencarian">
            </div> 
            <button id="tambah-mhs" class="btn btn-primary">Tambah Mahasiswa</button>
        </div> 
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Mahasiswa</div>
                <div class="col col-2">Dosen</div>
                <div class="col col-3">Aksi</div>
            </li>
            @foreach($mahasiswa as $data)    
            <li class="table-row">
                <div class="col col-1" data-label="Mahasiswa">
                    <div class="nama">{{ $data->nama_mahasiswa }}</div>
                    <div class="nim_nik">{{ $data->nim }}</div> 
                </div>
                <div class="col col-2" data-label="Dosen">
                    <div class="nama">{{ $data->dosen->nama_dosen}}</div>
                    <div class="nim_nik">{{ $data->dosen->nik }}</div> 
                </div>
                <div class="col col-3" data-label="Aksi">
                    <button id="info-mhs" class="btn-info-mhs"
                        data-nim="{{ $data->nim }}" 
                        data-nama_mahasiswa="{{ $data->nama_mahasiswa }}" 
                        data-password="{{ $data->password }}" 
                        data-email="{{ $data->email }}" 
                        data-no_telp="{{ $data->no_telp }}" 
                        data-kelas="{{ $data->kelas }}" 
                        data-jenis_kelamin="{{ $data->jenis_kelamin }}" 
                        data-nik_dosen="{{ $data->dosen->nama_dosen }}" 
                        data-judul_tugas_akhir="{{ $data->judul_tugas_akhir }}" 
                    ><i class="fi fi-br-info info"></i></button>
                    <button id="edit-mhs" class="btn-edit-mhs"
                        data-nim="{{ $data->nim }}" 
                        data-nama_mahasiswa="{{ $data->nama_mahasiswa }}" 
                        data-password="{{ $data->password }}" 
                        data-email="{{ $data->email }}" 
                        data-no_telp="{{ $data->no_telp }}" 
                        data-kelas="{{ $data->kelas }}" 
                        data-jenis_kelamin="{{ $data->jenis_kelamin }}" 
                        data-nik_dosen="{{ $data->nik_dosen }}" 
                        data-judul_tugas_akhir="{{ $data->judul_tugas_akhir }}" 
                    ><i class="fi fi-br-edit edit"></i></button>
                    <button class="btn-hapus-mhs"><i class="fi fi-br-trash trash"></i></button>
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
    <!-- Modal Admin : Tambah Mahasiswa -->
    <div id="formModalAdmin">
        <div class="modal1">
            <h2>Tambah Data Mahasiswa</h2>
            <form id="formMhs">
                <div class="form-container">
                    <!-- Kolom 1: Identitas Mahasiswa -->
                    <div class="column">
                        <!-- Nama -->
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" id="nama" class="form-control" placeholder="Masukkan nama mahasiswa" required>
                        </div>
                        
                        <!-- NIM -->
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" id="nim" class="form-control" placeholder="Masukkan NIM mahasiswa" required>
                        </div>
                        
                        <!-- Kelas -->
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" id="kelas" class="form-control" placeholder="Masukkan kelas mahasiswa" required>
                        </div>
                        
                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <select id="jenisKelamin" class="form-control" required>
                                <option value="" disabled selected>Pilih jenis kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        
                        <!-- Nomor Telepon -->
                        <div class="form-group">
                            <label for="noTelp">Nomor Telepon</label>
                            <input type="tel" id="noTelp" class="form-control" placeholder="Masukkan nomor telepon mahasiswa" required>
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Masukkan email mahasiswa" required>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" id="password" class="form-control" placeholder="Masukkan password mahasiswa" required>
                        </div>
                    </div>

                    <!-- Kolom 2: Informasi Tugas Akhir -->
                    <div class="column">
                        <!-- Judul Tugas Akhir -->
                        <div class="form-group">
                            <label for="judulTA">Judul Tugas Akhir</label>
                            <input type="text" id="judulTA" class="form-control" placeholder="Masukkan judul tugas akhir" required>
                        </div>
                        
                        <!-- Dosen Pembimbing -->
                        <div class="form-group">
                            <label for="dosenPembimbing">Dosen Pembimbing</label>
                            <select id="dosenPembimbing" class="form-control" name="nik_dosen" required>
                                <option value="" disabled selected>Pilih dosen pembimbing</option>
                                @foreach($dosen as $item)
                                    <option value="{{ $item->nik }}">{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select>                                   
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="button-group">
                    <button type="button" id="closeFormAdmin" class="btn-batalkan btn-secondary">Batalkan</button>
                    <button type="submit" class="btn-simpan btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Admin : Tampilkan Informasi Mahasiswa -->
    <div id="infoModalAdmin">
        <div class="modal2">
            <h2>Informasi Mahasiswa</h2>
            <div class="form-container">
                <!-- Kolom 1: Identitas Mahasiswa -->
                <div class="column">
                    <!-- Nama -->
                    <label for="nama">Nama Mahasiswa</label>
                    <div id="nama" class="value">John Doe</div>
                    
                    <!-- NIM -->
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <div id="nim" class="value">4342401057</div>
                    </div>
                    
                    <!-- Kelas -->
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <div id="kelas" class="value">A</div>
                    </div>
                    
                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                        <div id="jenisKelamin" class="value">Laki-Laki</div>
                    </div>
                    
                    <!-- Nomor Telepon -->
                    <div class="form-group">
                        <label for="noTelp">Nomor Telepon</label>
                        <div id="noTelp" class="value">081234567890</div>
                    </div>
                    
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div id="email" class="value">john.doe@example.com</div>
                    </div>

                    <!-- password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div id="password" class="value">Password Mahasiswa gak boleh diintip ya...🤗🤗🤗</div>
                    </div>
                </div>

                <!-- Kolom 2: Informasi Tugas Akhir -->
                <div class="column">
                    <!-- Judul Tugas Akhir -->
                    <div class="form-group">
                        <label for="judulTA">Judul Tugas Akhir</label>
                        <div id="judulTA" class="value">Sistem Informasi Manajemen</div>
                    </div>
                    
                    <!-- Dosen Pembimbing -->
                    <div class="form-group">
                        <label for="dosenPembimbing">Dosen Pembimbing</label>
                        <div id="dosenPembimbing" class="value">Dr. Ahmad Maulana</div>
                    </div>
                </div>
                
            </div>
            <div class="button-group">
                <button id="closeInfoAdmin" class="btn-batalkan btn-secondary">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Admin : Edit Informasi Mahasiswa -->
    <div id="editModalAdmin">
        <div class="modal3">
            <h2>Edit Data Mahasiswa</h2>
            <form>
                <div class="form-container">
                    <!-- Kolom 1: Identitas Mahasiswa -->
                    <div class="column">
                        <!-- Nama -->
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" id="nama_edit" class="form-control" placeholder="Masukkan nama mahasiswa" >
                        </div>
                        
                        <!-- NIM -->
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" id="nim_edit" class="form-control" placeholder="Masukkan NIM mahasiswa" >
                        </div>
                        
                        <!-- Kelas -->
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" id="kelas_edit" class="form-control" placeholder="Masukkan kelas mahasiswa" >
                        </div>
                        
                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <select id="jenisKelamin_edit" class="form-control" >
                                <option value="" disabled selected>Pilih jenis kelamin</option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        
                        <!-- Nomor Telepon -->
                        <div class="form-group">
                            <label for="noTelp">Nomor Telepon</label>
                            <input type="tel" id="noTelp_edit" class="form-control" placeholder="Masukkan nomor telepon mahasiswa" >
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email_edit" class="form-control" placeholder="Masukkan email mahasiswa" >
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password_edit" class="form-control" placeholder="kosongkan input ini jikalau tidak ingin diubah 🤗🤗🤗" >
                        </div>
                    </div>

                    <!-- Kolom 2: Informasi Tugas Akhir -->
                    <div class="column">
                        <!-- Judul Tugas Akhir -->
                        <div class="form-group">
                            <label for="judulTA">Judul Tugas Akhir</label>
                            <input type="text" id="judulTA_edit" class="form-control" placeholder="Masukkan judul tugas akhir" >
                        </div>
                        
                        <!-- Dosen Pembimbing -->
                        <div class="form-group">
                            <label for="dosenPembimbing_edit">Dosen Pembimbing</label>
                            <select id="dosenPembimbing_edit" class="form-control"  required>
                                {{-- name="nik_dosen" --}}
                                <option value="" disabled selected>Pilih dosen pembimbing</option>
                                @foreach($dosen as $item)
                                    <option value="{{ $item->nik }}">{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="button-group">
                    <button type="button" id="closeEditAdmin" class="btn-batalkan btn-secondary">Batalkan</button>
                    <button type="submit" class="btn-simpan btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/dashboard/asset/javascript/admin.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/daftar-mahasiswa.js')}}"></script>
    <script src="{{asset('assets/dashboard/asset/javascript/sidebar-navbar.js')}}"></script>
@endsection