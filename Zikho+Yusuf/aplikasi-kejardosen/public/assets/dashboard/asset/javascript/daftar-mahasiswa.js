// JS MODAL tambah =======================================================================================
const modal = document.getElementById("formModalAdmin");
const openModalButton = document.getElementById("tambah-mhs");
const closeModalButton = document.getElementById("closeFormAdmin");

// Fungsi untuk membuka modal
openModalButton.addEventListener("click", function() {
    modal.style.display = "flex"; // Tampilkan modal
});

// Fungsi untuk menutup modal
closeModalButton.addEventListener("click", function() {
    modal.style.display = "none"; // Sembunyikan modal
});

// Menutup modal jika klik di luar modal
window.addEventListener("click", function(event) {
    if (event.target == modal) {
        modal.style.display = "none"; // Sembunyikan modal jika klik di luar modal
    }
});


// JS MODAL INFO =======================================================================================
document.getElementById('info-mhs').addEventListener('click', function() {
    // Menampilkan modal dengan menambahkan class 'show'
    document.getElementById('infoModalAdmin').classList.add('show');
});

document.getElementById('infoModalAdmin').addEventListener('click', function(e) {
    if (e.target === this) {
        // Menyembunyikan modal jika klik di luar konten modal
        document.getElementById('infoModalAdmin').classList.remove('show');
    }
});

document.getElementById('closeInfoAdmin').addEventListener('click', function(e) {
    if (e.target === this) {
        // Menyembunyikan modal jika klik di luar konten modal
        document.getElementById('infoModalAdmin').classList.remove('show');
    }
});

// JS MODAL EDIT =======================================================================================
const modaledit = document.getElementById("editModalAdmin");
const openModal = document.getElementById("edit-mhs");
const closeModal = document.getElementById("closeEditAdmin");

// Fungsi untuk membuka modal
openModal.addEventListener("click", function() {
    modaledit.style.display = "flex"; // Tampilkan modal
});

// Fungsi untuk menutup modal
closeModal.addEventListener("click", function() {
    modaledit.style.display = "none"; // Sembunyikan modal
});

// Menutup modal jika klik di luar modal
window.addEventListener("click", function(event) {
    if (event.target == modaledit) {
        modaledit.style.display = "none"; // Sembunyikan modal jika klik di luar modal
    }
});


const formMhs = document.getElementById("formMhs");
formMhs.addEventListener("submit", function (e) {
    e.preventDefault(); // Mencegah submit form default
    Swal.fire({
        title: "Berhasil!",
        text: "Data Mahasiswa berhasil disimpan.",
        icon: "success",
        confirmButtonColor: "#22a0b8",
    });
    formModalAdmin.style.display = "none";
}
);

//Konfirmasi Hapus Hubungan
document.addEventListener("click", (event) => {
  if (event.target.closest(".btn-hapus-mhs")) {
      const row = event.target.closest(".table-row");
      const mahasiswa = row.querySelector(".col-1 .nama").textContent.trim();
      const dosen = row.querySelector(".col-2 .nama").textContent.trim();


      Swal.fire({
          title: "Apakah Anda yakin?",
          text: `"${mahasiswa}, ${dosen}" akan dihapus dari daftar!`,
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#22a0b8",
          cancelButtonColor: "#95dfea",
          confirmButtonText: "Ya, hapus!",
          cancelButtonText: "Tidak, batal!"
      }).then((result) => {
          if (result.isConfirmed) {
              // Tampilkan notifikasi sukses
              Swal.fire({
                  title: "Berhasil!",
                  text: `"${mahasiswa}, ${dosen}" telah dihapus.`,
                  icon: "success",
                  confirmButtonColor: "#22a0b8",
              });

              // Logika backend (opsional, kirim permintaan ke server)
              console.log(`Mahasiswa "${mahasiswa}, ${dosen}" dihapus (pengiriman ke backend).`);
          }
      });
  }
});



