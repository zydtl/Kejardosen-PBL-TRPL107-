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
const openButtons = document.querySelectorAll('.btnkeren');
openButtons.forEach(button => {
  button.addEventListener('click', openModal); // Tambahkan event listener ke setiap tombol
});

// Seleksi tombol "X" untuk menutup modal
const closeButton = document.querySelector('.close-modal');
closeButton.addEventListener('click', closeModal);

// Tutup modal jika klik di luar modal
window.addEventListener('click', (event) => {
  if (event.target === formModal) {
    closeModal();
  }
});


