@section('container')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ObjectPHP</title>

  <link rel="icon" type="image/png" href="{{ asset('images/logo3.png') }}">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="{{ asset('/css/css1.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/responsif1.css') }}">

  <style>
    .menu_nav.active {
      padding: 10px 15px;
      background-color: #c5f5f7;
      border-radius: 8px;
      transition: background-color 0.3s ease;
      color: black;
    }

    body {
      font-family: 'Poppins', sans-serif;
    }

    .navbar-brand {
      font-size: 1.7rem !important;
      color: #8A56DC;
      font-weight: 800 !important;
      height: 55px !important;
    }

    .navbar-brand:hover {
      color: rgb(171, 141, 219);
    }

    .logout {
      margin-top: 0px;
    }

    @media (max-width: 768px) {
      .navbar-nav {
        text-align: center;
        width: 100%;
      }

      .navbar-nav .nav-link {
        padding: 12px 0;
        border-top: 1px solid #e5e7eb;
      }

      .text-end.d-flex {
        flex-direction: column;
        align-items: center;
        margin-top: 10px;
      }

      .logout {
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>

<div class="all-navbar">
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand ms-3" href="#">ObjectPHP</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mx-auto">
          <a class="menu_nav nav-link" href="{{ route('dashboard.dosen') }}">Beranda</a>
          <a class="menu_nav nav-link" href="/b00-peta">Materi</a>
          <a class="menu_nav nav-link" href="/bantuanD">Bantuan</a>
        </div>
        <div class="text-end d-flex align-items-center">
          <div id="nama" class="user me-3">
            {{ Auth::user()->name }}
          </div>
          <div class="logout">
            <a href="{{ route('login.logout') }}" class="btn btn-danger">Keluar</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>

<main class="konten">
  <div class="isi">
    @yield('container')
  </div>
  <div class="footer">
    <footer>
      <p>&copy; 2025 <b>ObjectPHP</b></p>
    </footer>
  </div>
</main>

<script>
  const currentUrl = window.location.href;
  document.querySelectorAll('.menu_nav').forEach(link => {
    if (currentUrl === link.href || currentUrl.includes(link.getAttribute("href"))) {
      link.classList.add('active');
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
