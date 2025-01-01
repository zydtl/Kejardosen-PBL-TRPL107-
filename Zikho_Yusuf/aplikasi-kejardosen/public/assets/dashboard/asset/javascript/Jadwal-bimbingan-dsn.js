// Alert saat mahasiswa/dosen ingin membatalkan bimbingan yang sedang berlangsung
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll(".btn-tolak").forEach((button) => {
        button.addEventListener("click", async function () {
            const userRole = button.getAttribute("data-role");
            // const userRole = button.getAttribute("data-kode");

            const confirmation = await Swal.fire({
                title: "Apakah Anda yakin?",
                text:
                    userRole === "dosen"
                        ? "Jadwal yang telah diterima akan dibatalkan dan mahasiswa akan diberitahu."
                        : "Anda akan membatalkan bimbingan yang sedang berlangsung. Dosen akan diberitahu.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#22a0b8",
                cancelButtonColor: "#95dfea",
                confirmButtonText: userRole === "dosen" ? "Ya, batalkan jadwal!" : "Ya, batalkan bimbingan!",
                cancelButtonText: "Tidak, tetap lanjut!"
            });

            if (confirmation.isConfirmed) {
                const { value: reason } = await Swal.fire({
                    title: "Alasan Pembatalan",
                    input: "textarea",
                    inputLabel:
                        userRole === "dosen"
                            ? "Masukkan alasan pembatalan bimbingan untuk mahasiswa"
                            : "Masukkan alasan pembatalan bimbingan Anda",
                    inputPlaceholder: "Tuliskan alasan Anda di sini...",
                    inputAttributes: {
                        "aria-label": "Tuliskan alasan Anda di sini"
                    },
                    showCancelButton: true,
                    confirmButtonText: "Kirim",
                    cancelButtonText: "Batal",
                    confirmButtonColor: "#22a0b8",
                    cancelButtonColor: "#95dfea"
                });

                if (reason) {
                    // Kirim data ke server menggunakan AJAX
                    const kodeJadwal = button.getAttribute("data-kode");

                    fetch(`/dosen/jadwal-bimbingan/batalkan/${kodeJadwal}`, {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            catatan_dosen: reason
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: "Jadwal Dibatalkan!",
                                text: `Jadwal berhasil dibatalkan dengan alasan: "${reason}"`,
                                icon: "success",
                                confirmButtonColor: "#22a0b8"
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal Membatalkan",
                                text: "Terjadi kesalahan saat membatalkan jadwal.",
                                icon: "error",
                                confirmButtonColor: "#22a0b8"
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        Swal.fire({
                            title: "Kesalahan!",
                            text: "Terjadi kesalahan pada server.",
                            icon: "error",
                            confirmButtonColor: "#22a0b8"
                        });
                    });
                } else {
                    Swal.fire({
                        title: "Pembatalan Dibatalkan",
                        text: "Anda harus memberikan alasan pembatalan!",
                        icon: "info",
                        confirmButtonColor: "#22a0b8"
                    });
                }
            }
        });
    });
});


// JS MODAL TUNDA BIMBINGAN DOSEN

const modalTunda = document.querySelector('#formTundaDosen');
const closeModal = document.querySelector('.close-modal');
const modalOverlay = document.querySelector('.modal-overlay');
const btnTunda = document.querySelector('.btn-tunda');
const formTunda = document.querySelector('#tunda');

// Fungsi untuk membuka modal
function openModal() {
    modalTunda.classList.remove('hidden');
}

// Fungsi untuk menutup modal
function closeModalHandler() {
    modalTunda.classList.add('hidden');
}

// Event listener untuk tombol tutup
closeModal.addEventListener('click', closeModalHandler);

// Event listener untuk klik di luar modal (overlay)
modalOverlay.addEventListener('click', closeModalHandler);

// Buka modal saat tombol "Tunda" ditekan
// btnTunda.addEventListener('click', openModal);

// Validasi saat formulir dikirimkan
// formTunda.addEventListener('submit', function (e) {
//     e.preventDefault(); // Mencegah form terkirim

//     const tanggalAnjuran = document.querySelector('#tanggal-anjuran').value;
//     const waktuAnjuran = document.querySelector('#waktu-anjuran').value;
//     const catatanTunda = document.querySelector('#catatan-tunda').value;

//     // Periksa apakah semua input sudah diisi
//     if (!tanggalAnjuran || !waktuAnjuran || !catatanTunda) {
//         Swal.fire({
//             icon: 'warning',
//             title: 'Input Tidak Lengkap',
//             text: 'Harap isi semua bidang sebelum mengirimkan!',
//             confirmButtonText: 'OK',
//             confirmButtonColor: '#22a0b8',
//         });
//     } else {
//         Swal.fire({
//             icon: 'success',
//             title: 'Berhasil',
//             text: 'Penundaan berhasil diajukan!',
//             confirmButtonText: 'OK',
//             confirmButtonColor: '#22a0b8',
//         }).then(() => {
//             closeModalHandler(); // Tutup modal setelah sukses
//             formTunda.reset(); // Reset form
//         });
//     }
// });



document.querySelectorAll('.btn-tunda').forEach(button => {
    button.addEventListener('click', function () {

        const modal = document.querySelector('#formTundaDosen');
        const form = modal.querySelector('#tunda');

        const kodeJadwal = this.dataset.kode;

        const tanggal_bimbingan = this.dataset.tanggal_bimbingan;
        const waktu_bimbingan = this.dataset.waktu_bimbingan;
        const catatan_dosen = this.dataset.catatan_dosen;

        const tanggal_pengajuan = button.getAttribute("data-tanggal_pengajuan");
        const waktu_pengajuan = button.getAttribute("data-waktu_pengajuan");


        console.log(kodeJadwal)
        console.log(tanggal_bimbingan)
        console.log(waktu_bimbingan)
        console.log(tanggal_pengajuan)
        console.log(waktu_pengajuan)
        console.log(catatan_dosen)

        // Set action URL
        form.action = `/dosen/jadwal-bimbingan/tunda/${kodeJadwal}`;

        // /mahasiswa/pengajuan/${kodePengajuan}/batalkan

        // Set modal inputs

        modal.querySelector('#tanggal-tunda').value = tanggal_bimbingan;
        modal.querySelector('#waktu-tunda').value = waktu_bimbingan;
        modal.querySelector('#catatan-tunda').value = catatan_dosen;
        
        modal.querySelector('#tanggal_pengajuan').innerText = tanggal_pengajuan;
        modal.querySelector('#waktu_pengajuan').innerText = waktu_pengajuan;

        // Show modal
        // modal.classList.add('show');
        // modal.style.display = 'flex';
        openModal()

        // Handle form submission with AJAX
        form.addEventListener('submit', function (e) {
            e.preventDefault();  // Prevent the default form submission

            const formData = new FormData(form);  // Create FormData object from the form

            // Send the data using fetch API (AJAX)
            // modal.style.display = "none";

            fetch(form.action, {
                method: 'PUT',  // Can use PUT for update
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    'tanggal_bimbingan': document.getElementById('tanggal-tunda').value,
                    'waktu_bimbingan': document.getElementById('waktu-tunda').value,
                    'catatan_dosen': document.getElementById('catatan-tunda').value,
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
                            // const modal = document.querySelector('#formModaledit');
                            modal.classList.remove('show');
                            modal.style.display = 'none';

                            // closeModal()

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


// JS VERIFIKASI BIMBINGAN SELESAI MAHASISWA
document.addEventListener('DOMContentLoaded', function () {
    const btnSelesai = document.querySelector('.btn-selesai');
    
    if (btnSelesai) {
        btnSelesai.addEventListener('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Tandai sesi ini sebagai selesai.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#22a0b8',
                cancelButtonColor: '#95dfea',
                confirmButtonText: 'Ya, selesai!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Bimbingan Selesai',
                        text: 'Sesi bimbingan berhasil ditandai selesai!',
                        confirmButtonColor: '#22a0b8',
                    }).then(() => {
                        Swal.fire({
                            icon: 'info',
                            title: 'Pengingat!',
                            text: 'Harap segera melengkapi logbook Anda untuk sesi bimbingan ini.',
                            confirmButtonColor: '#22a0b8',
                        });
                    });
                }
            });
        });
    }
});





