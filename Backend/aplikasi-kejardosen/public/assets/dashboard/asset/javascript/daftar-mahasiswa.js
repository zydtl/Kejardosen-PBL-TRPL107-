// Hapus Dosen (Tampilkan Modal Saja)
document.addEventListener("click", (event) => {
  if (event.target.closest(".btn-hapus-mhs")) {
      const row = event.target.closest(".table-row");
      const mahasiswa = row.querySelector(".col-1").textContent.trim();

      Swal.fire({
          title: "Apakah Anda yakin?",
          text: `Mahasiswa "${mahasiswa}" akan dihapus dari daftar!`,
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
                  text: `Mahasiswa "${mahasiswa}" telah dihapus.`,
                  icon: "success",
                  confirmButtonColor: "#22a0b8",
              });

              // Logika backend (opsional, kirim permintaan ke server)
              console.log(`Mahasiswa "${mahasiswa}" dihapus (pengiriman ke backend).`);
          }
      });
  }
});

 // Modal untuk Tambah Mahasiswa
document.getElementById('tambah-mhs').addEventListener('click', function () {
  Swal.fire({
      title: 'Tambah Mahasiswa',
      html: `
          <form id="formTambahMhs" style="text-align: left; margin: 0 auto; width: 100%; max-width: 400px;">
              <div class="form-group" style="margin-bottom: 15px;">
                  <label for="nama" style="display: block; margin-bottom: 5px; font-weight: bold;">Nama:</label>
                  <input type="text" id="nama" class="swal2-input" style="width: 100%; padding: 10px; font-size: 14px;" placeholder="Nama Mahasiswa" required>
              </div>
              <div class="form-group" style="margin-bottom: 15px;">
                  <label for="nim" style="display: block; margin-bottom: 5px; font-weight: bold;">NIM:</label>
                  <input type="text" id="nim" class="swal2-input" style="width: 100%; padding: 10px; font-size: 14px;" placeholder="NIM Mahasiswa" required>
              </div>
              <div class="form-group" style="margin-bottom: 15px;">
                  <label for="kelas" style="display: block; margin-bottom: 5px; font-weight: bold;">Kelas:</label>
                  <input type="text" id="kelas" class="swal2-input" style="width: 100%; padding: 10px; font-size: 14px;" placeholder="Kelas Mahasiswa" required>
              </div>
          </form>
      `,
      focusConfirm: false,
      showCancelButton: true,
      confirmButtonText: 'Tambah',
      cancelButtonText: 'Batal',
      customClass: {
          popup: 'swal2-modal-custom' // Tetap menggunakan class custom
      },
      preConfirm: () => {
          const nama = document.getElementById('nama').value;
          const nim = document.getElementById('nim').value;
          const kelas = document.getElementById('kelas').value;

          if (!nama || !nim || !kelas) {
              Swal.showValidationMessage('Semua kolom harus diisi!');
              return false;
          }

          // Simulasi pengiriman data ke server
          console.log('Data Mahasiswa:', { nama, nim, kelas });

          // Tampilkan modal konfirmasi berhasil
          setTimeout(() => { // Simulasikan proses (misalnya, API call)
              Swal.fire({
                  icon: 'success',
                  title: 'Berhasil!',
                  text: 'Data mahasiswa berhasil ditambahkan.',
                  confirmButtonText: 'OK'
              });
          }, 500); // Waktu delay untuk efek respons

          return { nama, nim, kelas };
      }
  });
});

