<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Materi</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="kkm" content="{{ auth()->user()->kkm ?? 70 }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/codemirror.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prism-themes/1.9.0/prism-vs.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="{{ asset('css/kuis.css') }}">
  <link href="{{ asset('/css/latihan-block.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/latihan-pilgan.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/latihan-nyusun.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/css2.css') }}" rel="stylesheet">




  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #ffffff;
      color: #1e293b;
    }
    .navbar {
      background-color: #8A56DC;
      color: white;
      height: 80px !important;
      padding: 0 1rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    .navbar-brand {
      color: #ffffff;
      height: 60px !important;
      font-size: 1.7rem !important;
      font-weight: 800 !important;
    }
    .navbar-brand:hover {
      color: #EDE2FF;
    }
    .btn-logout {
      background-color: #e0e7ff;
      color: #1e293b;
      border: 1.5px solid #99a8db;
      border-radius: 6px;
      font-weight: 600 !important;
      padding: 5px !important;
      font-size: 2 rem !important;
      text-align: center !important;
      height: 40px !important;
      width: 100px !important;
      margin-top: 20px;
    }
    .btn-logout:hover {
      background-color: #aabbf3;
      color: #ffffff;
    }
    .sidebar2 {
      background-color: #F7F7F7;
      border-right: 1px solid #E2E8F0;
      min-height: 100vh;
      padding-top: 20px;
    }
    .sidebar2 .nav-link {
      color: #1e293b;
      transition: all 0.3s;
      font-size: 0.95rem;
    }
    .sidebar2 .nav-link.active, .sidebar2 .nav-link:hover {
      color: #8A56DC;
      background-color: #EDE2FF;
      border-left: 4px solid #8A56DC;
      font-weight: 600;
    }
    .sidebar2 .locked {
      color: #9ca3af;
      cursor: not-allowed;
    }
    .sidebar2 .locked:hover {
      background-color: inherit;
      border-left: none;
    }
    .sidebar2 .bi-lock {
      font-size: 0.9rem;
      margin-left: auto;
    }
    .dropdown-toggle::after {
      float: right;
      margin-top: 6px;
    }
    .isi {
      padding: 30px;
      background-color: #ffffff;
    }
    .footer {
      background-color: #ffffff;
      color: #1e293b;
      font-size: 0.9rem;
      border-top: 1px solid #e5e7eb;
    }

    .ayo-pahami-wrapper {
  background: #f8f0fc;
  border: 2px solid #e0c3fc;
  border-radius: 12px;
  padding: 1.5rem;
  margin-top: 2rem;
}

.ayo-pahami-grid {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

@media (min-width: 768px) {
  .ayo-pahami-grid {
    flex-direction: row;
  }
}

.kode-diketik, .editor-embed {
  flex: 1;
}

.kode-instruksi {
  background: #fff;
  border: 1px dashed #d6bbfc;
  padding: 1rem;
  border-radius: 10px;
  box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.03);
  font-family: 'Courier New', monospace;
}

.kode-area pre {
  user-select: none;
  pointer-events: none;
  margin: 0;
  white-space: pre-wrap;
  color: #3b0764;
}
</style>


</head>
<body>
  <header class="navbar fixed-top d-flex align-items-center justify-content-between">
    <a class="navbar-brand ms-3" href="#">NextPHP</a>
    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
  <i class="bi bi-list"></i>
</button>
    <div class="me-3">
      <a class="btn btn-logout" href="{{ route('dashboard.mahasiswa') }}">Keluar</a>
    </div>
  </header> 

  <div class="berandaMateri" style="padding-top:56px;">
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="sidebar2 col-md-3 col-lg-2 collapse d-md-block sidebar">
          <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <h6 class="text-uppercase px-3 mb-2 text-muted">Daftar Materi</h6>
            <ul class="nav flex-column">
                  <!-- BAB A -->
              <li class="nav-item">
                <a class="nav-link" href="./b00-peta">Peta Konsep</a>
              </li>

              <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#babA" role="button">A. Pengenalan</a>
                <div class="collapse" id="babA">
                  <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a class="nav-link" href="./b11-object">1. Object</a></li>
                    <li class="nav-item"><a class="nav-link locked" href="./b12-terminologi">2. Terminologi <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="./b13-membuatobject">3. Membuat Object <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="./b14-mengaksesp&m">4. Mengakses Properties <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="./b15-pkuis">Kuis <i class="bi bi-lock"></i></a></li>
                  </ul>
                </div>
              </li>

              <!-- BAB B -->
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#babB" role="button">B. Mendeklarasikan Class</a>
                <div class="collapse" id="babB">
                  <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a class="nav-link locked" href="b21-mendeklarasikanm">1. Methods <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b22-mendeklarasikanp">2. Properties <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b23-mendeklarasikanc">3. Constants <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b24-inheritance">4. Inheritance <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b25-interface">5. Interfaces <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b26-traits">6. Traits <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b27-abstractm">7. Abstract Methods <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b28-constructors">8. Constructors <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b29-destructor">9. Destructors <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b210-pkuis">Kuis <i class="bi bi-lock"></i></a></li>
                  </ul>
                </div>
              </li>

              <!-- BAB C -->
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#babC" role="button">C. Anonymous Classes</a>
                <div class="collapse" id="babC">
                  <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a class="nav-link locked" href="b31-konsepd">Konsep Dasar <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b32-pkuis">Kuis <i class="bi bi-lock"></i></a></li>
                  </ul>
                </div>
              </li>

              <!-- BAB D -->
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#babD" role="button">D. Introspection</a>
                <div class="collapse" id="babD">
                  <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a class="nav-link locked" href="b41-memeriksac">1. Memeriksa Classes <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b42-memeriksao">2. Memeriksa Object <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b43-contohpi">3. Contoh Program <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b44-pkuis">Kuis <i class="bi bi-lock"></i></a></li>
                  </ul>
                </div>
              </li>

              <!-- BAB E -->
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#babE" role="button">E. Serialization</a>
                <div class="collapse" id="babE">
                  <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a class="nav-link locked" href="b51-konsepd">Konsep Dasar <i class="bi bi-lock"></i></a></li>
                    <li class="nav-item"><a class="nav-link locked" href="b52-pkuis">Kuis <i class="bi bi-lock"></i></a></li>
                  </ul>
                </div>
              </li>

              <li class="nav-item"><a class="nav-link locked" href="./b61-peval">Evaluasi <i class="bi bi-lock"></i></a></li>
            </ul>
          </div>
        </nav>

        <main class="konten col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="isi">
            @yield('container')
          </div>
          <footer class="footer py-3 text-center">
            &copy; 2025 <strong>NextPHP</strong>
          </footer>
        </main>
      </div>
    </div>
  </div>


  <!-- <script src="{{ asset('phpwasm/php-web.js') }}"></script> -->
  <!-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/mode/php/php.min.js"></script>

<script>
const editors = {};
const defaultCodes = {};

function setupEditor(id, defaultCode) {
  const textarea = document.getElementById(id);
  const editor = CodeMirror.fromTextArea(textarea, {
    lineNumbers: true,
    mode: "application/x-httpd-php",
    theme: "default",
    tabSize: 4,
    indentWithTabs: true
  });
  editors[id] = editor;
  defaultCodes[id] = defaultCode;
}

function runEditor(id) {
  const code = editors[id].getValue();
  fetch('/run', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ code })
  })
  .then(response => response.json())
  .then(data => {
    document.getElementById("output-" + id).textContent = data.output;
  })
  .catch(() => {
    document.getElementById("output-" + id).textContent = "❌ Gagal menjalankan kode.";
  });
}

function resetEditor(id) {
  editors[id].setValue(defaultCodes[id]);
  clearOutput(id);
}

function clearOutput(id) {
  document.getElementById("output-" + id).textContent = "Output akan tampil di sini...";
}
</script>

  
</body>
</html>
