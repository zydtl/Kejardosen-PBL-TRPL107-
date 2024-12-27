// Menangani klik tombol untuk menampilkan modal
document.querySelector('.atur-jadwal-btn').addEventListener('click', function() {
    document.querySelector('.modalAturHari').style.display = 'flex';
});

document.getElementById("btn-simpan").addEventListener('click', function() {
    document.querySelector('.modalAturHari').style.display = 'none';
});



// Mendapatkan elemen-elemen checkbox, modal, dan tombol simpan
const checkboxes = document.querySelectorAll("#form-atur-hari input[type='checkbox']");
const btnSimpan = document.getElementById("btn-simpan");

// Fungsi untuk mengupdate warna elemen berdasarkan checkbox
function updateColors() {
    checkboxes.forEach((checkbox) => {
        const relatedHari = document.querySelector(`#kondisi-${checkbox.id}`);
        if (checkbox.checked) {
            relatedHari.classList.add("checked"); // Tambahkan kelas jika di ceklis
        } else {
            relatedHari.classList.remove("checked"); // Hapus kelas jika tidak ceklis
        }
    });
}

// Tambahkan event listener pada tombol Simpan
btnSimpan.addEventListener("click", () => {
    updateColors(); // Update warna elemen hari
});