<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>i-ObjectPHP</title>

  <link rel="icon" type="image/png" href="{{ asset('images/logo3.png') }}">
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
    .btn-keluar-iobject {
  background-color: #ffffff;
  color: #6f42c1;
  font-weight: 600;
  border: 1px solid #c5a7ff;
  padding: 6px 12px;
  font-size: 0.9rem;
  white-space: nowrap;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  border-radius: 6px;
  transition: all 0.2s ease-in-out;
  cursor: pointer;
}

.btn-keluar-iobject:hover {
  background-color: #99a8db;
  color: white;
}

@media (max-width: 768px) {
  .btn-keluar-iobject {
    font-size: 1.2rem;
    padding: 8px 12px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    justify-content: center;
  }

  .btn-keluar-iobject i {
    font-size: 1.3rem;
  }
}
    .sidebar2 {
      background-color: #F7F7F7;
      border-right: 1px solid #E2E8F0;
      min-height: 100vh;
      padding-top: 40px;
      overflow-x: hidden; 
  word-wrap: break-word; 
    }
    .sidebar2 .nav-link {
      color: #1e293b;
      transition: all 0.3s;
      font-size: 0.95rem;
      white-space: normal !important; 
  overflow-wrap: break-word;
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
      padding-top: 60px
    }
    .footer {
      background-color: #ffffff;
      color: #1e293b;
      font-size: 0.9rem;
      border-top: 1px solid #e5e7eb;
    }


    /* AYO PAHAMI */
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


/* PENGATURAN IMG */
.modal-img-container {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.85);
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }

  .modal-img-container img {
    max-width: 90%;
    max-height: 90%;
    border-radius: 10px;
    transition: transform 0.3s ease;
    cursor: grab;
    user-select: none;
  }

  .modal-img-container .close-btn {
    position: absolute;
    top: 30px;
    right: 40px;
    font-size: 2rem;
    color: #fff;
    cursor: pointer;
  }
</style>


</head>
<body>
  <header class="navbar fixed-top d-flex align-items-center justify-content-between">
    <a class="navbar-brand ms-3" href="#">i-ObjectPHP</a>
    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
  <i class="bi bi-list"></i>
</button>
    <div class="me-3 d-flex align-items-center">
  @php use Illuminate\Support\Facades\Auth; @endphp

  @guest
    <!-- Desktop -->
    <a href="./" class="btn-keluar-iobject d-none d-md-inline-flex">Keluar</a>
    <!-- Mobile -->
    <a href="./" class="btn-keluar-iobject d-inline-flex d-md-none" title="Keluar">
      <i class="bi bi-box-arrow-right"></i>
    </a>
  @else
    @php
      $logoutRoute = Auth::user()->role === 'mahasiswa'
          ? route('dashboard.mahasiswa')
          : (Auth::user()->role === 'dosen'
              ? route('dashboard.dosen')
              : './');
    @endphp

    <a href="{{ $logoutRoute }}" class="btn-keluar-iobject d-none d-md-inline-flex">Keluar</a>
    <a href="{{ $logoutRoute }}" class="btn-keluar-iobject d-inline-flex d-md-none" title="Keluar">
      <i class="bi bi-box-arrow-right"></i>
    </a>
  @endguest
</div>
  </header> 

  <div class="berandaMateri" style="padding-top:56px;">
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="sidebar2 col-md-3 col-lg-2 collapse d-md-block sidebar">
          <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <h6 class="text-uppercase px-3 mb-2 text-muted" style="text-align:center;"><b>Daftar Materi</b></h6>
            <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link {{ request()->is('b00-peta') ? 'active' : '' }}" href="./b00-peta">Peta Konsep</a>
            </li>

            <!-- BAB A -->
            @php
              $babAActive = request()->is('b11-object') || request()->is('b12-terminologi') || request()->is('b13-membuatobject') || request()->is('b14-mengaksesp*m');
            @endphp
            <a class="nav-link dropdown-toggle {{ $babAActive ? 'active' : '' }}" data-bs-toggle="collapse" href="#babA" role="button">A. Pengenalan</a>
            <div class="collapse {{ $babAActive ? 'show' : '' }}" id="babA">
              <ul class="nav flex-column ms-3">
                <li class="nav-item"><a class="nav-link {{ request()->is('b11-object') ? 'active' : '' }}" href="./b11-object">1. Object</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b12-terminologi') ? 'active' : '' }}" href="./b12-terminologi">2. Terminologi</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b13-membuatobject') ? 'active' : '' }}" href="./b13-membuatobject">3. Membuat Object</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b14-mengaksesp*m') ? 'active' : '' }}" href="./b14-mengaksesp&m">4. Mengakses Properties</a></li>
              </ul>
            </div>

            <!-- BAB B -->
            @php
              $babBActive = str_contains($currentUrl, 'b2');
            @endphp
            <a class="nav-link dropdown-toggle {{ $babBActive ? 'active' : '' }}" data-bs-toggle="collapse" href="#babB" role="button">B. Mendeklarasikan Class</a>
            <div class="collapse {{ $babBActive ? 'show' : '' }}" id="babB">
              <ul class="nav flex-column ms-3">
                <li class="nav-item"><a class="nav-link {{ request()->is('b21-mendeklarasikanm') ? 'active' : '' }}" href="b21-mendeklarasikanm">1. Methods</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b22-mendeklarasikanp') ? 'active' : '' }}" href="b22-mendeklarasikanp">2. Properties</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b23-mendeklarasikanc') ? 'active' : '' }}" href="b23-mendeklarasikanc">3. Constants</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b24-inheritance') ? 'active' : '' }}" href="b24-inheritance">4. Inheritance</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b25-interface') ? 'active' : '' }}" href="b25-interface">5. Interfaces</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b26-traits') ? 'active' : '' }}" href="b26-traits">6. Traits</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b27-abstractm') ? 'active' : '' }}" href="b27-abstractm">7. Abstract Methods</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b28-constructors') ? 'active' : '' }}" href="b28-constructors">8. Constructors</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b29-destructor') ? 'active' : '' }}" href="b29-destructor">9. Destructors</a></li>
              </ul>
            </div>

            <!-- BAB C -->
            @php
              $babCActive = str_contains($currentUrl, 'b3');
            @endphp
            <a class="nav-link dropdown-toggle {{ $babCActive ? 'active' : '' }}" data-bs-toggle="collapse" href="#babC" role="button">C. Anonymous Classes</a>
            <div class="collapse {{ $babCActive ? 'show' : '' }}" id="babC">
              <ul class="nav flex-column ms-3">
                <li class="nav-item"><a class="nav-link {{ request()->is('b31-konsepd') ? 'active' : '' }}" href="b31-konsepd">Konsep Dasar</a></li>
              </ul>
            </div>

            <!-- BAB D -->
            @php
              $babDActive = str_contains($currentUrl, 'b4');
            @endphp
            <a class="nav-link dropdown-toggle {{ $babDActive ? 'active' : '' }}" data-bs-toggle="collapse" href="#babD" role="button">D. Introspection</a>
            <div class="collapse {{ $babDActive ? 'show' : '' }}" id="babD">
              <ul class="nav flex-column ms-3">
                <li class="nav-item"><a class="nav-link {{ request()->is('b41-memeriksac') ? 'active' : '' }}" href="b41-memeriksac">1. Memeriksa Classes</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b42-memeriksao') ? 'active' : '' }}" href="b42-memeriksao">2. Memeriksa Object</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('b43-contohpi') ? 'active' : '' }}" href="b43-contohpi">3. Contoh Program</a></li>
              </ul>
            </div>

            <!-- BAB E -->
            @php
              $babEActive = str_contains($currentUrl, 'b5');
            @endphp
            <a class="nav-link dropdown-toggle {{ $babEActive ? 'active' : '' }}" data-bs-toggle="collapse" href="#babE" role="button">E. Serialization</a>
            <div class="collapse {{ $babEActive ? 'show' : '' }}" id="babE">
              <ul class="nav flex-column ms-3">
                <li class="nav-item"><a class="nav-link {{ request()->is('b51-konsepd') ? 'active' : '' }}" href="b51-konsepd">Konsep Dasar</a></li>
              </ul>
            </div>
        </nav>

        <main class="konten col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="isi">
            @yield('container')
          </div>
          <footer class="footer py-3 text-center">
            &copy; 2025 <strong>i-ObjectPHP</strong>
          </footer>
        </main>
      </div>
    </div>
  </div>

<!-- Modal Gambar Global -->
<div class="modal-img-container" id="modalPeta">
  <span class="close-btn" id="closeModal">&times;</span>
  <img src="" alt="Zoom Image" id="modalImg">
</div>


  <!-- <script src="{{ asset('phpwasm/php-web.js') }}"></script> -->
  <!-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/mode/php/php.min.js"></script>

<script>

// PENGATURAN BTN SELANJUTNYA
  window.addEventListener('DOMContentLoaded', () => {
    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  });


  // PENGATURAN GAMBAR
  const modal = document.getElementById('modalPeta');
  const modalImg = document.getElementById('modalImg');
  const closeBtn = document.getElementById('closeModal');

  let zoomed = false;
  let isDragging = false;
  let startX, startY, currentX = 0, currentY = 0;

  document.querySelectorAll('img.scrool').forEach(img => {
    img.addEventListener('click', () => {
      modal.style.display = "flex";
      modalImg.src = img.src;
      resetZoom();
    });
  });

  function resetZoom() {
    zoomed = false;
    currentX = currentY = 0;
    modalImg.style.transform = "scale(1)";
    modalImg.style.cursor = "zoom-in";
  }

  modalImg.addEventListener('click', (e) => {
    if (!zoomed) {
      zoomed = true;
      modalImg.style.transform = "scale(2) translate(0px, 0px)";
      modalImg.style.cursor = 'grab';
    } else {
      resetZoom();
    }
    e.stopPropagation();
  });

  closeBtn.addEventListener('click', () => {
    modal.style.display = "none";
  });

  window.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });

  modalImg.addEventListener('mousedown', function(e) {
    if (!zoomed) return;
    isDragging = true;
    startX = e.clientX - currentX;
    startY = e.clientY - currentY;
    modalImg.style.cursor = 'grabbing';
    e.preventDefault();
  });

  window.addEventListener('mousemove', function(e) {
    if (!isDragging) return;
    currentX = e.clientX - startX;
    currentY = e.clientY - startY;
    modalImg.style.transform = `scale(2) translate(${currentX}px, ${currentY}px)`;
  });

  window.addEventListener('mouseup', function() {
    if (isDragging) {
      isDragging = false;
      modalImg.style.cursor = 'grab';
    }
  });

  // HP: drag support
  modalImg.addEventListener('touchstart', function(e) {
    if (!zoomed) return;
    isDragging = true;
    startX = e.touches[0].clientX - currentX;
    startY = e.touches[0].clientY - currentY;
  });

  modalImg.addEventListener('touchmove', function(e) {
    if (!isDragging) return;
    currentX = e.touches[0].clientX - startX;
    currentY = e.touches[0].clientY - startY;
    modalImg.style.transform = `scale(2) translate(${currentX}px, ${currentY}px)`;
    e.preventDefault();
  });

  modalImg.addEventListener('touchend', function() {
    isDragging = false;
  });


// const editors = {};
// const defaultCodes = {};

// function setupEditor(id, defaultCode) {
//   const textarea = document.getElementById(id);
//   const editor = CodeMirror.fromTextArea(textarea, {
//     lineNumbers: true,
//     mode: "application/x-httpd-php",
//     theme: "default",
//     tabSize: 4,
//     indentWithTabs: true
//   });
//   editors[id] = editor;
//   defaultCodes[id] = defaultCode;
// }

// function runEditor(id) {
//   const code = editors[id].getValue();
//   fetch('/run', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/json',
//       'X-CSRF-TOKEN': '{{ csrf_token() }}'
//     },
//     body: JSON.stringify({ code })
//   })
//   .then(response => response.json())
//   .then(data => {
//     document.getElementById("output-" + id).textContent = data.output;
//   })
//   .catch(() => {
//     document.getElementById("output-" + id).textContent = "❌ Gagal menjalankan kode.";
//   });
// }

// function resetEditor(id) {
//   editors[id].setValue(defaultCodes[id]);
//   clearOutput(id);
// }

// function clearOutput(id) {
//   document.getElementById("output-" + id).textContent = "Output akan tampil di sini...";
// }
</script>

  
</body>
</html>
