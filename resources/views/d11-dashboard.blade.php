@extends('layout.mainDosen')

@section('container')

<style>
  .dashboard-header {
    background: linear-gradient(to right, #b99df0, #a385e3); /* Lebih soft */
    color: white;
    padding: 25px 30px;
    border-radius: 14px;
    margin-bottom: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .dashboard-header h2 {
    margin: 0;
    font-size: 1.8rem;
    font-weight: 700;
  }

  .profile-summary {
    display: flex;
    align-items: center;
    gap: 15px;
  }

  .profile-summary img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: 3px solid #fff;
    object-fit: cover;
  }

  .profile-summary p {
    margin: 0;
    font-size: 0.9rem;
    color: #f8f0ff;
  }

  .info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 24px;
    margin-bottom: 40px;
  }

  .info-card {
    background-color: #f7f3ff;
    border-left: 5px solid #a385e3;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 3px 8px rgba(160, 130, 220, 0.07);
    text-align: center;
    transition: 0.2s ease;
  }

  .info-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(160, 130, 220, 0.12);
  }

  .info-card h6 {
    font-weight: 600;
    color: #6a4ebd;
  }

  .info-card p {
    font-size: 1.1rem;
    font-weight: bold;
    color: #3a2f6c;
    margin-top: 10px;
  }

  .copy-btn {
    margin-top: 12px;
    background-color: #a385e3;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 0.85rem;
  }

  .copy-btn:hover {
    background-color: #8c6acc;
  }
</style>

<div class="dashboard-header">
  <h2>Selamat Datang, {{ Auth::user()->name }}</h2>
  <div class="profile-summary">
    <img src="{{ asset('images/profil.png') }}" alt="Foto Profil">
    <div>
      <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
      <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    </div>
  </div>
</div>

<div class="info-grid">
  <div class="info-card">
    <h6>Token Kelas</h6>
    <p id="token-text">{{ Auth::user()->token }}</p>
    <button class="copy-btn" onclick="copyToken()">Salin Token</button>
  </div>
  <div class="info-card">
  <h6>Jumlah Mahasiswa</h6>
  <p>{{ $jumlahMahasiswa }} Orang</p>
</div>
<div class="info-card">
  <h6>Rata-rata Nilai</h6>
  <p>
    {{ $rataNilai !== null ? number_format($rataNilai, 2) . ' / 100' : 'Belum ada nilai' }}
  </p>
</div>

</div>

<script>
  function copyToken() {
    const text = document.getElementById('token-text').innerText;
    navigator.clipboard.writeText(text).then(() => {
      alert('✅ Token berhasil disalin!');
    });
  }
</script>

@endsection
