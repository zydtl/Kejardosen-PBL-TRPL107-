// konfirmasi saat dosen ingin mengirim respon ke mahasiswa

tombolSubmit.addEventListener("click", function (event) {
  event.stopPropagation();
  event.preventDefault();

  // Ambil nama mahasiswa dari elemen tertentu
  const namaMahasiswa = document.querySelector("#namaMahasiswa").textContent.trim(); // Sesuaikan ID atau kelas elemen

  // Tampilkan SweetAlert untuk konfirmasi
  Swal.fire({
    title: "Konfirmasi Kirim Respons",
    text: `Apakah Anda yakin ingin mengirim respons pengajuan untuk mahasiswa ${namaMahasiswa}?`,
    icon: "warning",
    iconColor: "red",
    showCancelButton: true,
    cancelButtonText: "Batal",
    confirmButtonColor: "#22a0b8",
    cancelButtonColor: "#95dfea",
    confirmButtonText: "Ya, Kirim"
  }).then((result) => {
    if (result.isConfirmed) {
      // Tutup semua modal yang sedang terbuka
      const modals = document.querySelectorAll(".modal"); // Sesuaikan dengan kelas modal Anda
      modals.forEach(modal => {
        modal.style.display = "none";
      });

      // Tampilkan notifikasi sukses
      Swal.fire({
        title: "Berhasil!",
        text: `Respons pengajuan untuk mahasiswa ${namaMahasiswa} telah berhasil dikirim.`,
        icon: "success",
        confirmButtonColor: "#22a0b8",
      });
    }
  });
});
