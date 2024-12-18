document.getElementById("logout").addEventListener("click", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Anda akan keluar dari akun ini!",
    imageUrl: "../asset/img/logout.png",
    imageWidth: 250, 
    imageHeight: 150, 
    imageAlt: "Gambar Logout", 
    showCancelButton: true,
    confirmButtonText: "Ya, keluar!",
    confirmButtonColor: "#3EBCD2",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "/landingpage"; //tolong arahin ke landing page
    }
  });
});
