// modal hubungkan mahasiswa
document.getElementById("hubungkan").addEventListener("click", async () => {
    const { value: selectedOptions } = await Swal.fire({
      title: "Hubungkan Mahasiswa dan Dosen",
      html: `
        <div class="modal-container">
          <label for="mahasiswa" class="modal-label">Pilih Mahasiswa</label>
          <select id="mahasiswa" class="modal-select">
            <option value="">-- Pilih Mahasiswa --</option>
            <option value="mhs1">Mahasiswa 1</option>
            <option value="mhs2">Mahasiswa 2</option>
            <option value="mhs3">Mahasiswa 3</option>
          </select>
          <label for="dosen" class="modal-label">Pilih Dosen</label>
          <select id="dosen" class="modal-select">
            <option value="">-- Pilih Dosen --</option>
            <option value="dsn1">Dosen 1</option>
            <option value="dsn2">Dosen 2</option>
            <option value="dsn3">Dosen 3</option>
          </select>
        </div>
      `,
      focusConfirm: false,
      showCancelButton: true,
      cancelButtonColor: "#95DFEA",
      cancelButtonText: "Batal",
      confirmButtonColor: "#3EBCD2",
      confirmButtonText: "Hubungkan",
      preConfirm: () => {
        const mahasiswa = document.getElementById("mahasiswa").value;
        const dosen = document.getElementById("dosen").value;
  
        if (!mahasiswa || !dosen) {
          Swal.showValidationMessage("Kedua pilihan harus diisi!");
          return null;
        }
        return { mahasiswa, dosen };
      }
    });
  
    if (selectedOptions) {
      const { mahasiswa, dosen } = selectedOptions;
      Swal.fire(`Mahasiswa: ${mahasiswa}, Dosen: ${dosen}`);
    }
  });
  
  // edit hubungan
  document.addEventListener("click", async (event) => {
    if (event.target.closest(".btn-edit")) {
      const row = event.target.closest(".table-row");
  
      // Ambil data dari baris tabel yang diklik
      const mahasiswa = row.querySelector('.col-1').textContent.trim();
      const dosen = row.querySelector('.col-2').textContent.trim();
  
      // Tampilkan modal untuk mengedit data
      const { value: updatedOptions } = await Swal.fire({
        title: "Edit Hubungan Mahasiswa dan Dosen",
        html: `
          <div class="modal-container">
            <label for="mahasiswa" class="modal-label">Pilih Mahasiswa</label>
            <select id="mahasiswa" class="modal-select">
              <option value="mhs1" ${mahasiswa === "Muhammad Maulana Yusuf" ? "selected" : ""}>Muhammad Maulana Yusuf</option>
              <option value="mhs2" ${mahasiswa === "Mahasiswa 2" ? "selected" : ""}>Mahasiswa 2</option>
              <option value="mhs3" ${mahasiswa === "Mahasiswa 3" ? "selected" : ""}>Mahasiswa 3</option>
            </select>
            <label for="dosen" class="modal-label">Pilih Dosen</label>
            <select id="dosen" class="modal-select">
              <option value="dsn1" ${dosen === "Alena Uperiati.S.T.M.Cs" ? "selected" : ""}>Alena Uperiati.S.T.M.Cs</option>
              <option value="dsn2" ${dosen === "Dosen 2" ? "selected" : ""}>Dosen 2</option>
              <option value="dsn3" ${dosen === "Dosen 3" ? "selected" : ""}>Dosen 3</option>
            </select>
          </div>
        `,
        focusConfirm: false,
        showCancelButton: true,
        cancelButtonColor: "#95DFEA",
        cancelButtonText: "Batal",
        confirmButtonColor: "#3EBCD2",
        confirmButtonText: "Simpan",
        preConfirm: () => {
          const newMahasiswa = document.getElementById("mahasiswa").value;
          const newDosen = document.getElementById("dosen").value;
  
          if (!newMahasiswa || !newDosen) {
            Swal.showValidationMessage("Kedua pilihan harus diisi!");
            return null;
          }
          return { newMahasiswa, newDosen };
        }
      });
  
      if (updatedOptions) {
        // Perbarui data di baris tabel
        row.querySelector('.col-1').textContent = updatedOptions.newMahasiswa;
        row.querySelector('.col-2').textContent = updatedOptions.newDosen;
  
        Swal.fire(
          "Berhasil",
          `Hubungan telah diperbarui: Mahasiswa (${updatedOptions.newMahasiswa}) - Dosen (${updatedOptions.newDosen})`,
          "success"
        );
  
        // Jika diperlukan, tambahkan logika untuk memperbarui data di database
      }
    }
  });
  