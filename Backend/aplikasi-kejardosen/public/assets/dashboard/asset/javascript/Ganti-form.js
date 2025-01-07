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



// Mendapatkan elemen tombol dan modal
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("formModaledit");
  const openButtons = document.querySelectorAll("#openFormpengajuan");
  const closeButton = document.querySelector(".close-modal");

  // Menangani klik tombol untuk membuka modal
  openButtons.forEach(button => {
      button.addEventListener("click", function () {
          // Mendapatkan data dari atribut tombol

          // const kodePengajuan = this.dataset.kodePengajuan;
          const kodePengajuan = button.getAttribute("data-kodePengajuan");

          const nama_mahasiswa = button.getAttribute("data-nama_mahasiswa");
          const nim = button.getAttribute("data-nim");
          const kelas = button.getAttribute("data-kelas");
          const judul_tugas_akhir = button.getAttribute("data-judul_tugas_akhir");
          const created_at = button.getAttribute("data-created_at");
          const updated_at = button.getAttribute("data-updated_at");



          const judul_bimbingan = button.getAttribute("data-judul");
          const tanggal_pengajuan = button.getAttribute("data-tanggal_pengajuan");
          const waktu_pengajuan = button.getAttribute("data-waktu_pengajuan");
          const catatan_mahasiswa = button.getAttribute("data-catatan_mahasiswa");
        
          // Memperbarui nilai dalam modal
          // modal.querySelector('#kodePengajuan').value = kodePengajuan;

          modal.querySelector('#namaMahasiswa').innerText = nama_mahasiswa;
          modal.querySelector('#nim').innerText = nim;
          modal.querySelector('#kelas').innerText = kelas;
          modal.querySelector('#kodePengajuan').innerText = kodePengajuan;
          modal.querySelector('#judul_tugas_akhir').innerText = judul_tugas_akhir;
          modal.querySelector('#created_at').innerText = created_at;
          modal.querySelector('#updated_at').innerText = updated_at;


          modal.querySelector('#judul_bimbingan').innerText = judul_bimbingan;
          modal.querySelector('#tanggal_pengajuan').innerText = tanggal_pengajuan;
          modal.querySelector('#waktu_pengajuan').innerText = waktu_pengajuan;
          modal.querySelector('#catatan_mahasiswa').innerText = catatan_mahasiswa;
          // Membuka modal
          modal.classList.remove("hidden");
      });
  });

  // Menangani tombol untuk menutup modal
  closeButton.addEventListener("click", function () {
      modal.classList.add("hidden");
  });

  // Mencegah klik di luar modal menutup modal
  modal.addEventListener("click", function (event) {
      if (event.target === modal) {
          modal.classList.add("hidden");
      }
  });
});


// form tolak
document.querySelectorAll(".btnmuncul").forEach(button => {
  button.addEventListener('click', function () {
    
    const modal = document.querySelector('#formModaledit');
    const form = modal.querySelector('#tolak');


    const kodePengajuan = this.dataset.kodepengajuan;
    console.log(this.dataset)
    const catatanDosen = this.dataset.catatan_dosen;

    // Set action URL
    form.action = `/dosen/pengajuan/tolakPengajuan/${kodePengajuan}`;
    
    // /mahasiswa/pengajuan/${kodePengajuan}/batalkan
    
    // Set modal inputs
    modal.querySelector('#catatan-tolak').value = catatanDosen;

    // Show modal
    modal.classList.add('show');
    modal.style.display = 'flex';

    // Handle form submission with AJAX
    form.addEventListener('submit', function (e) {
        e.preventDefault();  // Prevent the default form submission

        const formData = new FormData(form);  // Create FormData object from the form

        // Send the data using fetch API (AJAX)
        document.getElementById("formModaledit").style.display = "none";

        fetch(form.action, {
            method: 'PUT',  // Can use PUT for update
            headers: {
              'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
              'catatan_dosen': document.getElementById('catatan-tolak').value,
            })  
        })
        .then(response => response.json())  // Parse the JSON response from server
        .then(data => {
          if (data.success) {
            Swal.fire({
              title: "Pengajuan ditolak!",
              text: "Pengajuan Mahasiswa telah ditolak.",
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
              text: "Pengajuan Mahasiswa gagal ditolak.",
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



// form banding
document.querySelectorAll(".btnmuncul").forEach(button => {
  button.addEventListener('click', function () {
    
    const modal = document.querySelector('#formModaledit');
    const form = modal.querySelector('#banding');


    const kodePengajuan = this.dataset.kodepengajuan;
    const tanggal_anjuranDosen = this.dataset.tanggal_anjurandosen;
    const waktu_anjuranDosen = this.dataset.waktu_anjurandosen;
    const catatanDosen = this.dataset.catatan_dosen;
    // console.log(this.dataset)


    // Set action URL
    form.action = `/dosen/pengajuan/bandingPengajuan/${kodePengajuan}`;
    
    // /mahasiswa/pengajuan/${kodePengajuan}/batalkan
    
    // Set modal inputs
    modal.querySelector('#catatan-banding').value = catatanDosen;
    modal.querySelector('#tanggal-anjuran').value = tanggal_anjuranDosen;
    modal.querySelector('#waktu-anjuran').value = waktu_anjuranDosen;

    // Show modal
    modal.classList.add('show');
    modal.style.display = 'flex';

    // Handle form submission with AJAX
    form.addEventListener('submit', function (e) {
        e.preventDefault();  // Prevent the default form submission

        const formData = new FormData(form);  // Create FormData object from the form

        // Send the data using fetch API (AJAX)
        document.getElementById("formModaledit").style.display = "none";

        fetch(form.action, {
            method: 'PUT',  // Can use PUT for update
            headers: {
              'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
              'tanggal_anjuranDosen' : document.getElementById('tanggal-anjuran').value,
              'waktu_anjuranDosen': document.getElementById('waktu-anjuran').value,
              'catatan_dosen': document.getElementById('catatan-banding').value,
            })  
        })
        .then(response => response.json())  // Parse the JSON response from server
        .then(data => {
          if (data.success) {
            Swal.fire({
              title: "Pengajuan dibanding!",
              text: "Pengajuan Mahasiswa telah dibanding.",
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
              text: "Pengajuan Mahasiswa gagal dibanding.",
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


// form terima
document.querySelectorAll(".btnmuncul").forEach(button => {
  button.addEventListener('click', function () {

    const modal = document.querySelector('#formModaledit');
    const form = modal.querySelector('#terima');

    const kodePengajuan = this.dataset.kodepengajuan;

    // Set action URL
    form.action = `/dosen/pengajuan/terimaPengajuan/${kodePengajuan}`;


    // Show modal
    modal.classList.add('show');
    modal.style.display = 'flex';

    // Handle form submission with AJAX
    form.addEventListener('submit', function (e) {
        e.preventDefault();  // Prevent the default form submission

        // Prepare data to send
        const formData = {
          'jenis_bimbingan': document.querySelector('#jenis-bimbingan').value,
          'tempat': document.querySelector('#ruangan').value,
          'catatan_dosen': document.querySelector('#catatan-terima').value,
        };

        // console.log(formData)

        // Check if the required fields are filled
        if (formData.jenis_bimbingan === "default" || formData.ruangan === "" || formData.catatan_dosen === "") {
          Swal.fire({
            title: "Form Tidak Lengkap!",
            text: "Harap isi semua kolom yang wajib.",
            icon: "warning",
            confirmButtonColor: "#22a0b8",
          });
          return;
        }

        // Send the data using fetch API
        document.getElementById("formModaledit").style.display = "none";

        fetch(form.action, {
            method: 'PUT',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            Swal.fire({
              title: "Pengajuan Diterima!",
              text: "Pengajuan Mahasiswa berhasil diterima.",
              icon: "success",
              confirmButtonColor: "#22a0b8",
            }).then(() => {
              const modal = document.querySelector('#formModaledit');
              modal.classList.remove('show');
              modal.style.display = 'none';
              location.reload(); // Refresh halaman
            });
          } else {
            Swal.fire({
              title: "Gagal Diterima!",
              text: "Pengajuan Mahasiswa gagal diproses.",
              icon: "error",
              confirmButtonColor: "#22a0b8",
            }).then(() => {
              location.reload(); // Refresh halaman
            });
          }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
              title: "Terjadi Kesalahan!",
              text: "Coba lagi nanti.",
              icon: "error",
              confirmButtonColor: "#22a0b8",
            });
        });
    });
  });
});


//======================== INI BAGIAN PENGATURAN RANGE TANGGAL DOSEN ===============================================================================

// Fungsi untuk memformat tanggal menjadi `YYYY-MM-DD`
const formatDate = (date) => {
  const year = date.getFullYear();
  const month = (date.getMonth() + 1).toString().padStart(2, "0"); // Bulan berbasis indeks (0-11)
  const day = date.getDate().toString().padStart(2, "0");
  return `${year}-${month}-${day}`;
};

// Fungsi untuk menghitung batas tanggal min dan max
const calculateMinMaxDates = (daysAheadMin, daysAheadMax) => {
  const today = new Date();

  // Tentukan tanggal minimum
  const minDate = new Date(today);
  minDate.setDate(today.getDate() + daysAheadMin);

  // Tentukan tanggal maksimum
  const maxDate = new Date(today);
  maxDate.setDate(today.getDate() + daysAheadMax);

  return {
      min: formatDate(minDate),
      max: formatDate(maxDate),
  };
};

// Fungsi untuk menetapkan atribut `min` dan `max` pada elemen input
const setMinMaxDate = (inputElement, daysAheadMin = 1, daysAheadMax = 30) => {
  const { min, max } = calculateMinMaxDates(daysAheadMin, daysAheadMax);

  inputElement.setAttribute("min", min);
  inputElement.setAttribute("max", max);

  console.log(`Min date: ${min}, Max date: ${max} for #${inputElement.id}`);
};

// Tetapkan untuk elemen dengan ID `tanggal-anjuran` dan elemen lain
const inputDate1 = document.getElementById("tanggal-anjuran");
const inputDate2 = document.getElementById("tanggal-banding"); // Jika ada elemen lain

if (inputDate1) {
  setMinMaxDate(inputDate1);
}

if (inputDate2) {
  setMinMaxDate(inputDate2, 2, 45); // Misalnya, batas berbeda untuk input lain
}
