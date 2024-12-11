// JavaScript for pagination
let currentPage = 1;
const rowsPerPage = 8;
const rows = document.querySelectorAll('.table-row');
const totalPages = Math.ceil(rows.length / rowsPerPage);
const paginationContainer = document.querySelector('.pagination .page-numbers');

function displayRows(page) {
    const startIndex = (page - 1) * rowsPerPage;
    const endIndex = startIndex + rowsPerPage;

    rows.forEach((row, index) => {
        if (index >= startIndex && index < endIndex) {
            row.style.display = 'flex'; // Tampilkan baris
        } else {
            row.style.display = 'none'; // Sembunyikan baris
        }
    });
}

// Generate page numbers
function generatePageNumbers() {
    paginationContainer.innerHTML = ''; // Clear existing page numbers
    for (let i = 1; i <= totalPages; i++) {
        const pageNumber = document.createElement('span');
        pageNumber.textContent = i;
        pageNumber.classList.add('page-number');
        if (i === currentPage) {
            pageNumber.classList.add('active');
        }
        pageNumber.addEventListener('click', () => {
            currentPage = i;
            displayRows(currentPage);
            updateActivePage();
        });
        paginationContainer.appendChild(pageNumber);
    }
}

// Update active page styling
function updateActivePage() {
    const pageNumbers = document.querySelectorAll('.page-number');
    pageNumbers.forEach((pageNumber) => {
        pageNumber.classList.remove('active');
    });
    const activePage = document.querySelector(`.page-number:nth-child(${currentPage})`);
    activePage.classList.add('active');
}

// Handle Prev and Next buttons
document.querySelector('.prev-page').addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        displayRows(currentPage);
        updateActivePage();
    }
});

document.querySelector('.next-page').addEventListener('click', () => {
    if (currentPage < totalPages) {
        currentPage++;
        displayRows(currentPage);
        updateActivePage();
    }
});

// Initial display
displayRows(currentPage);
generatePageNumbers();

function searchTable() {
    // Ambil input pencarian
    const input = document.getElementById('search-input');
    const filter = input.value.toLowerCase();
    const tableRows = document.querySelectorAll('.responsive-table .table-row');
    

    // Loop melalui semua baris di tabel
    tableRows.forEach(row => {
        const cells = row.querySelectorAll('.col');
        let match = false;

        // Periksa setiap kolom dalam baris
        cells.forEach(cell => {
            if (cell.textContent.toLowerCase().includes(filter)) {
                match = true;
            }
        });

        // Tampilkan atau sembunyikan baris berdasarkan pencocokan
        row.style.display = match ? '' : 'none';
    });
}

// JS untuk fitur pencarian
function searchTable() {
    // Ambil input pencarian
    const input = document.getElementById('search-input');
    const filter = input.value.toLowerCase();
    const tableRows = document.querySelectorAll('.responsive-table .table-row');
    

    // Loop melalui semua baris di tabel
    tableRows.forEach(row => {
        const cells = row.querySelectorAll('.col');
        let match = false;

        // Periksa setiap kolom dalam baris
        cells.forEach(cell => {
            if (cell.textContent.toLowerCase().includes(filter)) {
                match = true;
            }
        });

        // Tampilkan atau sembunyikan baris berdasarkan pencocokan
        row.style.display = match ? '' : 'none';
    });
}

// JS untuk fitur pencarian daftar logbook dosen
function searchTable() {
    let input = document.getElementById('search-input').value.toLowerCase();
    let table = document.querySelector('.responsive-table-daftar');
    let rows = table.querySelectorAll('.table-row');
    
    rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        if (text.includes(input)) {
            row.style.display = ''; // Tampilkan row jika cocok
        } else {
            row.style.display = 'none'; // Sembunyikan row jika tidak cocok
        }
    });
}

// alert menghapus logbook pada logbook mahasiswa

document.querySelector(".btn-hapus").addEventListener("click", function () {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Logbook ini akan dihapus secara permanen dan tidak dapat dipulihkan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#22a0b8", // Warna tombol konfirmasi merah untuk menekankan penghapusan
        cancelButtonColor: "#95dfea", // Warna tombol pembatalan abu-abu
        confirmButtonText: "Ya, hapus logbook!",
        cancelButtonText: "Tidak, batalkan!"
    }).then((result) => {
        if (result.isConfirmed) {
            // Logic untuk menghapus logbook bisa ditambahkan di sini
            Swal.fire({
                title: "Dihapus!",
                text: "Logbook Anda telah berhasil dihapus.",
                icon: "success",
                confirmButtonColor: "#22a0b8", // Warna tombol konfirmasi hijau
            });
        }
    });
});
