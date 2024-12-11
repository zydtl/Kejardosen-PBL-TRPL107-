// Laman pengajuan dosen
terima.addEventListener("click", function (event) {
  event.stopPropagation();
  event.preventDefault();

  // Tampilkan SweetAlert
  Swal.fire({
    title: "Apa Anda yakin ingin menyetujui pengajuan?",
    text: "Anda masih bisa mengubah atau membatalkannya nanti.",
    icon: "warning",
    iconColor: "red",
    showCancelButton: true,
    cancelButtonText: "Batalkan",
    confirmButtonColor: "#22a0b8",
    cancelButtonColor: "#95dfea",
    confirmButtonText: "Ya, setujui"
  }).then((result) => {
    if (result.isConfirmed) {
      // Tutup semua modal yang sedang terbuka
      const modals = document.querySelectorAll(".modal"); // Sesuaikan dengan kelas modal Anda
      modals.forEach(modal => {
        modal.style.display = "none";
      });

      Swal.fire({
        title: "Disetujui!",
        text: "Pengajuan berhasil disetujui.",
        icon: "success",
        confirmButtonColor: "#22a0b8",
      });
    }
  });
});

tolak.addEventListener("click", function (event) {
  event.stopPropagation();
  event.preventDefault();

  Swal.fire({
    title: "Apa Anda yakin ingin menolak pengajuan?",
    text: "Anda masih bisa mengubah keputusan ini nanti jika diperlukan.",
    icon: "warning",
    iconColor: "red",
    showCancelButton: true,
    cancelButtonText: "Batalkan",
    confirmButtonColor: "#22a0b8",
    cancelButtonColor: "#95dfea",
    confirmButtonText: "Ya, tolak"
  }).then((result) => {
    if (result.isConfirmed) {
      // Tutup semua modal yang sedang terbuka
      const modals = document.querySelectorAll(".modal"); // Sesuaikan dengan kelas modal Anda
      modals.forEach(modal => {
        modal.style.display = "none";
      });

      Swal.fire({
        title: "Ditolak!",
        text: "Pengajuan berhasil ditolak.",
        icon: "error",
        confirmButtonColor: "#22a0b8",
      });
    }
  });
});






  