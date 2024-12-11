// Alert saat mahasiswa/dosen ingin membatalkan bimbingan yang sedang berlangsung
// Tentukan peran pengguna berdasarkan atribut data-role di tombol
document.querySelectorAll(".btn-tolak").forEach((button) => {
    button.addEventListener("click", async function () {
        const userRole = button.getAttribute("data-role"); // "dosen" atau "mahasiswa"

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
                // Logika untuk mengirim alasan pembatalan ke backend
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