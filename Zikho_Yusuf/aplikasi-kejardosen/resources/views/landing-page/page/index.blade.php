<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejar Dosen</title>


<!-- CSS Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">


<style>
  .plus-jakarta-sans-font {
  font-family: "Plus Jakarta Sans", sans-serif;
  font-optical-sizing: auto;
  font-weight: 500px;
  font-style: normal;
  }
  .custom-nav-link {
  color: white; /* Warna teks awal */
  text-decoration: none; /* Menghilangkan garis bawah */
  padding: 30px 20px;
  transition: background-color 0.3s; /* Animasi smooth */
}
  .custom-nav-link:hover{
    background-color: #D5F5F8; /* Warna background saat hover */
  color: white; /* Warna teks saat hover */
  border-radius: 5px;/* Menambah efek rounded saat hover */
  /* Menambah padding agar terlihat seperti tombol */
  text-decoration: none; 
  }
  html {
    scroll-behavior: smooth;
}
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

</head>
<body>
   
<div class="container-fluid" style="background-color:#D5F5F8; height:100vh;">

  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" >
    <div class="container-fluid"  style="background-color: white;position: fixed;top: 0px;width: 100%;">
      <a class="navbar-brand" href="#" >
        <img src="{{ asset('assets/home/asset/logokjrdns.png') }}" width="180px" height="70px"  alt="" style="position: relative;left:100px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0"  style="margin-left: 300px;">
          <li class="nav-item">
            <a class="custom-nav-link active" style="color: black;"  aria-current="page" href="#Berandasection">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="custom-nav-link ms-5" style="color: black;" href="#Tentangsection">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="custom-nav-link ms-5" style="color: black;" href="#Fitursection">Fitur</a>
          </li>
          <li class="nav-item">
            <a class="custom-nav-link ms-5 " style="margin-right: 100px;color: #000;" href="#FAQsection">FAQ</a>
          </li>
          <li class="nav-item ">
        </ul>
        <form class="d-flex"  role="search">
          <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal"  style="background-color: #1f819b; color: white;position: relative;left: 150px;" >Masuk</a>
          <!-- <button class="btn " style="background-color: #1f819b; color: white;"   type="submit">Masuk</button> -->
        </form>

         
      </div>
    </div>
  </nav>

<!-- INI HALAMAN BERANDA -->
<div class="container-fluid" id="Berandasection" style="height:100vh;">
  <div class="row align-items-center " style="position: relative;top: 100px;">
    <div class="col-md-6 p-5 " style="position: relative;left: 50px;">
      <p style="font-size: 30px;font-weight: 490;">Selamat Datang!</p>
      <h1 style="font-weight: 700;font-size: 90px; color: #1f819b; position: relative;top:-20px;"><span style="color: #225668;">K</span><span style="color: #22a0b8;">ejar</span>dosen</h1>
      <p style="width: 1000px;font-size: 35px;">Penjadwalan Bimbingan Tugas Akhir</p>
      <a href="#Tentangsection" class="btn mt-3" style="background-color: #1f819b;color: white;width: 135px;">Lihat lebih jauh</a>
    </div>
    <div class="col-md-6 ">
      <img src="{{ asset('assets/home/asset/Kalender baru.svg') }}" style="height:521px;" alt="Calendar" class="img-fluid">
  </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Pilih Akses Masuk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <p>Silakan pilih masuk sebagai:</p>
        <div class="d-flex justify-content-around">
          <a class="btn btn-outline-primary" href="{{ route('login.dosen') }}"  onclick="masukSebagai('dosen')">Dosen</a>
          <a class="btn btn-outline-success" href="{{ route('login.mahasiswa') }}" onclick="masukSebagai('mahasiswa')">Mahasiswa</a>
          <a class="btn btn-outline-warning" href="{{ route('login.admin') }}"   onclick="masukSebagai('admin')">Admin</a>
        </div>
      </div>
     
    </div>
  </div>
</div>


<!-- INI HALAMAN TENTANG -->
<div class="container-fluid py-5 align-items-center" id="Tentangsection" style="background-color:white;height:100vh;"  >
<div class="container ">
<div class="row" style="position: relative;top: 150px;">
  <div class="col-5 ">
    <img src="{{ asset('assets/home/asset/isi 2.png') }}" class="img-fluid"  alt="" style="width: 1000px;height: max-content;">
  </div>
<div class="col-7">
  <h1 style="font-weight: 700;color: #000;">Solusi Inovatif untuk Penjadwalan Bimbingan Tugas Akhir</h1>
  <p class="py-2" style="font-weight: 400;color: #000;font-size: 20px;">Kejardosen adalah solusi inovatif untuk mahasiswa dan dosen dalam mengatur jadwal Bimbingan
    tugas akhir. Bersama Kejardosen, atur waktu bimbingan tugas akhir anda dengan lebih terorganisir
    dan teratur, sehingga anda dapat fokus pada pencapaian tujuan akademis anda.
  </p>
  <div>
    <a class="btn btn-primary" href="#Fitursection"
    style="background-color: #1f819b; color: white;position: relative;">Lihat Fitur</a>
  </div>
</div>
</div>
</div>
</div>

<!-- INI HALAMAN FITUR -->
<div class="container-fluid py-5 align-items-center" id="Fitursection" style="background-color: #b1e8f0;height: 100vh;">
  <div class="container">
    <h1 class="fitur-title text-center" style="color: #20697E; position: relative;top: 60px;"><b>Fitur Utama</b></h1>
<div class="row " style="position: relative;">
  <div class="col-3 " style="background-color: white;border-radius: 20px;position: relative;left: -20px;margin-top:10%;">
<div class="kotak" style="margin: auto; height: 60px; width: 60px;border-radius: 50%;background-color: #3EBCD2;position: relative;top: -30px;">
  <p style="position: relative;left: 21px;top: 6px;font-size:30px;color:white;">1</p>
</div>
<p class="text-center mt-0" style="font-weight: 600;color:#20697E;font-size: 25px;position: relative;top: -25px;">Penjadwalan Mudah</p>
<p class="text-center align-content-center m-3" style="font-size: 15px;position: relative;top: -25px;color: #000;font-weight: 450;" > Mahasiswa dapat memilih waktu yang tersedia untuk mengajukan jadwal bimbingan, dan dosen akan menerima notifikasi untuk menerima, menolak, atau merevisi jadwal tersebut.</p>
  </div>

  <div class="col-3 " style="background-color: white;border-radius: 20px;position: relative;left: -5px;margin-top:10%;">
    <div class="kotak" style="margin: auto; height: 60px; width: 60px;border-radius: 50%;background-color: #3EBCD2;position: relative;top: -30px;">
      <p style="position: relative;left: 22px;top: 6px;font-size:30px;color:white;">2</p>
    </div>
    <p class="text-center mt-0" style="font-weight: 600;color:#20697E;font-size: 25px;position: relative;top: -25px;">Notifikasi Otomatis</p>
    <p class="text-center align-content-center m-3" style="font-size: 15px;position: relative;top: -25px;color: #000;font-weight: 450;" > 
      Tidak perlu khawatir lupa!. Kejardosen akan mengirimkan pengingat otomatis sebelum sesi bimbingan dimulai, baik kepada mahasiswa maupun dosen.
    </p>
      </div>

      <div class="col-3 " style="background-color: white;border-radius: 20px;position: relative;right: -5px;margin-top:10%;">
        <div class="kotak" style="margin: auto; height: 60px; width: 60px;border-radius: 50%;background-color: #3EBCD2;position: relative;top: -30px;">
          <p style="position: relative;left: 22px;top: 6px;font-size:30px;color:white;">3</p>
        </div>
        <p class="text-center mt-0" style="font-weight: 600;color:#20697E;font-size: 25px;position: relative;top: -25px;">Tracking Bimbingan</p>
        <p class="text-center align-content-center m-3" style="font-size: 15px;position: relative;top: -25px;color: #000;font-weight: 450;" > 
          Pantau setiap progres tugas akhir anda melalui logbook yang mencatat semua pertemuan, topik yang dibahas, dan evaluasi dari setiap riwayat pertemuan.
          </p>
          </div>

          <div class="col-3 " style="background-color: white;border-radius: 20px;position: relative;right: -20px;margin-top:10%;">
            <div class="kotak" style="margin: auto; height: 60px; width: 60px;border-radius: 50%;background-color: #3EBCD2;position: relative;top: -30px;">
              <p style="position: relative;left: 21px;top: 6px;font-size:30px;color:white;">4</p>
            </div>
            <p class="text-center mt-0" style="font-weight: 600;color:#20697E;font-size: 25px;position: relative;top: -25px;">Riwayat Pertemuan</p>
            <p class="text-center align-content-center m-3" style="font-size: 15px;position: relative;top: -25px;color: #000;font-weight: 450;" > 
              Akses semua riwayat pertemuan bimbingan dengan detail lengkap, termasuk tanggal, waktu, dan topik diskusi, untuk memudahkan evaluasi dan tinjauan.
            </p>
              </div>
</div>
<div class="row">
  <div class="col-12  text-center mt-4" >
  <a class="btn btn-primary " href="#FAQsection"
  style="background-color: #1f819b; color: white;position: relative;">Lihat FAQ</a>
  </div>
</div>
  </div>

</div>

<!-- INI HALAMAN FAQ -->
<div class="container-fluid py-5 align-items-center" id="FAQsection" style="background-color: #3EBCD2;height: 100vh;">
  <div class="container ">
    <h1 class="faq-title text-center" style="position: relative;top: 60px; color: white;"><b>Pertanyaan Yang Sering Diajukan</b></h1>
    <div class="accordion " id="faqAccordion" style="position: relative;margin-left: 200px;top: 90px;">
      <div class="accordion-item" style="width: 700px;">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: #B1E8F0;" >
            Bagaimana cara menjadwalkan bimbingan?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Setelah login, mahasiswa dapat melihat ketersediaan waktu dosen melalui kalender di aplikasi. Pilih waktu yang tersedia 
            dan ajukan jadwal bimbingan. Dosen akan menerima notifikasi untuk mengonfirmasi atau menyesuaikan jadwal tersebut.
          </div>
        </div>
      </div>
      <div class="accordion-item" style="width: 700px;">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: #B1E8F0;">
            Bagaimana saya mendapatkan notifikasi pengingat?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Kejardosen akan mengirimkan notifikasi otomatis melalui email dan di dalam aplikasi sebelum sesi bimbingan dimulai.
          </div>
        </div>
      </div>
      <div class="accordion-item" style="width: 700px;">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color: #B1E8F0;">
            Apakah saya bisa mengubah jadwal bimbingan setelah diajukan?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Ya, jika dosen belum mengonfirmasi jadwal, Anda bisa mengajukan perubahan jadwal.
             Setelah dosen menyetujui, jadwal hanya bisa diubah atas persetujuan dosen
          </div>
        </div>
      </div>
      <div class="accordion-item" style="width: 700px;">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" style="background-color: #B1E8F0;" >
            Bagaimana cara mencatat progres bimbingan?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse " aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Setelah bimbingan selesai, anda dapat mencatat hasil diskusi dan progres proyek di fitur logbook yang ada di aplikasi.
             Catatan ini dapat diakses kembali kapan saja dan akan tersimpan sebagai riwayat bimbingan.
          </div>
        </div>
      </div>
    </div>
  </div>
  

  
  </div>

<!-- INI HALAMAN FOOTER -->
<div class="container-fluid py-5 align-items-center" style="background-color: #20697E;height: 65vh;">
  <div class="container align-items-center">
    <div class="row align-items-center">
    <div class="col-4 align-items-center" style="position: relative;top: 50px;">
<img src="{{ asset('assets/home/asset/logokjrdns.png') }}" alt="" style="width: 300px;" >
<p style="color: #102E3C;position: relative;font-size: smaller;position: relative;left: 20px;">Aplikasi Penjadwalan Bimbingan Tugas Akhir</p>
    </div>
    <div class="col-4 offset-1" style="color: white;">
      <h5>Beranda</h5>
      <ul class="footer-links" >
        <li>Halaman Utama</li>
        <li>Deskripsi Kejardosen</li>
        <li>Fitur Utama</li>
        <li>FAQ</li>
      </ul>
    </div>
    <div class="col-3 " style="color: white;">
      <h5>Fitur</h5>
      <ul class="footer-links">
        <li>Penjadwalan Bimbingan</li>
        <li>Pengingat Otomatis</li>
        <li>Riwayat Bimbingan</li>
        <li>Logbook Progres</li>
      </ul>
    </div>
  </div>
  
  <div class="row">
    <div class="col-4" style="position: relative;top: 55px;">
<h4 style="font-size: large;color: white;">Copyright  © 2024  Tim PBL - TRPL 107 </h4>
<h4 style="font-size:17px;color: white;position: relative;left: 7px;">SUPPORT  by Politeknik Negeri Batam </h4>
    </div>
    <div class="col-4 offset-1" style="color: white;">
      <h5>Tentang</h5>
      <ul class="footer-links">
        <li>Deskripsi Kejardosen</li>
      </ul>
    </div>
    <div class="col-md-3" style="color: white;">
      <h5>FAQ</h5>
      <ul class="footer-links">
        <li>Cara Menjadwalkan Bimbingan</li>
        <li>Notifikasi Pengingat</li>
        <li>Mengubah Jadwal</li>
        <li>Logbook & Riwayat Bimbingan</li>
      </ul>
    </div>
  </div>
</div>
</div>







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