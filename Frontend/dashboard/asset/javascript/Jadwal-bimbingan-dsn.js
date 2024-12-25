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
btnTunda.addEventListener('click', openModal);

// Validasi saat formulir dikirimkan
formTunda.addEventListener('submit', function (e) {
    e.preventDefault(); // Mencegah form terkirim

    const tanggalAnjuran = document.querySelector('#tanggal-anjuran').value;
    const waktuAnjuran = document.querySelector('#waktu-anjuran').value;
    const catatanTunda = document.querySelector('#catatan-tunda').value;

    // Periksa apakah semua input sudah diisi
    if (!tanggalAnjuran || !waktuAnjuran || !catatanTunda) {
        Swal.fire({
            icon: 'warning',
            title: 'Input Tidak Lengkap',
            text: 'Harap isi semua bidang sebelum mengirimkan!',
            confirmButtonText: 'OK',
            confirmButtonColor: '#22a0b8',
        });
    } else {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Penundaan berhasil diajukan!',
            confirmButtonText: 'OK',
            confirmButtonColor: '#22a0b8',
        }).then(() => {
            closeModalHandler(); // Tutup modal setelah sukses
            formTunda.reset(); // Reset form
        });
    }
});


// Alert saat mahasiswa/dosen ingin membatalkan bimbingan yang sedang berlangsung
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll(".btn-tolak").forEach((button) => {
        button.addEventListener("click", async function () {
            const userRole = button.getAttribute("data-role");

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
                    Swal.fire({
                        title: "Jadwal Dibatalkan!",
                        text: `Jadwal berhasil dibatalkan dengan alasan: "${reason}"`,
                        icon: "success",
                        confirmButtonColor: "#22a0b8"
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





