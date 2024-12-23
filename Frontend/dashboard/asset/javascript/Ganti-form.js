// Pilih elemen dropdown
const selectAksi = document.getElementById("aksi"); // Pastikan elemen ini sesuai ID-nya
const formTerima = document.getElementById("terima");
const formTolak = document.getElementById("tolak");
const formBanding = document.getElementById("banding");
const kosong = document.querySelector(".kosong"); // Pastikan elemen ini ada jika Anda ingin menggunakan "kosong"

// Fungsi untuk toggle form
function toggleFormElements() {
  if (selectAksi.value === "tolak") {
    formTolak.style.display = "block"; // Tampilkan form tolak
    formTerima.style.display = "none";
    formBanding.style.display = "none";
    if (kosong) kosong.style.display = "none";
  } else if (selectAksi.value === "terima") {
    formTolak.style.display = "none";
    formTerima.style.display = "block"; // Tampilkan form terima
    formBanding.style.display = "none";
    if (kosong) kosong.style.display = "none";
  } else if (selectAksi.value === "banding") {
    formTolak.style.display = "none";
    formTerima.style.display = "none";
    formBanding.style.display = "block"; // Tampilkan form banding
    if (kosong) kosong.style.display = "none";
  } else {
    // Default: Sembunyikan semua
    formTolak.style.display = "none";
    formTerima.style.display = "none";
    formBanding.style.display = "none";
    if (kosong) kosong.style.display = "block"; // Tampilkan jika ada elemen kosong
  }
}

// Event listener untuk dropdown
selectAksi.addEventListener("change", toggleFormElements);
