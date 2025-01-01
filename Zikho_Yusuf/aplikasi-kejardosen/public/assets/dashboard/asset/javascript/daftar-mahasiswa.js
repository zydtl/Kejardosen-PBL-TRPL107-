// JS MODAL tambah =======================================================================================
// Ambil elemen form dan modal
// JS MODAL tambah =======================================================================================
const modal = document.getElementById("formModalAdmin");
const openModalButton = document.getElementById("tambah-mhs");
const closeModalButton = document.getElementById("closeFormAdmin");

// Fungsi untuk membuka modal
openModalButton?.addEventListener("click", function () {
    modal.style.display = "flex"; // Tampilkan modal
});

// Fungsi untuk menutup modal
closeModalButton?.addEventListener("click", function () {
    modal.style.display = "none"; // Sembunyikan modal
});

// Menutup modal jika klik di luar modal
window.addEventListener("click", function (event) {
    if (event.target == modal) {
        modal.style.display = "none"; // Sembunyikan modal jika klik di luar modal
    }
});

const formMahasiswa = document.querySelector("#formMhs");

// Tambahkan event listener pada form
formMahasiswa.addEventListener("submit", function (event) {
    event.preventDefault(); // Mencegah submit form default

    // Ambil nilai dari form
    const nama = document.getElementById("nama").value;
    const nim = document.getElementById("nim").value;
    const kelas = document.getElementById("kelas").value;
    const jenisKelamin = document.getElementById("jenisKelamin").value;
    const noTelp = document.getElementById("noTelp").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const judulTA = document.getElementById("judulTA").value;

    // Ambil nama dosen yang dipilih dan data nik_dosen
    const dosenPembimbingSelect = document.getElementById("dosenPembimbing");
    const nikDosen = dosenPembimbingSelect.value;
    
    // Tutup modal setelah submit
    modal.style.display = "none";

    // Kirim data ke server menggunakan Fetch API
    fetch("/admin/daftar-mahasiswa", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute("content")
        },
        body: JSON.stringify({
            "nama_mahasiswa": nama,
            "nim": nim,
            "kelas": kelas,
            "jenis_kelamin": jenisKelamin,
            "no_telp": noTelp,
            "email": email,
            "password": password,
            "judul_tugas_akhir": judulTA,
            "nik_dosen": nikDosen
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: "Berhasil!",
                    text: "Mahasiswa berhasil ditambahkan.",
                    icon: "success",
                    confirmButtonColor: "#22a0b8",
                }).then(() => {
                    location.reload(); // Refresh halaman setelah berhasil
                });
            } else {
                Swal.fire({
                    title: "Gagal!",
                    text: "Mahasiswa gagal ditambahkan.",
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




// JS MODAL INFO =======================================================================================
// Ambil elemen modal di luar scope agar dapat digunakan di seluruh fungsi
const infoModalMahasiswa = document.getElementById('infoModalAdmin');

// Event Delegation: Tangkap klik tombol info di seluruh halaman
document.addEventListener('click', (e) => {
    if (e.target.closest('.btn-info-mhs')) {
        // Tampilkan modal
        infoModalMahasiswa.classList.add('show');

        const btn = e.target.closest('.btn-info-mhs'); // Tombol yang diklik

        // Ambil data dari atribut dataset
        const nim = btn.getAttribute("data-nim");
        const nama = btn.getAttribute("data-nama_mahasiswa");
        const password = btn.getAttribute("data-password");
        const email = btn.getAttribute("data-email");
        const no_telp = btn.getAttribute("data-no_telp");
        const kelas = btn.getAttribute("data-kelas");
        const jenis_kelamin = btn.getAttribute("data-jenis_kelamin");
        const nama_dosen = btn.getAttribute("data-nik_dosen");
        const judul_tugas_akhir = btn.getAttribute("data-judul_tugas_akhir");

        // Isi modal dengan data
        infoModalMahasiswa.querySelector('#nim').innerText = nim;
        infoModalMahasiswa.querySelector('#nama').innerText = nama;
        // infoModalMahasiswa.querySelector('#password').innerText = passwo rd;
        infoModalMahasiswa.querySelector('#email').innerText = email;
        infoModalMahasiswa.querySelector('#noTelp').innerText = no_telp;
        infoModalMahasiswa.querySelector('#kelas').innerText = kelas;
        infoModalMahasiswa.querySelector('#jenisKelamin').innerText = jenis_kelamin;
        infoModalMahasiswa.querySelector('#dosenPembimbing').innerText = nama_dosen;
        infoModalMahasiswa.querySelector('#judulTA').innerText = judul_tugas_akhir;

        // Debug data untuk memastikan semuanya benar
        console.log(btn.dataset);
    }
});

// Tutup modal ketika tombol "Tutup" diklik
document.getElementById('closeInfoAdmin').addEventListener('click', () => {
    infoModalMahasiswa.classList.remove('show');
});

// Tutup modal jika klik di luar konten modal
infoModalMahasiswa.addEventListener('click', function (e) {
    if (e.target === this) {
        infoModalMahasiswa.classList.remove('show');
    }
});


// JS MODAL EDIT =======================================================================================
document.querySelectorAll('.btn-edit-mhs').forEach(button => {
    button.addEventListener('click', function () {

        const modal = document.querySelector('#editModalAdmin');
        const form = modal.querySelector('form');
        
        // Ambil data dari data atribut button
        const nim = this.dataset.nim;
        const nama_mahasiswa = this.dataset.nama_mahasiswa;
        const password = this.dataset.password;
        const email = this.dataset.email;
        const no_telp = this.dataset.no_telp;
        const kelas = this.dataset.kelas;
        const jenis_kelamin = this.dataset.jenis_kelamin;
        const nik_dosen = this.dataset.nik_dosen;
        const judul_tugas_akhir = this.dataset.judul_tugas_akhir;

        // Set action URL untuk form (update mahasiswa)
        form.action = `/admin/daftar-mahasiswa/update/${nim}`;

        // Isi form modal dengan data yang diterima
        modal.querySelector('#nim_edit').value = nim;
        modal.querySelector('#nama_edit').value = nama_mahasiswa;
        modal.querySelector('#email_edit').value = email;
        modal.querySelector('#noTelp_edit').value = no_telp;
        modal.querySelector('#kelas_edit').value = kelas;
        modal.querySelector('#jenisKelamin_edit').value = jenis_kelamin;
        modal.querySelector('#judulTA_edit').value = judul_tugas_akhir;

        // Set dosen pembimbing (menandai dosen yang sudah dipilih)
        modal.querySelector('#dosenPembimbing_edit').value = nik_dosen;

        // Show modal
        modal.style.display = "flex"; // atau modal.classList.add('show') jika menggunakan kelas CSS

        // Handle form submission dengan AJAX
        form.addEventListener('submit', function (e) {
            e.preventDefault();  // Prevent the default form submission

            const formData = new FormData(form);  // Create FormData object from the form
            modal.style.display = "none"; // atau modal.classList.add('show') jika menggunakan kelas CSS

            // Mengirim data menggunakan fetch API (AJAX)
            fetch(form.action, {
                method: 'PUT',  // Untuk update data
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    'nim': document.getElementById('nim_edit').value,
                    'nama_mahasiswa': document.getElementById('nama_edit').value,
                    'password': document.getElementById('password_edit').value,
                    'email': document.getElementById('email_edit').value,
                    'no_telp': document.getElementById('noTelp_edit').value,
                    'kelas': document.getElementById('kelas_edit').value,
                    'jenis_kelamin': document.getElementById('jenisKelamin_edit').value,
                    'nik_dosen': document.getElementById('dosenPembimbing_edit').value,
                    'judul_tugas_akhir': document.getElementById('judulTA_edit').value,
                })
            })
                .then(response => response.json())  // Parse the JSON response from server
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: "Data Mahasiswa Diubah!",
                            text: "Data mahasiswa berhasil diubah.",
                            icon: "success",
                            confirmButtonColor: "#22a0b8",
                        }).then(() => {
                            modal.style.display = 'none';
                            location.reload();  // Refresh halaman setelah data diubah
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal Diubah!",
                            text: "Data mahasiswa gagal diubah.",
                            icon: "error",
                            confirmButtonColor: "#22a0b8",
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

// Fungsi reset form
function resetForm() {
    document.getElementById('nama_edit').value = '';
    document.getElementById('nim_edit').value = '';
    document.getElementById('kelas_edit').value = '';
    document.getElementById('jenisKelamin_edit').value = '';
    document.getElementById('noTelp_edit').value = '';
    document.getElementById('email_edit').value = '';
    document.getElementById('password_edit').value = '';
    document.getElementById('judulTA_edit').value = '';
    document.getElementById('dosenPembimbing_edit').value = '';
}

// Menutup modal jika klik di luar modal
window.addEventListener("click", function(event) {
    const modal = document.querySelector('#editModalAdmin');
    if (event.target === modal) {
        modal.style.display = "none"; // Sembunyikan modal jika klik di luar modal
        resetForm(); // Reset form setelah modal ditutup
    }
});

// Menutup modal saat tombol Batalkan ditekan
const closeModal = document.querySelector("#closeEditAdmin");
closeModal.addEventListener("click", function() {
    const modal = document.querySelector('#editModalAdmin');
    modal.style.display = "none"; // Sembunyikan modal
    resetForm(); // Reset form setelah modal ditutup
});



// =================================================================================================
//Konfirmasi Hapus Hubungan
// Konfirmasi Hapus Mahasiswa
document.addEventListener("click", (event) => {
    if (event.target.closest(".btn-hapus-mhs")) {
        const row = event.target.closest(".table-row");
        const mahasiswa = row.querySelector(".col-1 .nama").textContent.trim();
        const nim = row.querySelector(".col-1 .nim_nik").textContent.trim(); // Ambil NIM mahasiswa
        console.log("NIM yang dikirim:", nim);

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: `Data mahasiswa "${mahasiswa}" beserta seluruh riwayat pengajuan, jadwal bimbingan, dan logbook akan dihapus!`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#22a0b8",
            cancelButtonColor: "#95dfea",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan notifikasi sedang menghapus
                Swal.fire({
                    title: "Menghapus...",
                    text: `Data mahasiswa "${mahasiswa}" sedang dihapus.`,
                    icon: "info",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });

                // Menunggu 3 detik sebelum melakukan permintaan DELETE
                setTimeout(() => {
                    // Kirim permintaan DELETE ke backend
                    fetch(`/admin/daftar-mahasiswa/destroy/${nim}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Tampilkan notifikasi sukses
                            Swal.fire({
                                title: "Berhasil!",
                                text: `Data mahasiswa "${mahasiswa}" telah dihapus.`,
                                icon: "success",
                                confirmButtonColor: "#22a0b8",
                            });

                            // Hapus baris di tabel
                            row.remove();
                        } else {
                            // Tampilkan notifikasi error
                            Swal.fire({
                                title: "Gagal!",
                                text: data.error || 'Terjadi kesalahan saat menghapus data mahasiswa.',
                                icon: "error",
                                confirmButtonColor: "#22a0b8",
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: "Terjadi kesalahan!",
                            text: "Gagal menghapus data mahasiswa.",
                            icon: "error",
                            confirmButtonColor: "#22a0b8",
                        });
                    });
                }, 3000); // 3 detik sebelum melakukan permintaan DELETE
            }
        });
    }
});




