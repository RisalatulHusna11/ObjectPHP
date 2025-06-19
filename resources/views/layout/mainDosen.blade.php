<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>i-ObjectPHP</title>

  <link rel="icon" type="image/png" href="{{ asset('images/logo3.png') }}">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" rel="stylesheet">

  <!-- Custom Style -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f4fc;
      color: #343a40;
    }

    /* === NAVBAR === */
    .navbar {
      background: linear-gradient(to right, #8A56DC, #6f42c1);
      height: 70px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .navbar-brand {
      color: #fff;
      font-size: 1.6rem;
      font-weight: 800;
    }

    .navbar-brand:hover {
      color: #e0d6ff;
    }

    .nav-profile {
      color: white;
      font-weight: 500;
    }

    .btn-logout {
      background-color: #ffffff;
      color: #6f42c1;
      font-weight: 600;
      border: 1px solid #c5a7ff;
    }

    .btn-logout:hover {
      background-color: #6f42c1;
      color: white;
    }

    /* === SIDEBAR === */
    .sidebar {
      background-color: #f8f6ff;
      min-height: 100vh;
      padding-top: 1.5rem;
      border-right: 1px solid #e2d9f3;
    }

    .sidebar .nav-link {
      color: #6f42c1;
      font-weight: 500;
      padding: 12px 20px;
      border-radius: 8px;
      margin-bottom: 0.5rem;
      transition: 0.2s;
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: #e7dcff;
      font-weight: 600;
    }

    /* === MAIN CONTENT === */
    .content {
      background-color: white;
      margin-top: 30px;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 4px 10px rgba(128, 90, 213, 0.1);
    }

    footer {
      margin-top: 40px;
      padding: 1rem;
      font-size: 0.85rem;
      text-align: center;
      color: #777;
    }

    @media (max-width: 768px) {
      .navbar .nav-profile {
        display: none;
      }
    }
  </style>
</head>

<body>
  <!-- ======= HEADER ======= -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <a class="navbar-brand ms-2" href="#">i-ObjectPHP</a>
      <div class="d-flex align-items-center gap-3 me-3">
        <span class="nav-profile">{{ Auth::user()->name }}</span>
        <a href="{{ route('dashboard.dosen') }}" class="btn btn-logout btn-sm">Keluar</a>
      </div>
    </div>
  </nav>

  <!-- ======= SIDEBAR & CONTENT ======= -->
  <div class="container-fluid">
    <div class="row" style="padding-top: 70px;">
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 sidebar">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('d11-dashboard') ? 'active' : '' }}" href="/d11-dashboard">
              <i class="bi bi-house-door-fill me-2"></i> Beranda
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('d12-data-mahasiswa') ? 'active' : '' }}" href="/d12-data-mahasiswa">
              <i class="bi bi-people-fill me-2"></i> Data Mahasiswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('d13-data-nilai') ? 'active' : '' }}" href="/d13-data-nilai">
              <i class="bi bi-clipboard-data-fill me-2"></i> Data Nilai
            </a>
          </li>
          <!-- Contoh jika kamu aktifkan nanti -->
          {{-- 
          <li class="nav-item">
            <a class="nav-link {{ request()->is('d14-data-statistika') ? 'active' : '' }}" href="/d14-data-statistika">
              <i class="bi bi-bar-chart-line-fill me-2"></i> Statistik
            </a>
          </li>
          --}}
          <li class="nav-item">
            <a class="nav-link {{ request()->is('d15-pengaturan') ? 'active' : '' }}" href="/d15-pengaturan">
              <i class="bi bi-gear-fill me-2"></i> Pengaturan
            </a>
          </li>
        </ul>
      </nav>


      <!-- Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="content">
          @yield('container')
        </div>
        <footer>
          &copy; 2025 <strong>i-ObjectPHP</strong> | Dashboard Dosen
        </footer>
      </main>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  
</body>
</html>
