@section('container')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <title>i-ObjectPHP</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo3.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/css1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/responsif1.css') }}">
    

</head>
<style>
    .menu_nav.active {
    padding: 10px 15px;
    background-color: #c5f5f7;
    border-radius: 8px;
    transition: background-color 0.3s ease;
    color : black;
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
      color:rgb(171, 141, 219);
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
<body>
<div class="all-navbar">
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand ms-3" href="#">i-ObjectPHP</a>

      <!-- Tombol hamburger di layar kecil -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu navigasi -->
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="menu_nav nav-link" href="./">Beranda</a>
          <a class="menu_nav nav-link" href="#features">Fitur</a>
          <a class="menu_nav nav-link" href="#kontak">Kontak</a>
          <a class="menu_nav nav-link" href="./b00-peta">Materi</a>
          <a class="menu_nav nav-link" href="./register">Daftar</a>
          <a class="menu_nav nav-link" href="./login">Login</a>
          <a class="menu_nav nav-link" href="./bantuanG">Bantuan</a>
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
                <p>&copy; 2025 <b>i-ObjectPHP</b></b></p>
            </footer>
        </div>
    </main>
    <script>
    // Dapatkan URL halaman saat ini
    var currentUrl = window.location.href;

    // Dapatkan semua tautan menu
    var menuLinks = document.querySelectorAll('.menu_nav');

    // Loop melalui setiap tautan menu
    menuLinks.forEach(function(link) {
        // Dapatkan URL tautan saat ini
        var linkUrl = link.href;

        // Periksa apakah URL halaman saat ini cocok dengan URL tautan
        if (currentUrl === linkUrl) {
            // Tambahkan kelas aktif jika cocok
            link.classList.add('active');
        }
    });
</script>
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
