// Fungsi untuk menghitung batas min dan max
const setMinMaxDate = (inputElement) => {
    const today = new Date();

    // Tentukan tanggal minimum (hari besok)
    const tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1); // Tambahkan 1 hari

    // Tentukan tanggal maksimum (30 hari ke depan)
    const maxDate = new Date(today);
    maxDate.setDate(today.getDate() + 30); // Tambahkan 30 hari

    // Format tanggal menjadi `YYYY-MM-DD`
    const formatDate = (date) => {
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, "0");
        const day = date.getDate().toString().padStart(2, "0");
        return `${year}-${month}-${day}`;
    };

    // Tetapkan atribut `min` dan `max` pada elemen input
    inputElement.setAttribute("min", formatDate(tomorrow));
    inputElement.setAttribute("max", formatDate(maxDate));

    console.log(`Min date: ${formatDate(tomorrow)}, Max date: ${formatDate(maxDate)} for #${inputElement.id}`);
};

// Tetapkan batas untuk elemen input tanggal penundaan
const inputTanggalTunda = document.getElementById("tanggal-tunda");
if (inputTanggalTunda) {
    setMinMaxDate(inputTanggalTunda);
}

  