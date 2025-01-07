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









document.querySelector('.atur-jadwal-btn').addEventListener('click', function(event) {
    // Ambil data dari tombol
    const button = event.currentTarget;
    document.getElementById('senin').checked = button.dataset.kondisi_senin == '1';
    document.getElementById('selasa').checked = button.dataset.kondisi_selasa == '1';
    document.getElementById('rabu').checked = button.dataset.kondisi_rabu == '1';
    document.getElementById('kamis').checked = button.dataset.kondisi_kamis == '1';
    document.getElementById('jumat').checked = button.dataset.kondisi_jumat == '1';
    document.getElementById('sabtu').checked = button.dataset.kondisi_sabtu == '1';
    document.getElementById('minggu').checked = button.dataset.kondisi_minggu == '1';
    // Tampilkan modal
    document.querySelector('.modalAturHari').style.display = 'flex';
});

btnSimpan.addEventListener('click', () => {
    const formData = {
        senin: document.getElementById('senin').checked ? 1 : 0,
        selasa: document.getElementById('selasa').checked ? 1 : 0,
        rabu: document.getElementById('rabu').checked ? 1 : 0,
        kamis: document.getElementById('kamis').checked ? 1 : 0,
        jumat: document.getElementById('jumat').checked ? 1 : 0,
        sabtu: document.getElementById('sabtu').checked ? 1 : 0,
        minggu: document.getElementById('minggu').checked ? 1 : 0,
    };

    const idWaktuDosen = document.querySelector('.atur-jadwal-btn').dataset.id;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    console.log('Payload:', formData);
    console.log('Endpoint:', `/dosen/waktu-dosen${idWaktuDosen}`);

    fetch(`/dosen/waktu-dosen${idWaktuDosen}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(formData)
    })
        .then(response => {
            console.log('Response status:', response.status);
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                Swal.fire({
                    title: "Waktu Dosen berhasil diperbarui!",
                    text: "Data jadwal telah berhasil diperbarui.",
                    icon: "success",
                    confirmButtonColor: "#22a0b8",
                }).then(() => {
                    location.reload(); // Refresh halaman setelah notifikasi sukses
                });
                updateColors();
            } else {
                Swal.fire({
                    title: "Gagal memperbarui jadwal waktu dosen!",
                    text: "Ada kesalahan saat memperbarui jadwal.",
                    icon: "error",
                    confirmButtonColor: "#22a0b8",
                }).then(() => {
                    location.reload(); // Refresh halaman untuk memuat ulang data
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: "Terjadi kesalahan!",
                text: "Silakan coba lagi nanti.",
                icon: "error",
                confirmButtonColor: "#22a0b8",
            });
        });

    // Menutup modal
    document.querySelector('.modalAturHari').style.display = 'none';
});
