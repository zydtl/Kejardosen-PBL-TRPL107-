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



document.querySelector("#formDosen").addEventListener("submit", function (event) {
    event.preventDefault(); // Mencegah submit form default

    // Ambil nilai dari form
    const nama = document.getElementById('nama').value;
    const nik = document.getElementById('nik').value;
    const jenisKelamin = document.getElementById('jenisKelamin').value;
    const noTelp = document.getElementById('noTelp').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Tutup modal setelah submit
    modalDosen.classList.remove('show');
    modalDosen.querySelector('.modal1').classList.remove('show');

    // Kirim data ke server menggunakan Fetch API
    fetch('/admin/daftar-dosen', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            "nama": nama,
            "nik": nik,
            "jenis_kelamin": jenisKelamin,
            "no_telp": noTelp,
            "email": email,
            "password": password
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: "Berhasil!",
                    text: "Data dosen berhasil disimpan.",
                    icon: "success",
                    confirmButtonColor: "#22a0b8",
                }).then(() => {
                    // Refresh halaman atau bisa lakukan update UI sesuai kebutuhan
                    location.reload();  // Contoh untuk refresh halaman
                });
            } else {
                Swal.fire({
                    title: "Gagal!",
                    text: "Data dosen gagal disimpan.",
                    icon: "error",
                    confirmButtonColor: "#22a0b8",
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: "Error!",
                text: "Terjadi kesalahan saat mengirim data.",
                icon: "error",
                confirmButtonColor: "#22a0b8",
            });
            console.error("Error:", error);
        });
});



document.querySelectorAll('.btn-edit-dsn').forEach(button => {
    button.addEventListener('click', function () {

        const modal = document.querySelector('#editModalAdminDosen');
        const form = modal.querySelector('#formEditDosen');
        const nik = this.dataset.nik;
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
        modal.querySelector('#nik').value = nik;
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
            document.getElementById("formModal").style.display = "none";

            fetch(form.action, {
                method: 'PUT',  // Can use PUT for update
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    'nik': document.getElementById('nik').value,
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
                    } else {
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