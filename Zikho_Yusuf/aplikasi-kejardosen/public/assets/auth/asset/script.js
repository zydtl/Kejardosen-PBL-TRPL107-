document.querySelector('#togglePassword').addEventListener('click', function () {
    const passwordInput = document.querySelector('#passwordInput');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Tambahkan atau hapus kelas 'active'
    this.classList.toggle('active');

    // Ubah ikon dan warnanya sesuai dengan status
    this.innerHTML = type === 'password'
        ? '<i class="bi bi-eye-slash"></i>'
        : '<i class="bi bi-eye"></i>';
});
