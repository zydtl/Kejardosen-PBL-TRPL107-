//untuk Tombol edit atau banding
document.getElementById("openFormedit").addEventListener("click", function(){
  document.querySelector("#formModaledit").style.display = "flex";
})

document.querySelector("#closeFormedit").addEventListener("click", function(){
  document.querySelector("#formModaledit").style.display = "none";
})

//untuk tombol buat pengajuan baru
document.getElementById("openForm").addEventListener("click", function(){
  document.querySelector("#formModal").style.display = "flex";
})

document.querySelector("#closeForm").addEventListener("click", function(){
  document.querySelector("#formModal").style.display = "none";
})


// Alert mahasiswa membatalkan pengajuan
document.querySelector(".btn-tolak").addEventListener("click", function () {
  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Pengajuan ini akan dibatalkan dan tidak dapat dikembalikan!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#22a0b8",
    cancelButtonColor: "#95dfea",
    confirmButtonText: "Ya, batalkan!",
    cancelButtonText: "Tidak, tetap ajukan!"
}).then((result) => {
    if (result.isConfirmed) {
        // Logic untuk membatalkan pengajuan bisa ditambahkan di sini
        Swal.fire({
            title: "Dibatalkan!",
            text: "Pengajuan Anda telah dibatalkan.",
            icon: "success",
            confirmButtonColor: "#22a0b8",
        });
    }
});
});

// Alert mahasiswa mengubah pengajuan
document.querySelector(".ubah").addEventListener("click", function (event) {
  event.preventDefault();
  document.getElementById("formModaledit").style.display = "none";
  Swal.fire({
    title: "Pengajuan Berhasil Diubah!",
    text: "Pengajuan Anda telah berhasil diperbarui. Silakan cek status pengajuan Anda.",
    icon: "success",
    confirmButtonText: "OK",
    confirmButtonColor: "#22a0b8"
  });
});

// Alert mahasiswa membuat pengajuan
document.querySelector(".buat").addEventListener("click", function (event) {
  event.preventDefault();
  document.getElementById("formModal").style.display = "none";
  Swal.fire({
    title: "Pengajuan Berhasil Dibuat!",
    text: "Pengajuan Anda telah berhasil diperbarui. Silakan cek status pengajuan Anda.",
    icon: "success",
    confirmButtonText: "OK",
    confirmButtonColor: "#22a0b8"
  });
});