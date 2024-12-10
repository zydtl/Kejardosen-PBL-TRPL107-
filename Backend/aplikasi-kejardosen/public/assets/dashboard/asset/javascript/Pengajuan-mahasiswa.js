// ini untuk sidebar
function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  const navbar = document.querySelector(".navbar");
  const mainContent = document.querySelector(".main-content");

  sidebar.classList.toggle("expanded");
  navbar.classList.toggle("expanded");
  mainContent.classList.toggle("expanded");
}


//untuk Tombol edit atau banding
document.getElementById("openFormedit").addEventListener("click", function(){
  document.querySelector("#formModaledit").style.display = "flex";
})

document.querySelector("#closeFormedit").addEventListener("click", function(){
  document.querySelector("#formModaledit").style.display = "none";
})

//untuk tombol buat pengajuan baru
document.getElementById("openForm").addEventListener("click", function(){
  document.querySelector("#formModal").style.display = "flex";
})

document.querySelector("#closeForm").addEventListener("click", function(){
  document.querySelector("#formModal").style.display = "none";
})

//untuk tombol hapus pengajuan
document.getElementById("openFormdelete").addEventListener("click", function(){
  document.querySelector("#formModaldelete").style.display = "flex";
})

document.querySelector("#closeFormdelete").addEventListener("click", function(){
  document.querySelector("#formModaldelete").style.display = "none";
})

document.getElementById('showButton').addEventListener('click', function () {
  document.getElementById('content').style.display = 'block';
   // Sembunyikan tombol setelah ditekan
});





