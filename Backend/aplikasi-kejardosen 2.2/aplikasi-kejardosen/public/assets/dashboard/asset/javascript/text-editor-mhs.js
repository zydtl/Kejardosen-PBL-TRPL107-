// Inisialisasi RichTextEditor untuk elemen Catatan Dosen
var editor = new RichTextEditor("#catatan-mahasiswa");
// Jika ingin menambahkan toolbar untuk pengaturan teks
editor.toolbar = ['bold', 'italic', 'underline', 'fontSize', 'color'];  // Pilihan toolbar

// Inisialisasi editor untuk Catatan Mahasiswa
var editorMahasiswa = new RichTextEditor("#catatan-dosen");
editorMahasiswa.setReadOnly(true); // Set menjadi read-only
