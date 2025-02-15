// JavaScript for pagination
let currentPage = 1;
const rowsPerPage = 5;
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
    const tableRowsDosen = document.querySelectorAll('.responsive-table-dsn .table-row');

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

    tableRowsDosen.forEach(row => {
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



// Fungsi untuk memeriksa apakah tabel memiliki data
const checkEmptyTable = (tableClass, emptyClass) => {
    const tables = document.querySelectorAll(`.${tableClass}`);
    tables.forEach((table) => {
        const gambarKosong = table.nextElementSibling; // Ambil elemen gambar kosong setelah tabel
        const hasRows = table.querySelectorAll('.table-row').length > 0;

        if (gambarKosong && gambarKosong.classList.contains(emptyClass)) {
            gambarKosong.style.display = hasRows ? 'none' : 'block';
        }
    });
};

// Jalankan pengecekan awal untuk kedua tabel
checkEmptyTable('responsive-table', 'gambar-kosong');
checkEmptyTable('responsive-table-dsn', 'gambar-kosong');

// Contoh: Jika kamu menambahkan atau menghapus data secara dinamis
document.querySelector('#addRowButton').addEventListener('click', () => {
    // Tambahkan data baru...
    // Setelah manipulasi DOM selesai, cek ulang untuk kedua tabel
    checkEmptyTable('responsive-table', 'gambar-kosong');
    checkEmptyTable('responsive-table-dsn', 'gambar-kosong');
});
