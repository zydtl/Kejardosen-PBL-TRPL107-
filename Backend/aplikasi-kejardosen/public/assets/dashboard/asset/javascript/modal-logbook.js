// Ambil elemen modal, tombol, dan tombol tutup
const btnProfil = document.querySelector('.btn-profil');
const modal = document.querySelector('#modal-profil');
const closeModal = document.querySelector('.close-modal');

// Fungsi untuk membuka modal
btnProfil.addEventListener('click', function() {
    modal.classList.add('show'); // Menampilkan modal
});

// Fungsi untuk menutup modal
closeModal.addEventListener('click', function() {
    modal.classList.remove('show'); // Menyembunyikan modal
});

// Jika pengguna mengklik di luar modal, tutup modal
window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.classList.remove('show');
    }
});