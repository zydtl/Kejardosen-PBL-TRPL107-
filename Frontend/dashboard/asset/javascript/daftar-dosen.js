// JS MODAL tambah =======================================================================================
const modalDosen = document.getElementById('formModalAdminDosen');
const btnTambahDosen = document.getElementById('tambah-dsn'); // ID tombol untuk membuka modal
const btnCloseDosen = document.getElementById('closeFormDosen'); // ID tombol batalkan modal

// Fungsi untuk membuka modal
btnTambahDosen.addEventListener('click', () => {
    modalDosen.classList.add('show'); // Menambahkan class show
    modalDosen.querySelector('.modal1').classList.add('show');
});

// Fungsi untuk menutup modal
btnCloseDosen.addEventListener('click', () => {
    modalDosen.classList.remove('show'); // Menghapus class show
    modalDosen.querySelector('.modal1').classList.remove('show');
});


// JS MODAL info =======================================================================================
// Ambil elemen modal
const infoModalDosen = document.getElementById('infoModalAdminDosen');
const closeInfoDosen = document.getElementById('closeInfoDosen');

// Event Delegation: Tangkap klik tombol info di seluruh halaman
document.addEventListener('click', (e) => {
    if (e.target.closest('.btn-info-dsn')) { // Pastikan tombol yang ditekan adalah info dosen
        infoModalDosen.classList.remove('hide'); // Tampilkan modal
        infoModalDosen.classList.add('show');
    }
});

// Fungsi untuk menutup modal
closeInfoDosen.addEventListener('click', () => {
    infoModalDosen.classList.remove('show');
    infoModalDosen.classList.add('hide');
});

document.getElementById('infoModalAdminDosen').addEventListener('click', function (e) {
    if (e.target === this) {
        // Menyembunyikan modal jika klik di luar konten modal
        document.getElementById('infoModalAdminDosen').classList.remove('show');
    }
});



// JS MODAL edit =======================================================================================
// Ambil elemen modal
const editModalDosen = document.getElementById('editModalAdminDosen');
const closeeditDosen = document.getElementById('closeEditDosen');

// Event Delegation: Tangkap klik tombol info di seluruh halaman
document.addEventListener('click', (e) => {
    if (e.target.closest('.btn-edit-dsn')) { // Pastikan tombol yang ditekan adalah info dosen
        editModalDosen.classList.remove('hide'); // Tampilkan modal
        editModalDosen.classList.add('show');
    }
});

// Fungsi untuk menutup modal
closeeditDosen.addEventListener('click', () => {
    editModalDosen.classList.remove('show');
    editModalDosen.classList.add('hide');
});



//=======================ALERT KONFIRMASI SWEET ALERT=============================================================================
// Data dosen berhasil ditambah
const formDosen = document.getElementById("formDosen");
formDosen.addEventListener("submit", function (e) {
    e.preventDefault(); // Mencegah submit form default
    Swal.fire({
        title: "Berhasil!",
        text: "Data dosen berhasil disimpan.",
        icon: "success",
        confirmButtonColor: "#22a0b8",
    });
    formModalAdminDosen.style.display = "none";
}
);



// Hapus Dosen (Tampilkan Modal Saja)
document.addEventListener("click", (event) => {
    if (event.target.closest(".btn-hapus-dsn")) {
        const row = event.target.closest(".table-row");
        const dosen = row.querySelector(".col-1").textContent.trim();

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: `Dosen "${dosen}" akan dihapus dari daftar!`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#22a0b8",
            cancelButtonColor: "#95dfea",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan notifikasi sukses
                Swal.fire({
                    title: "Berhasil!",
                    text: `Dosen "${dosen}" telah dihapus.`,
                    icon: "success",
                    confirmButtonColor: "#22a0b8",
                });

                // Logika backend (opsional, kirim permintaan ke server)
                console.log(`Dosen "${dosen}" dihapus (pengiriman ke backend).`);
            }
        });
    }
});
