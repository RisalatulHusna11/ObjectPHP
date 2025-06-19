@extends('layout.mainDosen')

@section('container')

<style>
  .dashboard-header {
    background: linear-gradient(to right, #b99df0, #a385e3);
    color: white;
    padding: 25px 30px;
    border-radius: 14px;
    margin-bottom: 40px;
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
    gap: 20px;
    margin-bottom: 20px;
  }

  .info-card {
    background-color: #f7f3ff;
    border-left: 5px solid #a385e3;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 3px 8px rgba(160, 130, 220, 0.07);
    text-align: center;
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

  .nilai-box {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }

  .nilai-card {
    border-radius: 12px;
    padding: 20px;
    color: white;
    font-size: 0.95rem;
  }

  .nilai-rerata {
    background-color: #38bdf8;
  }

  .nilai-tertinggi {
    background-color: #4ade80;
  }

  .nilai-terendah {
    background-color: #f87171;
  }

  .nilai-card h6 {
    margin-bottom: 10px;
    font-weight: 600;
    font-size: 1rem;
  }

  .nilai-card p {
    margin: 0;
    line-height: 1.8;
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
    <h6>Rata-rata Nilai Kumulatif</h6>
    <p>{{ $rataNilai !== null ? number_format($rataNilai, 2) . ' / 100' : 'Belum ada nilai' }}</p>
  </div>
</div>

<div class="nilai-box">
  <div class="nilai-card nilai-rerata">
    <h6><i class="bi bi-bar-chart-line"></i> NILAI RATA-RATA</h6>
    @foreach ($rataPerKuis as $key => $val)
      <p>{{ ucfirst(str_replace('_', ' ', $key)) }}: {{ is_numeric($val) ? $val : '-' }}</p>
    @endforeach
  </div>

  <div class="nilai-card nilai-tertinggi">
    <h6><i class="bi bi-graph-up-arrow"></i> NILAI TERTINGGI</h6>
    @foreach ($nilaiTertinggi as $key => $val)
      <p>{{ ucfirst(str_replace('_', ' ', $key)) }}: {{ is_numeric($val) ? $val : '-' }}</p>
    @endforeach
  </div>

  <div class="nilai-card nilai-terendah">
    <h6><i class="bi bi-graph-down-arrow"></i> NILAI TERENDAH</h6>
    @foreach ($nilaiTerendah as $key => $val)
      <p>{{ ucfirst(str_replace('_', ' ', $key)) }}: {{ is_numeric($val) ? $val : '-' }}</p>
    @endforeach
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
