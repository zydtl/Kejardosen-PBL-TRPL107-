document.getElementById("logout").addEventListener("click", function (event) {
  event.preventDefault();
  Swal.fire({
    
    title: "Apakah Anda yakin?",
    text: "Anda akan keluar dari akun ini!",
    imageUrl: logoutImageUrl,

    imageWidth: 250,
    imageHeight: 150,
    imageAlt: "Gambar Logout",
    showCancelButton: true,
    confirmButtonText: "Ya, keluar!",
    confirmButtonColor: "#3EBCD2",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      const jenis = this.dataset.jenis;

      window.location.href = "/logout/"+jenis; // Pastikan ada route bernama "landingpage"
    }
  });
});
