// Script untuk Sidebar
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("expanded");
    updateLayout();
}

// Fungsi untuk memperbarui layout
function updateLayout() {
    const sidebar = document.getElementById("sidebar");
    const navbar = document.querySelector(".navbar");
    const mainContent = document.querySelector(".main-content");

    if (sidebar.classList.contains("expanded")) {
        navbar.classList.add("expanded");
        mainContent.classList.add("expanded");
    } else {
        navbar.classList.remove("expanded");
        mainContent.classList.remove("expanded");
    }
}


document.querySelectorAll('.submenu-toggle').forEach((toggle) => {
    toggle.addEventListener('click', function () {
        const parent = this.parentElement;
        parent.classList.toggle('active');
    });
});


// Panggil fungsi updateLayout() saat halaman pertama kali dimuat
window.onload = updateLayout;