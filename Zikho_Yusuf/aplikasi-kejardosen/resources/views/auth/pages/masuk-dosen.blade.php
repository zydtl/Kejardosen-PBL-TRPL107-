@extends('auth.layout.master')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-6 order-lg-first order-last bg-left d-flex justify-content-center align-items-center">
        <img src="{{ asset('assets/auth/asset/img/login-dosen.png') }}" alt="Ilustrasi Login" class="login-illustration">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-6 order-lg-last order-first bg-right">
        <div class="row align-items-center">
          <div class="logo-container">
            <a href="/"><img src="{{ asset('assets/auth/asset/img/logo-kejardosen.png') }}" alt="Logo KJRDNS" class="logo"></a>
            <p class="welcome-title text-center">Selamat Datang!👋 </p>
            <p class="welcome-subtitle text-center ms-5 me-5">Anda berada di halaman masuk sebagai Dosen🏫, Silahkan masuk sebagai Dosen👨🏻‍🏫👩🏻‍🏫</p>
          </div>
          
          <form action="{{ route('login.dosen') }}" method="POST" class="w-100">
            @csrf
            <div class="input-container mx-auto">
              <label for="usernameInput" class="input-label">👤 NIK</label>
              <input id="usernameInput" type="text" name="nik" class="form-control custom-input" placeholder="masukkan NIK anda ..." required>
            </div>
            <div class="input-container mx-auto mt-2">
              <label for="passwordInput" class="input-label">🔐 Kata Sandi</label>
              <div class="input-group">
                <input id="passwordInput" type="password" name="password" class="form-control custom-input" placeholder="masukkan kata sandi anda ..." required>
                <button type="button" id="togglePassword" class="btn-toggle-password ps-2 pe-2">
                  <i class="bi bi-eye-slash"></i>
                </button>
              </div>
            </div>
            <div class="remember-forgot-container d-flex justify-content-between mx-auto mt-2">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                <label for="rememberMe" class="form-check-label text-secondary">Ingat saya</label>
              </div>
              <a href="#" class="forgot-password">Lupa kata sandi?</a>
            </div>
            <div class="submit-button-container mx-auto mt-3">
              <button type="submit" class="btn btn-custom-submit">Masuk</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
      const passwordInput = document.getElementById('passwordInput');
      const icon = this.querySelector('i');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
      } else {
        passwordInput.type = 'password';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
      }
    });
  </script> --}}
@endsection











{{-- @section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-6  order-lg-first order-last bg-left d-flex justify-content-center align-items-center">
        <img src="{{asset('assets/auth/asset/img/login-dosen.png')}}" alt="Ilustrasi Login" class="login-illustration">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-6  order-lg-last order-first bg-right">
        <div class="row align-items-center">
          <div class="logo-container">
            <img src="{{asset('assets/auth/asset/img/logo-kejardosen.png')}}" alt="Logo KJRDNS" class="logo">
            <p class="welcome-title text-center">Selamat Datang!👋 </p>
            <p class="welcome-subtitle text-center ms-5 me-5">Anda berada di halaman masuk sebagai Dosen🏫, Silahkan masuk sebagai Dosen👨🏻‍🏫👩🏻‍🏫</p>
          </div>
          <div class="input-container mx-auto">
            <label for="usernameInput" class="input-label">👤 NIK</label>
            <input id="usernameInput" type="text" class="form-control custom-input" placeholder="masukkan NIK anda ...">
          </div>
          <div class="input-container mx-auto mt-2">
            <label for="passwordInput" class="input-label">🔐 Kata Sandi</label>
            <div class="input-group">
              <input id="passwordInput" type="password" class="form-control custom-input" placeholder="masukkan kata sandi anda ...">
              <!-- <button id="togglePassword" class="btn btn-outline-secondary">
                <i class="bi bi-eye-slash"></i>
              </button> -->
              <button id="togglePassword" class="btn-toggle-password ps-2 pe-2">
                <i class="bi bi-eye-slash"></i>
              </button>
              
            </div>
          </div>
          <div class="remember-forgot-container d-flex justify-content-between mx-auto mt-2">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label for="rememberMe" class="form-check-label text-secondary">Ingat saya</label>
            </div>
            <a href="#" class="forgot-password">Lupa kata sandi?</a>
          </div>
          <div class="submit-button-container mx-auto mt-3">
            <button class="btn btn-custom-submit">Masuk</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection --}}