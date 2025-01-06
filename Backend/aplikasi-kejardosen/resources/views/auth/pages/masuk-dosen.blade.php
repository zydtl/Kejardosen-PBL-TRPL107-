@extends('auth.layout.master')

@section('title')
  Masuk Sebagai Dosen
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <!-- Left Column with Image -->
      <div class="col-half left">
        <img src="{{asset('assets/auth/asset/img/login-dosen.png')}}" alt="Ilustrasi Login" class="login-illustration dsn">
      </div>
  
      <!-- Right Column with Form -->
      <div class="col-half right">
        <form action="{{ route('login.dosen') }}" method="POST">
          <div class="form-content">
            <div class="logo-container">
              <a href="/"><img src="{{ asset('assets/auth/asset/img/logo-kejardosen.png') }}" alt="Logo KJRDNS" class="logo"></a>
              <p class="welcome-title text-center">Selamat Datang!👋 </p>
              <p class="welcome-subtitle text-center ms-5 me-5">Anda berada di halaman masuk sebagai Dosen🏫, Silahkan masuk sebagai Dosen👨🏻‍🏫👩🏻‍🏫</p>
            </div>
  
            <!-- Displaying Errors -->
            @if($errors->has('loginError'))
            <div class="custom-alert error-alert" role="alert">
                <strong>Login Gagal!</strong> {{ $errors->first('loginError') }}
                <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'">×</button>
            </div>
            @endif
        
  
  
            @csrf
            <!-- Username Input -->
            <div class="input-container">
              <label for="usernameInput" class="input-label">👤 NIK</label>
              <input id="usernameInput" name="nik" type="number" class="input-field" placeholder="masukkan NIK anda ..." required>
            </div>
  
            <!-- Password Input -->
            <div class="input-container mt-2">
              <label for="passwordInput" class="input-label">🔐 Kata Sandi</label>
              <div class="password-container">
                <input id="passwordInput" name="password" type="password" class="input-field" placeholder="masukkan kata sandi anda ..." required>
                <button id="togglePassword" class="toggle-password" type="button">
                  <i class="bi bi-eye-slash"></i>
                </button>
              </div>
            </div>
  
            <!-- Remember Me & Forgot Password -->
            <div class="remember-forgot">
              <div class="remember-checkbox">
                <input type="checkbox" id="rememberMe" name="remember">
                <label for="rememberMe">Ingat saya</label>
              </div>
            </div>
  
            <!-- Submit Button -->
            <div class="submit-container">
              <button type="submit" class="submit-btn">Masuk</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
