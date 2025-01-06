document.addEventListener('DOMContentLoaded', function () {
    const togglePasswordButton = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('passwordInput');
    const icon = togglePasswordButton.querySelector('i');

    togglePasswordButton.addEventListener('click', function () {
      // Cek tipe input
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text'; // Ubah ke text
        icon.classList.remove('bi-eye-slash'); // Ganti ikon mata tertutup
        icon.classList.add('bi-eye'); // Ganti ikon mata terbuka
      } else {
        passwordInput.type = 'password'; // Kembalikan ke password
        icon.classList.remove('bi-eye'); // Ganti ikon mata terbuka
        icon.classList.add('bi-eye-slash'); // Ganti ikon mata tertutup
      }
    });
  });