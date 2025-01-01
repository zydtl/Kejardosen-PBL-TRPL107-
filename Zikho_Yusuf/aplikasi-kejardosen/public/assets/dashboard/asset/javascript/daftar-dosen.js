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
// Ambil elemen modal di luar scope agar dapat digunakan di seluruh fungsi
const infoModalDosen = document.getElementById('infoModalAdminDosen');

// Event Delegation: Tangkap klik tombol info di seluruh halaman
document.addEventListener('click', (e) => {
    if (e.target.closest('.btn-info-dsn')) {
        infoModalDosen.classList.remove('hide');
        infoModalDosen.classList.add('show');

        const btn = e.target.closest('.btn-info-dsn');

        // Ambil data dari atribut dataset menggunakan getAttribute
        const nama = btn.getAttribute("data-nama");
        const nik = btn.getAttribute("data-nik");
        const jenis_kelamin = btn.getAttribute("data-jenis_kelamin");
        const no_telp = btn.getAttribute("data-no_telp");
        const email = btn.getAttribute("data-email");
        const password = btn.getAttribute("data-password");

        // Gunakan innerText untuk mengisi modal dengan data
        infoModalDosen.querySelector('#nama').innerText = nama;
        infoModalDosen.querySelector('#nik').innerText = nik;
        infoModalDosen.querySelector('#jenisKelamin').innerText = jenis_kelamin;
        infoModalDosen.querySelector('#noTelp').innerText = no_telp;
        infoModalDosen.querySelector('#email').innerText = email;
        // infoModalDosen.querySelector('#password').innerText = password;

        // Debug data untuk memastikan semuanya benar
        console.log(btn.dataset); 
        console.log('Nama:', nama);
        console.log('NIK:', nik);
    }
});

// Tutup modal ketika tombol "Tutup" diklik
document.getElementById('closeInfoDosen').addEventListener('click', () => {
    infoModalDosen.classList.remove('show');
    infoModalDosen.classList.add('hide');
});

// Tutup modal jika klik di luar konten modal
infoModalDosen.addEventListener('click', function (e) {
    if (e.target === this) {
        infoModalDosen.classList.remove('show');
        infoModalDosen.classList.add('hide');
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
// const formDosen = document.getElementById("formDosen");
// formDosen.addEventListener("submit", function (e) {
//     e.preventDefault(); // Mencegah submit form default
//     Swal.fire({
//         title: "Berhasil!",
//         text: "Data dosen berhasil disimpan.",
//         icon: "success",
//         confirmButtonColor: "#22a0b8",
//     });
//     formModalAdminDosen.style.display = "none";
// }
// );



// Hapus Dosen (Tampilkan Modal Saja)
document.addEventListener("click", (event) => {
    if (event.target.closest(".btn-hapus-dsn")) {
        const row = event.target.closest(".table-row");
        const dosen = row.querySelector(".col-1").textContent.trim();
        const nik = row.querySelector(".col-2").textContent.trim(); // Ambil nik dari kolom yang sesuai

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
                // Tampilkan notifikasi sedang menghapus
                Swal.fire({
                    title: "Menghapus...",
                    text: `Dosen "${dosen}" sedang dihapus.`,
                    icon: "info",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });

                // Menutup modal setelah 3 detik (3000 milidetik)
                setTimeout(() => {
                    // Kirim permintaan DELETE ke backend
                    fetch(`/admin/daftar-dosen/destroy/${nik}`, {
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
                                text: `Dosen "${dosen}" telah dihapus.`,
                                icon: "success",
                                confirmButtonColor: "#22a0b8",
                            });

                            // Hapus baris di tabel
                            row.remove();
                        } else {
                            // Tampilkan notifikasi error
                            Swal.fire({
                                title: "Gagal!",
                                text: data.error || 'Terjadi kesalahan saat menghapus dosen.',
                                icon: "error",
                                confirmButtonColor: "#22a0b8",
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: "Terjadi kesalahan!",
                            text: "Gagal menghapus dosen.",
                            icon: "error",
                            confirmButtonColor: "#22a0b8",
                        });
                    });
                }, 3000); // 3 detik sebelum melakukan permintaan DELETE
            }
        });
    }
});




// tambah dosen
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
                    text: "Dosen berhasil ditambahkan.",
                    icon: "success",
                    confirmButtonColor: "#22a0b8",
                }).then(() => {
                    // Refresh halaman atau bisa lakukan update UI sesuai kebutuhan
                    location.reload();  // Contoh untuk refresh halaman
                });
            } else {
                Swal.fire({
                    title: "Gagal!",
                    text: "Dosen gagal ditambahkan.",
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
        const nama = this.dataset.nama;
        // const password = this.dataset.password;
        const jenis_kelamin = this.dataset.jenis_kelamin;
        const no_telp = this.dataset.no_telp;
        const email = this.dataset.email;

        // Set action URL
        form.action = `/admin/daftar-dosen/update/${nik}`;
        // console.log(form.action)
        // /mahasiswa/pengajuan/${kodePengajuan}/batalkan

        // Set modal inputs
        modal.querySelector('#nik_edit').value = nik;
        modal.querySelector('#nama_edit').value = nama;
        modal.querySelector('#password_edit').value = "";
        modal.querySelector('#jenisKelamin_edit').value = jenis_kelamin;
        modal.querySelector('#no_telp_edit').value = no_telp;
        modal.querySelector('#email_edit').value = email;

        // Show modal
        modal.classList.add('show');
        // modal.style.display = 'flex';

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
                    'nik': document.getElementById('nik_edit').value,
                    'nama_dosen': document.getElementById('nama_edit').value,
                    'password': document.getElementById('password_edit').value,
                    'jenis_kelamin': document.getElementById('jenisKelamin_edit').value,
                    'no_telp': document.getElementById('no_telp_edit').value,
                    'email': document.getElementById('email_edit').value,
                })
            })
                .then(response => response.json())  // Parse the JSON response from server
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: "Data dosen diubah!",
                            text: "Data dosen telah diubah.",
                            icon: "success",
                            confirmButtonColor: "#22a0b8",
                        }).then(() => {
                            // const modal = document.querySelector('#formModaledit');
                            modal.classList.remove('show');
                            modal.style.display = 'none';
                            location.reload();  // Refresh halaman setelah status dibatalkan
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal Diubah!",
                            text: "Data dosen gagal diubah.",
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