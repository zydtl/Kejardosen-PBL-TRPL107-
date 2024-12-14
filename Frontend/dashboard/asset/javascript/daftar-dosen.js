  // Modal untuk Tambah Dosen
document.getElementById('tambah-dsn').addEventListener('click', function () {
    Swal.fire({
        title: 'Tambah Dosen',
        html: `
            <form id="formTambahDsn" style="text-align: left; margin: 0 auto; width: 100%; max-width: 400px;">
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="nama" style="display: block; margin-bottom: 5px; font-weight: bold;">Nama:</label>
                    <input type="text" id="nama" class="swal2-input" style="width: 100%; padding: 10px; font-size: 14px;" placeholder="Nama Dosen" required>
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="nik" style="display: block; margin-bottom: 5px; font-weight: bold;">NIK/NIDN:</label>
                    <input type="text" id="nik" class="swal2-input" style="width: 100%; padding: 10px; font-size: 14px;" placeholder="NIK atau NIDN" required>
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="program_studi" style="display: block; margin-bottom: 5px; font-weight: bold;">Program Studi:</label>
                    <input type="text" id="program_studi" class="swal2-input" style="width: 100%; padding: 10px; font-size: 14px;" placeholder="Program Studi" required>
                </div>
            </form>
        `,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Tambah',
        cancelButtonText: 'Batal',
        customClass: {
            popup: 'swal2-modal-custom' // Tambahkan class custom
        },
        preConfirm: () => {
            const nama = document.getElementById('nama').value;
            const nik = document.getElementById('nik').value;
            const programStudi = document.getElementById('program_studi').value;

            if (!nama || !nik || !programStudi) {
                Swal.showValidationMessage('Semua kolom harus diisi!');
                return false;
            }

            // Simulasi pengiriman data ke server
          console.log('Data Dosen:', { nama, nik, programStudi });

          // Tampilkan modal konfirmasi berhasil
          setTimeout(() => { // Simulasikan proses (misalnya, API call)
              Swal.fire({
                  icon: 'success',
                  title: 'Berhasil!',
                  text: 'Data dosen berhasil ditambahkan.',
                  confirmButtonText: 'OK'
              });
          }, 500); // Waktu delay untuk efek respons

          return { nama, nik, programStudi };
      }
  });
});


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
