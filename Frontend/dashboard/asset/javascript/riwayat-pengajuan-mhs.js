// JavaScript for pagination
let currentPage = 1;
const rowsPerPage = 6;
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
