// Ambil semua tombol dengan kelas btn-profil
const btnProfilList = document.querySelectorAll('.btn-profil');
const modal = document.querySelector('#modal-profil');
const closeModal = modal.querySelector('.close-modal');

// Tambahkan event listener ke setiap button
btnProfilList.forEach((btn) => {
    btn.addEventListener('click', function () {
        // Ambil data dari atribut data-*
        const nama = btn.getAttribute('data-nama');
        const nim = btn.getAttribute('data-nim');
        const email = btn.getAttribute('data-email');
        const noTelp = btn.getAttribute('data-no_telp');
        const judulTugasAkhir = btn.getAttribute('data-judul_tugas_akhir');
        const jenisKelamin = btn.getAttribute('data-jenis_kelamin');
        const kelas = btn.getAttribute('data-kelas');

        // Isi modal dengan data yang diambil
        modal.querySelector('.student-info').innerHTML = `
            <p><strong>Nama:</strong> ${nama}</p>
            <p><strong>NIM:</strong> ${nim}</p>
            <p><strong>Email:</strong> ${email}</p>
            <p><strong>No Telepon:</strong> ${noTelp}</p>
            <p><strong>Judul Tugas Akhir:</strong> ${judulTugasAkhir}</p>
            <p><strong>Jenis Kelamin:</strong> ${jenisKelamin}</p>
            <p><strong>Kelas:</strong> ${kelas}</p>
        `;

        // Tampilkan modal
        modal.classList.add('show');
    });
});

// Tutup modal saat tombol close diklik
closeModal.addEventListener('click', function () {
    modal.classList.remove('show');
});

// Tutup modal jika pengguna mengklik di luar area modal
window.addEventListener('click', function (event) {
    if (event.target === modal) {
        modal.classList.remove('show');
    }
});

btnProfilList.forEach((btn) => {
    btn.addEventListener('click', function () {
        console.log('Nama:', btn.getAttribute('data-nama'));
        console.log('NIM:', btn.getAttribute('data-nim'));
        console.log('Email:', btn.getAttribute('data-email'));
        console.log('No Telepon:', btn.getAttribute('data-no_telp'));
    });
});
