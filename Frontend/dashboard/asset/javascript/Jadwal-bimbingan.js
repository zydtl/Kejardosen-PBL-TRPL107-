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

document.querySelector(".btn-tolak").addEventListener("click", async function () {
    const confirmation = await Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Jadwal yang telah diterima akan dibatalkan dan mahasiswa akan diberitahu.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#22a0b8",
        cancelButtonColor: "#95dfea",
        confirmButtonText: "Ya, batalkan jadwal!",
        cancelButtonText: "Tidak, tetap terima!"
    });

    if (confirmation.isConfirmed) {
        const { value: reason } = await Swal.fire({
            title: "Alasan Pembatalan",
            input: "textarea",
            inputLabel: "Masukkan alasan pembatalan bimbingan",
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

