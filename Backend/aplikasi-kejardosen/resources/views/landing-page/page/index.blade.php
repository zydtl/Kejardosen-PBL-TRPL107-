<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('assets/dashboard/asset/img/kejardosen-logo-circle.png')}}">
  <title>Aplikasi Penjadwalan Bimbingan Tugas Akhir | Kejardosen</title>

  <!-- CSS Bootstrap -->
  <head>
    <!-- Link ke CSS Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tambahkan link Bootstrap CSS jika belum ada -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <style>
    .plus-jakarta-sans-font {
      font-family: "Plus Jakarta Sans", sans-serif;
      font-optical-sizing: auto;
      font-weight: 500;
      font-style: normal;
    }
    .custom-nav-link {
      color: black; /* Warna teks awal */
      text-decoration: none; /* Menghilangkan garis bawah */
      padding: 10px 20px;
      transition: background-color 0.3s; /* Animasi smooth */
    }

    .custom-nav-link:hover {
      background-color: #D5F5F8; /* Warna background saat hover */
      color: black; /* Warna teks saat hover */
      border-radius: 5px; /* Menambah efek rounded saat hover */
    }

    html {
      scroll-behavior: smooth;
    }

    /* Adjust the padding and margins for better alignment */
    .navbar-nav {
      margin-left: auto;
      margin-right: auto;
    }

    @media (max-width: 991px) {
      .navbar-nav {
        text-align: center;
        width: 100%;
      }

      .navbar-toggler {
        position: relative;
        left: 0;
      }
    }
  </style>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>

<body>

  <div class="container-fluid" style="background-color:#D5F5F8; height:100vh;">
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('assets/home/asset/logokjrdns.png') }}" width="180px" height="70px" alt="Logo" style="position: relative; left: 100px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
            <li class="nav-item">
              <a class="custom-nav-link active" href="#Berandasection">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="custom-nav-link ms-3" href="#Tentangsection">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="custom-nav-link ms-3" href="#Fitursection">Fitur</a>
            </li>
            <li class="nav-item">
              <a class="custom-nav-link ms-3" href="#FAQsection">FAQ</a>
            </li>
          </ul>
          <form class="d-flex">
            <a class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#loginModal" style="background-color: #1f819b; color: white; margin-right: 30px;">Masuk</a>
          </form>
        </div>
      </div>
    </nav>

    <!-- INI HALAMAN BERANDA -->
    <div class="container-fluid" id="Berandasection" style="height:100vh;">
      <div class="row align-items-center" style="position: relative; top: 100px;">
        <div class="col-md-6 p-5" style="position: relative; left: 50px;">
          <p style="font-size: 30px; font-weight: 490;">Selamat Datang!</p>
          <h1 style="font-weight: 700; font-size: 90px; color: #1f819b; position: relative; top: -20px;">
            <span style="color: #225668;">K</span><span style="color: #22a0b8;">ejar</span>dosen
          </h1>
          <p style="width: 1000px; font-size: 35px;">Penjadwalan Bimbingan Tugas Akhir</p>
          <a href="#Tentangsection" class="btn mt-3" style="background-color: #1f819b; color: white; width: 135px;">Lihat lebih jauh</a>
        </div>
        <div class="col-md-6">
          <img src="{{ asset('assets/home/asset/Kalender baru.svg') }}" style="height:521px;" alt="Calendar" class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Pilih Akses Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-4">Silakan pilih masuk sebagai:</p>
                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <a class="btn btn-lg btn-outline-primary w-100" href="{{ route('login.dosen') }}" onclick="masukSebagai('dosen')">
                            <i class="bi bi-person-badge fs-4 me-2"></i> Dosen
                        </a>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <a class="btn btn-lg btn-outline-success w-100" href="{{ route('login.mahasiswa') }}" onclick="masukSebagai('mahasiswa')">
                            <i class="bi bi-person fs-4 me-2"></i> Mahasiswa
                        </a>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <a class="btn btn-lg btn-outline-warning w-100" href="{{ route('login.admin') }}" onclick="masukSebagai('admin')">
                            <i class="bi bi-shield-lock fs-4 me-2"></i> Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


  <!-- INI HALAMAN TENTANG -->
<div class="container-fluid py-5" id="Tentangsection" style="background-color:white;height:100vh;">
  <div class="container">
    <div class="row align-items-center" style="position: relative;top: 150px;">
      <div class="col-12 col-md-5 text-center">
        <img src="{{ asset('assets/home/asset/isi 2.png') }}" class="img-fluid" alt="Gambar Kejardosen">
      </div>
      <div class="col-12 col-md-7 text-center text-md-start">
        <h1 style="font-weight: 700;color: #000;">Solusi Inovatif untuk Penjadwalan Bimbingan Tugas Akhir</h1>
        <p class="py-2" style="font-weight: 400;color: #000;font-size: 20px;">Kejardosen adalah solusi inovatif untuk mahasiswa dan dosen dalam mengatur jadwal Bimbingan tugas akhir. Bersama Kejardosen, atur waktu bimbingan tugas akhir anda dengan lebih terorganisir dan teratur, sehingga anda dapat fokus pada pencapaian tujuan akademis anda.</p>
        <a class="btn btn-primary" href="#Fitursection" style="background-color: #1f819b; color: white;">Lihat Fitur</a>
      </div>
    </div>
  </div>
</div>

<!-- INI HALAMAN FITUR -->
<div class="container-fluid py-5" id="Fitursection" style="background-color: #b1e8f0; height: 100vh;">
  <div class="container">
    <h1 class="fitur-title text-center" style="color: #20697E; font-size: 36px; font-weight: bold; top: 60px; margin-bottom: 40px;">
      Fitur Utama
    </h1>
    <div class="row justify-content-center">
      
      <!-- Card 1 -->
      <div class="col-12 col-md-3 mb-4">
        <div class="card text-center shadow-sm" style="border: none; border-radius: 15px; overflow: hidden;">
          <div class="card-body">
            <div class="kotak mb-3" style="height: 60px; width: 60px; border-radius: 50%; background-color: #3EBCD2; margin: auto;">
              <p style="position: relative; top: 6px; font-size:30px;color:white;">1</p>
            </div>
            <h5 class="card-title" style="font-weight: 600; color: #20697E; margin-top: 15px;">Penjadwalan Mudah</h5>
            <p class="card-text" style="font-size: 15px; color: #000; font-weight: 450; padding: 0 15px;">
              Mahasiswa dapat memilih waktu yang tersedia untuk mengajukan jadwal bimbingan, dan dosen akan menerima notifikasi untuk menerima, menolak, atau merevisi jadwal tersebut.
            </p>
          </div>
        </div>
      </div>
      
      <!-- Card 2 -->
      <div class="col-12 col-md-3 mb-4">
        <div class="card text-center shadow-sm" style="border: none; border-radius: 15px; overflow: hidden;">
          <div class="card-body">
            <div class="kotak mb-3" style="height: 60px; width: 60px; border-radius: 50%; background-color: #3EBCD2; margin: auto;">
              <p style="position: relative; top: 6px; font-size:30px;color:white;">2</p>
            </div>
            <h5 class="card-title" style="font-weight: 600; color: #20697E; margin-top: 15px;">Notifikasi Otomatis</h5>
            <p class="card-text" style="font-size: 15px; color: #000; font-weight: 450; padding: 0 15px;">
              Kejardosen akan mengirimkan pengingat otomatis sebelum sesi bimbingan dimulai, baik kepada mahasiswa maupun dosen.
            </p>
          </div>
        </div>
      </div>
      
      <!-- Card 3 -->
      <div class="col-12 col-md-3 mb-4">
        <div class="card text-center shadow-sm" style="border: none; border-radius: 15px; overflow: hidden;">
          <div class="card-body">
            <div class="kotak mb-3" style="height: 60px; width: 60px; border-radius: 50%; background-color: #3EBCD2; margin: auto;">
              <p style="position: relative; top: 6px; font-size:30px;color:white;">3</p>
            </div>
            <h5 class="card-title" style="font-weight: 600; color: #20697E; margin-top: 15px;">Tracking Bimbingan</h5>
            <p class="card-text" style="font-size: 15px; color: #000; font-weight: 450; padding: 0 15px;">
              Pantau setiap progres tugas akhir Anda melalui logbook yang mencatat semua pertemuan, topik yang dibahas, dan evaluasi dari setiap riwayat pertemuan.
            </p>
          </div>
        </div>
      </div>
      
      <!-- Card 4 -->
      <div class="col-12 col-md-3 mb-4">
        <div class="card text-center shadow-sm" style="border: none; border-radius: 15px; overflow: hidden;">
          <div class="card-body">
            <div class="kotak mb-3" style="height: 60px; width: 60px; border-radius: 50%; background-color: #3EBCD2; margin: auto;">
              <p style="position: relative; top: 6px; font-size:30px;color:white;">4</p>
            </div>
            <h5 class="card-title" style="font-weight: 600; color: #20697E; margin-top: 15px;">Riwayat Pertemuan</h5>
            <p class="card-text" style="font-size: 15px; color: #000; font-weight: 450; padding: 0 15px;">
              Akses semua riwayat pertemuan bimbingan dengan detail lengkap, termasuk tanggal, waktu, dan topik diskusi, untuk memudahkan evaluasi dan tinjauan.
            </p>
          </div>
        </div>
      </div>
    </div>


    <div class="text-center">
      <a class="btn btn-primary" href="#FAQsection" style="background-color: #1f819b; color: white;">Lihat FAQ</a>
    </div>
  </div>
</div>

<!-- INI HALAMAN FAQ -->
<div class="container-fluid py-5" id="FAQsection" style="background-color: #3EBCD2;height: 100vh;">
  <div class="container">
    <h1 class="faq-title text-center" style="color: white;"><b>Pertanyaan Yang Sering Diajukan</b></h1>
    <div class="accordion" id="faqAccordion" style="margin-top: 90px;">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: #B1E8F0;">
            Bagaimana cara menjadwalkan bimbingan?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Setelah login, mahasiswa dapat melihat jadwal dosen yang tersedia di dashboard aplikasi, yang menunjukkan hari-hari 
            dosen yang tersedia untuk bimbingan. Mahasiswa dapat mengajukan jadwal bimbingan dengan memilih hari dan waktu yang tersedia.  
            Pengajuan hanya dapat dilakukan untuk tanggal mulai dari hari ini dan tidak dapat melebihi batas waktu 30 hari ke depan. 
            Setelah diajukan, dosen akan menerima notifikasi untuk mengonfirmasi, menolak, atau menyarankan perubahan pada jadwal yang diajukan mahasiswa.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: #B1E8F0;">
            Bagaimana saya mendapatkan notifikasi pengingat?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Kejardosen mengirim notifikasi langsung melalui dashboard aplikasi setiap ada aksi, seperti pengajuan jadwal, konfirmasi, penolakan, atau perubahan jadwal
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color: #B1E8F0;">
            Apakah saya bisa mengubah jadwal bimbingan setelah diajukan?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Ya, jika dosen belum mengonfirmasi jadwal, Anda bisa mengajukan perubahan pengajuan jadwal bimbingan
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" style="background-color: #B1E8F0;">
            Bagaimana cara mencatat progres bimbingan?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Mahasiswa dapat mencatat progress perkembangan tugas akhir secara terperinci di fitur logbook setelah setiap sesi 
            bimbingan. Setiap entri logbook mencakup informasi seperti tanggal bimbingan, topik yang dibahas, dan catatan progres. 
            Logbook dapat diperbarui setelah setiap pertemuan untuk mencatat perkembangan proyek secara sistematis.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- INI HALAMAN FOOTER -->
<footer class="footer bg-dark text-light py-3">
  <div class="container text-center">
    <ul class="nav justify-content-center">
      <li class="nav-item"><a class="nav-link text-light" href="#Tentangsection">Tentang</a></li>
      <li class="nav-item"><a class="nav-link text-light" href="#Fitursection">Fitur</a></li>
      <li class="nav-item"><a class="nav-link text-light" href="#FAQsection">FAQ</a></li>
    </ul>
    <p class="m-0">© 2025 Kejardosen | All Rights Reserved</p>
  </div>
</footer>


  
  
  

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
  
      <script>
        function masukSebagai(role) {
          if (role === 'dosen') {
            window.location.href = 'index_dosen.html';
          } else if (role === 'mahasiswa') {
            window.location.href = 'index_mahasiswa.html';
          } else if (role === 'admin') {
            window.location.href = 'index_admin.html';
          }
        }
      </script>
      
  
  </body>
  </html>




