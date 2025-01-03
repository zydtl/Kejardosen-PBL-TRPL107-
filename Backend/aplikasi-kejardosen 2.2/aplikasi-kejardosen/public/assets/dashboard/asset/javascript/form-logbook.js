// Fungsi untuk memperbarui layout
function updateLayout() {
    const inputBoxes = document.querySelectorAll(".input-box");
    const mainContent = document.querySelector(".main-content");

    const sidebarWidth = sidebar.classList.contains("expanded") ? 270 : 70;

    navbar.style.width = `calc(100% - ${sidebarWidth}px)`;
    navbar.style.left = `${sidebarWidth}px`;

    inputBoxes.forEach(inputBox => {
        inputBox.style.width = sidebar.classList.contains("expanded") ? "300px" : "400px";
    });

    mainContent.style.marginLeft = `${sidebarWidth}px`;
}