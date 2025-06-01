@extends('layout.mainLandingPageRL')

@section('container')
<style>
  .register-container {
    max-width: 500px;
    margin-top: 100px;
    background: white;
    padding: 60px 100px;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  }

  .register-title {
    color: #6f42c1;
    font-weight: bold;
    text-align: center;
    margin-bottom: 50px;
    font-family: 'Poppins', sans-serif;
  }

  .btn-purple {
    background-color: #6f42c1;
    color: white;
  }

  .btn-purple:hover {
    background-color: #59359e;
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

  .hidden-field {
    display: none;
  }

  .text-danger {
    font-size: 0.85rem;
    margin-top: 4px;
  }
</style>

<div class="register-container mx-auto">
  <h2 class="register-title">Selamat Datang!</h2>

  <form method="POST" action="{{ route('register.store') }}">
    @csrf

    <!-- Nama -->
    <div class="mb-3">
      <label for="namaInput" class="form-label">Nama</label>
      <input id="namaInput" type="text" class="form-control" name="namaInput" required autofocus value="{{ old('namaInput') }}">
      @if ($errors->has('namaInput'))
        <div class="text-danger">{{ $errors->first('namaInput') }}</div>
      @endif
    </div>

    <!-- Email -->
    <div class="mb-3">
      <label for="emailInput" class="form-label">Email</label>
      <input id="emailInput" type="email" class="form-control" name="emailInput" required value="{{ old('emailInput') }}">
      @if ($errors->has('emailInput'))
        <div class="text-danger">{{ $errors->first('emailInput') }}</div>
      @endif
    </div>

    <!-- Password -->
    <div class="mb-3 password-toggle">
      <label for="passwordInput" class="form-label">Password</label>
      <input id="passwordInput" type="password" class="form-control" name="passwordInput" required>
      <span class="bi bi-eye-slash toggle-password" data-target="passwordInput"></span>
      @if ($errors->has('passwordInput'))
        <div class="text-danger">{{ $errors->first('passwordInput') }}</div>
      @endif
    </div>

    <!-- Konfirmasi Password -->
    <div class="mb-3 password-toggle">
      <label for="passwordInput_confirmation" class="form-label">Konfirmasi Password</label>
      <input id="passwordInput_confirmation" type="password" class="form-control" name="passwordInput_confirmation" required>
      <span class="bi bi-eye-slash toggle-password" data-target="passwordInput_confirmation"></span>
    </div>

    <!-- Pilih Peran -->
    <div class="mb-3">
      <label class="form-label">Pilih Peran</label><br>
      <input type="radio" name="role" value="dosen" id="role_dosen" {{ old('role') === 'dosen' ? 'checked' : '' }} required>
      <label for="role_dosen">Dosen</label>
      <input type="radio" name="role" value="mahasiswa" id="role_mahasiswa" {{ old('role') === 'mahasiswa' ? 'checked' : '' }}>
      <label for="role_mahasiswa">Mahasiswa</label>
      @if ($errors->has('role'))
        <div class="text-danger">{{ $errors->first('role') }}</div>
      @endif
    </div>

    <!-- Khusus Mahasiswa -->
    <div id="mahasiswa-fields" class="{{ old('role') === 'mahasiswa' ? '' : 'hidden-field' }}">
      <div class="mb-3">
        <label for="nimInput" class="form-label">NIM</label>
        <input id="nimInput" type="text" class="form-control" name="nimInput" value="{{ old('nimInput') }}">
        @if ($errors->has('nimInput'))
          <div class="text-danger">{{ $errors->first('nimInput') }}</div>
        @endif
      </div>

      <div class="mb-3">
        <label for="token" class="form-label">Token Kelas</label>
        <input id="token" type="text" class="form-control" name="token" value="{{ old('token') }}">
        @if ($errors->has('token'))
          <div class="text-danger">{{ $errors->first('token') }}</div>
        @endif
      </div>
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-purple">DAFTAR</button>
      <button type="reset" class="btn btn-outline-secondary">RESET</button>
    </div>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const roleMahasiswa = document.getElementById('role_mahasiswa');
    const roleDosen = document.getElementById('role_dosen');
    const mhsFields = document.getElementById('mahasiswa-fields');

    function toggleFields() {
      mhsFields.style.display = roleMahasiswa.checked ? 'block' : 'none';
    }

    toggleFields();
    roleMahasiswa.addEventListener('change', toggleFields);
    roleDosen.addEventListener('change', toggleFields);

    // Toggle visibility password
    document.querySelectorAll('.toggle-password').forEach(toggle => {
      toggle.addEventListener('click', function () {
        const target = document.getElementById(this.dataset.target);
        const type = target.getAttribute('type') === 'password' ? 'text' : 'password';
        target.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
      });
    });
  });
</script>
@endsection
