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

    @media (max-width: 768px) {
      .navbar-nav {
        text-align: center;
        width: 100%;
      }

      .navbar-nav .nav-link {
        padding: 12px 0;
        border-top: 1px solid #e5e7eb;
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
        <div class="navbar-nav ms-auto">
          <a class="menu_nav nav-link" href="./">Beranda</a>
          <a class="menu_nav nav-link" href="./b00-peta">Materi</a>
          <a class="menu_nav nav-link" href="./register">Daftar</a>
          <a class="menu_nav nav-link" href="./login">Masuk</a>
          <a class="menu_nav nav-link" href="./bantuanG">Bantuan</a>
        </div>
      </div>
    </div>
  </nav>
</div>

@php
  $authPages = ['register', 'login'];
@endphp

<main style="{{ in_array(Request::segment(1), $authPages) ? 'min-height:100vh;display:flex;align-items:center;justify-content:center;background-color:#f6f7fb;' : '' }}">
  @yield('container')
</main>

<div class="footer">
  <footer>
    <p>&copy; 2025 <b>ObjectPHP</b></p>
  </footer>
</div>

<script>
  const currentUrl = window.location.href;
  const menuLinks = document.querySelectorAll('.menu_nav');

  menuLinks.forEach(function(link) {
    const linkUrl = link.href;
    if (currentUrl === linkUrl || currentUrl.includes(link.getAttribute("href"))) {
      link.classList.add('active');
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
