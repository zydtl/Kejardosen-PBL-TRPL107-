document.getElementById("logout").addEventListener("click", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Anda akan keluar dari akun ini!",
    imageUrl: "../asset/img/logout.png", // Path relatif ke gambar
    imageWidth: 250, // Lebar gambar
    imageHeight: 150, // Tinggi gambar
    imageAlt: "Gambar Logout", // Alt text untuk gambar
    showCancelButton: true,
    confirmButtonText: "Ya, keluar!",
    confirmButtonColor: "#3EBCD2",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "/landingpage";
    }
  });
});
