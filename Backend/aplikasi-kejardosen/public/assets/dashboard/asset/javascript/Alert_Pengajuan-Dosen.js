const form = document.getElementById("formModaledit");
const btnSubmit = document.getElementById("openFormdelete");
const modal = document.getElementById("formModaldelete");
const confirmSubmit = document.getElementById("yes");
const cancelSubmit = document.getElementById("closeFormdelete");

// Tampilkan modal saat tombol ceklis ditekan
btnSubmit.addEventListener("click", function () {
  modal.style.display = "block";
});

// Kirim form jika tombol "Ya" ditekan
confirmSubmit.addEventListener("click", function () {
  form.submit();
});

// Tutup modal jika tombol "Ya" ditekan
confirmSubmit.addEventListener("click", function () {
    modal.style.display = "none";
  });

// Tutup modal jika tombol "Tidak" ditekan
cancelSubmit.addEventListener("click", function () {
  modal.style.display = "none";
});



const form1 = document.getElementById("formModaledit");
const btnSubmit1 = document.getElementById("openFormagree");
const modal1 = document.getElementById("formModalagree");
const confirmSubmit1 = document.getElementById("yes1");
const cancelSubmit1 = document.getElementById("closeFormdelete1");

// Tampilkan modal saat tombol ceklis ditekan
btnSubmit1.addEventListener("click", function () {
  modal1.style.display = "block";
});

// Kirim form jika tombol "Ya" ditekan
confirmSubmit1.addEventListener("click", function () {
  form1.submit();
});

// Tutup modal jika tombol "Ya" ditekan
confirmSubmit1.addEventListener("click", function () {
    modal1.style.display = "none";
  });


// Tutup modal jika tombol "Tidak" ditekan
cancelSubmit1.addEventListener("click", function () {
  modal1.style.display = "none";
});


