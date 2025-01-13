document.addEventListener('DOMContentLoaded', function () {
  const togglePasswordButton = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('passwordInput');
  const icon = togglePasswordButton.querySelector('i');

  togglePasswordButton.addEventListener('click', function () {
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text'; // Ubah tipe input ke text
      icon.className = 'fi fi-rr-eye'; // Set class mata terbuka
    } else {
      passwordInput.type = 'password'; // Kembalikan ke password
      icon.className = 'fi fi-rr-eye-crossed'; // Set class mata tertutup
    }
  });
});
