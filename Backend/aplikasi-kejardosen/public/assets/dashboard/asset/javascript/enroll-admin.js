
//Untuk memunculkan form pengajuan di halaman dosen
// Seleksi elemen modal
const formModal1 = document.getElementById('formModaldeletecapek');

// Fungsi untuk menampilkan modal
const openModal1 = () => {
  formModal1.style.display = 'flex'; // Tampilkan modal
};

// Fungsi untuk menutup modal   
const closeModal1 = () => {
  formModal1.style.display = 'none'; // Sembunyikan modal
};

// Seleksi semua tombol dengan class 'open-modal'
const openButtons1 = document.querySelectorAll('.fine');
openButtons1.forEach(button => {
  button.addEventListener('click', openModal1); // Tambahkan event listener ke setiap tombol
});

// Seleksi tombol "X" untuk menutup modal
const closeButton1 = document.querySelector('.fun');
closeButton1.addEventListener('click', closeModal1);

// Tutup modal jika klik di luar modal
window.addEventListener('click', (event) => {
  if (event.target === formModal1) {
    closeModal1();
  }
});
  


//Untuk memunculkan form pengajuan di halaman dosen
// Seleksi elemen modal
const formModal = document.getElementById('formModaledit');

// Fungsi untuk menampilkan modal
const openModal = () => {
  formModal.style.display = 'flex'; // Tampilkan modal
};

// Fungsi untuk menutup modal   
const closeModal = () => {
  formModal.style.display = 'none'; // Sembunyikan modal
};

// Seleksi semua tombol dengan class 'open-modal'
const openButtons = document.querySelectorAll('.master');
openButtons.forEach(button => {
  button.addEventListener('click', openModal); // Tambahkan event listener ke setiap tombol
});

// Seleksi tombol "X" untuk menutup modal
const closeButton = document.querySelector('.btn-secondary1');
closeButton.addEventListener('click', closeModal);

// Tutup modal jika klik di luar modal
window.addEventListener('click', (event) => {
  if (event.target === formModal) {
    closeModal();
  }
});
