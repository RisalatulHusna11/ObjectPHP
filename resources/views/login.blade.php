@extends('layout.mainLandingPageRL')

@section('container')
<style>
  .login-container {
    max-width: 500px;
    margin-top: 70px;
    background: white;
    padding: 60px 100px;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  }

  .login-title {
    color: #6f42c1;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px;
    font-family: 'Poppins', sans-serif;
  }

  .btn-purple {
    background-color: #6f42c1;
    color: white;
  }

  .btn-purple:hover {
    background-color: #59359e;
    color: white;
  }

  .password-toggle {
    position: relative;
  }

  .toggle-password {
    position: absolute;
    right: 10px;
    top: 75%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6f42c1;
  }

  .register-link {
    text-align: center;
    margin-top: 15px;
  }

  .register-link a {
    color: #6f42c1;
    font-weight: bold;
  }

  .alert {
    margin-bottom: 20px;
  }
</style>

<div class="login-container mx-auto">
  <h3 class="login-title">Login ke i-ObjectPHP</h3>

  {{-- ✅ ALERT FLASH MESSAGE --}}
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <form method="POST" action="{{ route('login.auth') }}">
    @csrf

    {{-- Email --}}
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror"
             id="email" name="email" value="{{ old('email') }}" required>
      @error('email')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    {{-- Password --}}
    <div class="mb-3 password-toggle">
      <label for="password" class="form-label">Kata Sandi</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror"
             id="password" name="password" required>
      <span class="bi bi-eye-slash toggle-password" data-target="password"></span>
      @error('password')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    {{-- Remember Me --}}
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="checkRemember" name="checkRemember" {{ old('checkRemember') ? 'checked' : '' }}>
      <label class="form-check-label" for="checkRemember">Ingat Saya</label>
    </div>

    {{-- Submit --}}
    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-purple">LOGIN</button>
      <button type="reset" class="btn btn-outline-secondary">RESET</button>
    </div>
  </form>

  <div class="register-link">
    <small>Belum punya akun? <a href="{{ route('register.show') }}">Daftar</a></small>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(toggle => {
      toggle.addEventListener('click', function () {
        const targetId = this.getAttribute('data-target');
        const input = document.getElementById(targetId);
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
      });
    });

    // Optional: auto-hide alert after 4 seconds
    setTimeout(() => {
      const alert = document.querySelector('.alert');
      if (alert) {
        alert.classList.remove('show');
        alert.classList.add('fade');
      }
    }, 4000);
  });
</script>
@endsection
