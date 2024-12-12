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

//untuk tombol hapus pengajuan
document.getElementById("openFormdelete").addEventListener("click", function(){
  document.querySelector("#formModaldelete").style.display = "flex";
})

document.querySelector("#closeFormdelete").addEventListener("click", function(){
  document.querySelector("#formModaldelete").style.display = "none";
})

document.getElementById('showButton').addEventListener('click', function () {
  document.getElementById('content').style.display = 'block';
   // Sembunyikan tombol setelah ditekan
});


// Pengaturan pemilihan tanggal pengajuan

// Fungsi untuk menghitung batas min dan max
const setMinMaxDate = (inputElement) => {
  const today = new Date();

  // Tentukan tanggal minimum (hari besok)
  const tomorrow = new Date(today);
  tomorrow.setDate(today.getDate() + 1); // Tambahkan 1 hari

  // Tentukan tanggal maksimum (30 hari ke depan)
  const maxDate = new Date(today);
  maxDate.setDate(today.getDate() + 30); // Tambahkan 30 hari

  // Format tanggal menjadi `YYYY-MM-DD`
  const formatDate = (date) => {
      const year = date.getFullYear();
      const month = (date.getMonth() + 1).toString().padStart(2, "0");
      const day = date.getDate().toString().padStart(2, "0");
      return `${year}-${month}-${day}`;
  };

  // Tetapkan atribut `min` dan `max` pada elemen input
  inputElement.setAttribute("min", formatDate(tomorrow));
  inputElement.setAttribute("max", formatDate(maxDate));

  console.log(`Min date: ${formatDate(tomorrow)}, Max date: ${formatDate(maxDate)} for #${inputElement.id}`);
};

// Tetapkan untuk #tanggal dan #tanggal1
const inputDate = document.getElementById("tanggal");
const inputDate1 = document.getElementById("tanggal1");

setMinMaxDate(inputDate);
setMinMaxDate(inputDate1);


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