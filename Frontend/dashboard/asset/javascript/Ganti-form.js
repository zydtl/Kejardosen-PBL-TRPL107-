// Referensi elemen tombol dan container input
const btnAturUlang = document.getElementById("btnAturUlang");
const additionalInputs = document.getElementById("double7");

// Flag untuk melacak apakah elemen tambahan sudah ditampilkan
let isAdditionalShown = false;

// Tambahkan event listener ke tombol
btnAturUlang.addEventListener("click", function () {
  if (!isAdditionalShown) {
    // Tampilkan elemen tambahan dengan transisi ukuran
    additionalInputs.style.display = "block";
    btnAturUlang.textContent = "Batalkan";
  } else {
    // Sembunyikan elemen tambahan dengan transisi ukuran
    additionalInputs.style.display = "none";
    btnAturUlang.textContent = "Atur Ulang Jadwal";
  }
  // Toggle status
  isAdditionalShown = !isAdditionalShown;
});
