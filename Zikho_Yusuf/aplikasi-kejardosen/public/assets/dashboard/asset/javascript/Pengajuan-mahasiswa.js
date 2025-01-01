// Info
document.querySelectorAll('.btn-info').forEach(button => {
  button.addEventListener('click', function () {
      const kodePengajuan = this.getAttribute('data-id');
      const url = `/mahasiswa/detail-pengajuan/${kodePengajuan}`;
      window.location.href = url; // Redirect ke halaman detail
  });
});

// Alert mahasiswa membatalkan pengajuan
document.querySelectorAll(".btn-tolak").forEach(item=>{
  item.addEventListener("click", function () {
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
        const kodePengajuan = item.getAttribute("data-id");
  
        fetch(`/mahasiswa/pengajuan/${kodePengajuan}/batalkan`, {
          method: 'PATCH',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
            status: 'dibatalkan'
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            Swal.fire({
              title: "Dibatalkan!",
              text: "Pengajuan Anda telah dibatalkan.",
              icon: "success",
              confirmButtonColor: "#22a0b8",
            }).then(() => {
              location.reload();  // Refresh halaman setelah status dibatalkan
            });
          } else{
            Swal.fire({
              title: "Gagal Dibatalkan!",
              text: "Pengajuan Anda gagal dibatalkan.",
              icon: "error",
              confirmButtonColor: "#22a0b8",
            }).then(() => {
              location.reload();  // Refresh halaman setelah status dibatalkan
            });
          }
        }) 
        
        .catch(error => {
          console.error('Error:', error);
          Swal.fire({
            title: "Terjadi Kesalahan",
            text: "Gagal membatalkan pengajuan. Coba lagi nanti.",
            icon: "error",
            confirmButtonColor: "#22a0b8",
          });
        });
      }
    });
  });
})

// Alert mahasiswa mengubah pengajuan
document.querySelectorAll('.btn-edit').forEach(button => {
  button.addEventListener('click', function () {
    
      const modal = document.querySelector('#formModaledit');
      const form = modal.querySelector('#formModalEditData');
      const kodePengajuan = this.dataset.kode;
      const tanggalPengajuan = this.dataset.tanggal1;
      const tanggalAnjuranDosen = this.dataset.tanggal2;
      const waktuPengajuan = this.dataset.waktu1;
      const waktuAnjuranDosen = this.dataset.waktu2;
      
      const judul_bimbingan = this.dataset.judul;

      const catatanMahasiswa = this.dataset.catatanmahasiswa;
      const catatanDosen = this.dataset.catatandosen;

      // Set action URL
      form.action = `/mahasiswa/pengajuan/update/${kodePengajuan}`;
      
      // /mahasiswa/pengajuan/${kodePengajuan}/batalkan
      
      // Set modal inputs
      modal.querySelector('#tanggal1').value = tanggalPengajuan;
      modal.querySelector('#tanggal2').value = tanggalAnjuranDosen;
      modal.querySelector('#waktu1').value = waktuPengajuan;
      modal.querySelector('#waktu2').value = waktuAnjuranDosen;
      modal.querySelector('#judulbimbingan').value = judul_bimbingan;
      modal.querySelector('#catatanmahasiswa').value = catatanMahasiswa;
      modal.querySelector('#catatandosen').value = catatanDosen;

      // Show modal
      modal.classList.add('show');
      modal.style.display = 'flex';

      // Handle form submission with AJAX
      form.addEventListener('submit', function (e) {
          e.preventDefault();  // Prevent the default form submission

          const formData = new FormData(form);  // Create FormData object from the form

          // Send the data using fetch API (AJAX)
          modal.style.display = "none";

          fetch(form.action, {
              method: 'PUT',  // Can use PUT for update
              headers: {
                'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
              },
              body: JSON.stringify({
                'tanggal_pengajuan' : document.getElementById('tanggal1').value,
                'waktu_pengajuan': document.getElementById('waktu1').value,
                'judul_bimbingan': document.getElementById('judulbimbingan').value,
                'catatan_mahasiswa': document.getElementById('catatanmahasiswa').value,
              })  
          })
          .then(response => response.json())  // Parse the JSON response from server
          .then(data => {
            if (data.success) {
              Swal.fire({
                title: "Pengajuan diubah!",
                text: "Pengajuan Anda telah diubah.",
                icon: "success",
                confirmButtonColor: "#22a0b8",
              }).then(() => {
                const modal = document.querySelector('#formModaledit');
                modal.classList.remove('show');
                modal.style.display = 'none';
                location.reload();  // Refresh halaman setelah status dibatalkan
              });
            } else{
              Swal.fire({
                title: "Gagal Diubah!",
                text: "Pengajuan Anda gagal diubah.",
                icon: "error",
                confirmButtonColor: "#22a0b8",
              }).then(() => {
                location.reload();  // Refresh halaman setelah di edit
              });
            }
          })
          .catch(error => {
              console.error('Error:', error);
              alert('Terjadi kesalahan, coba lagi');
          });
      });
  });
});


// Alert mahasiswa membuat pengajuan
document.querySelector(".buat").addEventListener("click", function (event) {
  event.preventDefault();
  document.getElementById("formModal").style.display = "none";
  fetch(`/mahasiswa/pengajuan`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({
      "tanggal_pengajuan": document.getElementById('tanggal').value,
      "waktu_pengajuan": document.getElementById('waktu').value,
      "judul_bimbingan": document.getElementById('judul').value,
      "catatan_mahasiswa": document.getElementById('catatan').value,
    })})
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        Swal.fire({
          title: "Berhasil diajukan!",
          text: "Pengajuan Anda telah dibuat.",
          icon: "success",
          confirmButtonColor: "#22a0b8",
        }).then(() => {
          location.reload();  // Refresh halaman setelah status dibatalkan
        });
      } else{
        Swal.fire({
          title: "Gagal diajukan!",
          text: "Pengajuan Anda gagal dibuat.",
          icon: "error",
          confirmButtonColor: "#22a0b8",
        }).then(() => {
          location.reload();  // Refresh halaman setelah status dibatalkan
        });
      }
  })
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

