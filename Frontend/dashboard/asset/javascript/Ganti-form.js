const selectAksi = document.getElementById("aksi");  // Select element
const formDosen = document.querySelector(".bagian2"); 
const double7Div = document.getElementById("double7");  // Element div #double7 (tanggal dan waktu anjuran dosen)
const double8Div = document.querySelector(".double8"); // Element div .double8 (bimbingan dan ruangan)
const catatanDosen = document.getElementById("catatan");  // Catatan Dosen
const kosong = document.querySelector(".kosong"); 


function toggleFormElements() {
  if (selectAksi.value === "tolak") {
    // Jika opsi "Tolak" dipilih
    double8Div.style.display = "none";  
    double7Div.style.display = "none";  
    catatanDosen.style.display = "block";  
    formDosen.style.display = "block";  
    kosong.style.display = "none";

  } else if (selectAksi.value === "terima") {
    // Jika opsi "Terima" dipilih
    double8Div.style.display = "block";  
    double7Div.style.display = "none";  
    catatanDosen.style.display = "block";  
    kosong.style.display = "none";

  } else if (selectAksi.value === "banding") {
    // Jika opsi "Banding" dipilih
    double8Div.style.display = "block";  
    double7Div.style.display = "block";  
    catatanDosen.style.display = "block";
    kosong.style.display = "none";

  } else if (selectAksi.value === "default") {
    // Jika opsi "Banding" dipilih
    double8Div.style.display = "none";  
    double7Div.style.display = "none";  
    catatanDosen.style.display = "none";
    kosong.style.display = "none";


  } else {
    // Default: Sembunyikan semua
    double8Div.style.display = "none";  
    double7Div.style.display = "none"; 
    catatanDosen.style.display = "none";
    kosong.style.display = "block";
     
  }
}

selectAksi.addEventListener("change", toggleFormElements);

// TOMBOL SUBMIT MASING MASING RESPON

document.addEventListener('DOMContentLoaded', function() {
  const selectAksi = document.getElementById("aksi");  // Elemen aksi
  const formSubmit = document.getElementById("tombolSubmit");  // Tombol submit
  const formBanding = document.getElementById("double7");  // Form Banding

  // Fungsi untuk mengatur tampilan form sesuai pilihan
  selectAksi.addEventListener("change", function() {
    // Reset tampilkan tombol submit sesuai pilihan
    formSubmit.style.display = 'none';  // Sembunyikan tombol submit default
    formBanding.style.display = 'none';  // Sembunyikan form banding

    if (selectAksi.value === "tolak") {
      // Tampilkan tombol submit untuk "Tolak"
      formSubmit.style.display = 'block';
    } else if (selectAksi.value === "terima") {
      // Tampilkan tombol submit untuk "Terima"
      formSubmit.style.display = 'block';
    } else if (selectAksi.value === "banding") {
      // Tampilkan form banding dan tombol submit untuk "Banding"
      formBanding.style.display = 'block';
      formSubmit.style.display = 'block';
    }
  });
});
