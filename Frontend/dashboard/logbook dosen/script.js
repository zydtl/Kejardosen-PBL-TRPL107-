function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("expanded");
    updateNavbarWidth(); // Panggil fungsi untuk memperbarui lebar navbar saat sidebar di-toggle
}

function updateNavbarWidth() {
    const sidebar = document.getElementById("sidebar");
    const navbar = document.querySelector(".navbar");
    
    if (sidebar.classList.contains("expanded")) {
        navbar.style.width = "calc(100% - 270px)";
        navbar.style.left = "270px";
        get
    } else {
        navbar.style.width = "calc(100% - 70px)";
        navbar.style.left = "70px";
    }
}

// Panggil fungsi updateNavbarWidth() saat halaman pertama kali dimuat
window.onload = updateNavbarWidth;