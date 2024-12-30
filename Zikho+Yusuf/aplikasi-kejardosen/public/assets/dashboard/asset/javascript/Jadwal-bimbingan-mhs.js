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
                    // Kirim data ke server menggunakan AJAX
                    const kodeJadwal = button.getAttribute("data-kode");

                    fetch(`/mahasiswa/jadwal-bimbingan/batalkan/${kodeJadwal}`, {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            catatan_mahasiswa: reason
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

// JS VERIFIKASI BIMBINGAN SELESAI MAHASISWA
document.addEventListener('DOMContentLoaded', function () {
    const btnSelesaiList = document.querySelectorAll('.btn-selesai');
    
    // Loop untuk setiap tombol selesai
    btnSelesaiList.forEach(function (btnSelesai) {
        btnSelesai.addEventListener('click', function (e) {
            e.preventDefault();

            // Ambil kode jadwal dari tombol yang diklik
            const kodeJadwal = btnSelesai.getAttribute('data-kode');

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
                    // Kirim permintaan ke server
                    fetch(`/mahasiswa/jadwal-bimbingan/selesai/${kodeJadwal}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Ambil token CSRF
                        },
                        body: JSON.stringify({}), // Sesuaikan jika ada data tambahan
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
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
                                }).then(() => {
                                    // Reload halaman atau lakukan tindakan lainnya
                                    location.reload();
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat memproses permintaan.',
                                confirmButtonColor: '#22a0b8',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat menghubungi server.',
                            confirmButtonColor: '#22a0b8',
                        });
                    });
                }
            });
        });
    });
});







