@php
  use App\Models\ProgressMahasiswa;
  use App\Models\Kkm;

  $user = auth()->user();
  $totalHalaman = 25;
  $jumlahSelesai = 0;

  if ($user) {
      $jumlahSelesai = ProgressMahasiswa::where('user_id', $user->id)->count();
  }

  $progressPersen = round(($jumlahSelesai / $totalHalaman) * 100);

  // Ambil nilai KKM dari tabel kkm berdasarkan dosen mahasiswa
  $kkm = Kkm::where('dosen_id', $user->dosen_id)->value('kkm') ?? 70;

  function linkAktif($pattern) {
    return request()->is($pattern) ? 'active' : '';
  }

  function collapseAktif($pattern) {
    return request()->is($pattern) ? 'show' : '';
  }
@endphp


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>i-ObjectPHP</title>

  <link rel="icon" type="image/png" href="{{ asset('images/logo3.png') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="kkm" content="{{ $kkm }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/codemirror.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prism-themes/1.9.0/prism-vs.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
            
          <div class="progress-container px-3 py-3 mb-3 text-center">
            <div class="progress-title mb-2">Progress Pembelajaran</div>
            <div class="progress my-2">
              <div id="progressBarFill" class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $progressPersen }}%; background-color: #8A56DC;">
                <span id="progressPercentage" class="progress-text">{{ $progressPersen }}%</span>
              </div>
            </div>
          </div>

            <h6 class="text-uppercase px-3 mb-2 text-muted" style="text-align:center;"><b>Daftar Materi</b></h6>
            <ul class="nav flex-column">
              <li class="nav-item">
        <a class="nav-link {{ linkAktif('b00-peta') }}" href="{{ url('b00-peta') }}">Peta Konsep</a>
      </li>

      <!-- Bab A -->
      <li class="nav-item">
        <a class="nav-link dropdown-toggle {{ linkAktif('b1*') }}" data-bs-toggle="collapse" href="#babA" role="button">A. Pengenalan</a>
        <div class="collapse {{ collapseAktif('b1*') }}" id="babA">
          <ul class="nav flex-column ms-3">
            <li class="nav-item">
              <!-- Mengecek apakah halaman sebelumnya (b00-peta) sudah diselesaikan oleh user -->
              @sudahSelesai('b00-peta')
              
              <!-- Jika sudah selesai, tampilkan link aktif ke halaman "b11-object" -->
                <a class="nav-link {{ linkAktif('b11-object') }}" href="{{ url('b11-object') }}">1. Object</a>
              
              @else
              <!-- Jika belum selesai, tampilkan link dalam keadaan terkunci (tidak bisa diklik) -->
                <a class="nav-link locked" href="#">1. Object <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>

            <li class="nav-item">
              @sudahSelesai('b11-object')
              <a class="nav-link {{ linkAktif('b12-terminologi') }}" href="{{ url('b12-terminologi') }}">2. Terminologi</a>
              @else
              <a class="nav-link locked" href="#">2. Terminologi <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b12-terminologi')
              <a class="nav-link {{ linkAktif('b13-membuatobject') }}" href="{{ url('b13-membuatobject') }}">3. Membuat Object</a>
              @else
              <a class="nav-link locked" href="#">3. Membuat Object <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b13-membuatobject')
              <a class="nav-link {{ linkAktif('b14-mengaksesp&m') }}" href="{{ url('b14-mengaksesp&m') }}">4. Mengakses Properties</a>
              @else
              <a class="nav-link locked" href="#">4. Mengakses Properties <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b14-mengaksesp&m')
              <a class="nav-link {{ linkAktif('b15-pkuis') }}" href="{{ url('b15-pkuis') }}">Kuis</a>
              @else
              <a class="nav-link locked" href="#">Kuis <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
          </ul>
        </div>
      </li>

      <!-- Bab B -->
      <li class="nav-item">
        <a class="nav-link dropdown-toggle {{ linkAktif('b2*') }}" data-bs-toggle="collapse" href="#babB" role="button">B. Mendeklarasikan Class</a>
        <div class="collapse {{ collapseAktif('b2*') }}" id="babB">
          <ul class="nav flex-column ms-3">
            <li class="nav-item">
              @sudahSelesai('b17-hkuis')
              <a class="nav-link {{ linkAktif('b21-mendeklarasikanm') }}" href="{{ url('b21-mendeklarasikanm') }}">1. Methods</a>
              @else
              <a class="nav-link locked" href="#">1. Methods <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b21-mendeklarasikanm')
              <a class="nav-link {{ linkAktif('b22-mendeklarasikanp') }}" href="{{ url('b22-mendeklarasikanp') }}">2. Properties</a>
              @else
              <a class="nav-link locked" href="#">2. Properties <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b22-mendeklarasikanp')
              <a class="nav-link {{ linkAktif('b23-mendeklarasikanc') }}" href="{{ url('b23-mendeklarasikanc') }}">3. Constants</a>
              @else
              <a class="nav-link locked" href="#">3. Constants <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b23-mendeklarasikanc')
              <a class="nav-link {{ linkAktif('b24-inheritance') }}" href="{{ url('b24-inheritance') }}">4. Inheritance</a>
              @else
              <a class="nav-link locked" href="#">4. Inheritance <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b24-inheritance')
              <a class="nav-link {{ linkAktif('b25-interface') }}" href="{{ url('b25-interface') }}">5. Interfaces</a>
              @else
              <a class="nav-link locked" href="#">5. Interfaces <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b25-interface')
              <a class="nav-link {{ linkAktif('b26-traits') }}" href="{{ url('b26-traits') }}">6. Traits</a>
              @else
              <a class="nav-link locked" href="#">6. Traits <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b26-traits')
              <a class="nav-link {{ linkAktif('b27-abstractm') }}" href="{{ url('b27-abstractm') }}">7. Abstract Methods</a>
              @else
              <a class="nav-link locked" href="#">7. Abstract Methods <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b27-abstractm')
              <a class="nav-link {{ linkAktif('b28-constructors') }}" href="{{ url('b28-constructors') }}">8. Constructors</a>
              @else
              <a class="nav-link locked" href="#">8. Constructors <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b28-constructors')
              <a class="nav-link {{ linkAktif('b29-destructor') }}" href="{{ url('b29-destructor') }}">9. Destructors</a>
              @else
              <a class="nav-link locked" href="#">9. Destructors <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b29-destructor')
              <a class="nav-link {{ linkAktif('b210-pkuis') }}" href="{{ url('b210-pkuis') }}">Kuis</a>
              @else
              <a class="nav-link locked" href="#">Kuis <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
          </ul>
        </div>
      </li>

      <!-- Bab C -->
      <li class="nav-item">
        <a class="nav-link dropdown-toggle {{ linkAktif('b3*') }}" data-bs-toggle="collapse" href="#babC" role="button">C. Anonymous Classes</a>
        <div class="collapse {{ collapseAktif('b3*') }}" id="babC">
          <ul class="nav flex-column ms-3">
            <li class="nav-item">
              @sudahSelesai('b212-hkuis')
              <a class="nav-link {{ linkAktif('b31-konsepd') }}" href="{{ url('b31-konsepd') }}">Konsep Dasar</a>
              @else
              <a class="nav-link locked" href="#">Konsep Dasar <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b31-konsepd')
              <a class="nav-link {{ linkAktif('b32-pkuis') }}" href="{{ url('b32-pkuis') }}">Kuis</a>
              @else
              <a class="nav-link locked" href="#">Kuis <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
          </ul>
        </div>
      </li>

      <!-- Bab D -->
      <li class="nav-item">
        <a class="nav-link dropdown-toggle {{ linkAktif('b4*') }}" data-bs-toggle="collapse" href="#babD" role="button">D. Introspection</a>
        <div class="collapse {{ collapseAktif('b4*') }}" id="babD">
          <ul class="nav flex-column ms-3">
            <li class="nav-item">
              @sudahSelesai('b34-hkuis')
              <a class="nav-link {{ linkAktif('b41-memeriksac') }}" href="{{ url('b41-memeriksac') }}">1. Memeriksa Classes</a>
              @else
              <a class="nav-link locked" href="#">1. Memeriksa Classes <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b41-memeriksac')
              <a class="nav-link {{ linkAktif('b42-memeriksao') }}" href="{{ url('b42-memeriksao') }}">2. Memeriksa Object</a>
              @else
              <a class="nav-link locked" href="#">2. Memeriksa Object <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b42-memeriksao')
              <a class="nav-link {{ linkAktif('b43-contohpi') }}" href="{{ url('b43-contohpi') }}">3. Contoh Program</a>
              @else
              <a class="nav-link locked" href="#">3. Contoh Program <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b43-contohpi')
              <a class="nav-link {{ linkAktif('b44-pkuis') }}" href="{{ url('b44-pkuis') }}">Kuis</a>
              @else
              <a class="nav-link locked" href="#">Kuis <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
          </ul>
        </div>
      </li>

      <!-- Bab E -->
      <li class="nav-item">
        <a class="nav-link dropdown-toggle {{ linkAktif('b5*') }}" data-bs-toggle="collapse" href="#babE" role="button">E. Serialization</a>
        <div class="collapse {{ collapseAktif('b5*') }}" id="babE">
          <ul class="nav flex-column ms-3">
            <li class="nav-item">
              @sudahSelesai('b46-hkuis')
              <a class="nav-link {{ linkAktif('b51-konsepd') }}" href="{{ url('b51-konsepd') }}">Konsep Dasar</a>
              @else
              <a class="nav-link locked" href="#">Konsep Dasar <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
            <li class="nav-item">
              @sudahSelesai('b51-konsepd')
              <a class="nav-link {{ linkAktif('b52-pkuis') }}" href="{{ url('b52-pkuis') }}">Kuis</a>
              @else
              <a class="nav-link locked" href="#">Kuis <i class="bi bi-lock"></i></a>
              @endsudahSelesai
            </li>
          </ul>
        </div>
      </li>

      <!-- Evaluasi -->
      <li class="nav-item">
        @sudahSelesai('b54-hkuis')
        <a class="nav-link {{ linkAktif('b61-peval') }}" href="{{ url('b61-peval') }}">Evaluasi</a>
        @else
        <a class="nav-link locked" href="#">Evaluasi <i class="bi bi-lock"></i></a>
        @endsudahSelesai
      </li>

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


// TAMPILAN PROGRES
document.addEventListener('DOMContentLoaded', function() {
  fetch("{{ route('progress.percentage') }}")
    .then(res => res.json())
    .then(data => {
      const percentage = data.progress;
      document.getElementById('progressBarFill').style.width = percentage + '%';
      document.getElementById('progressPercentage').textContent = percentage + '%';
    })
    .catch(err => {
      console.error('❌ Gagal mengambil data progres:', err);
    });
});


// KIRIM PROGRES HALAMAN
  function kirimProgressHalaman(namaHalaman, redirectUrl = null) {
  fetch("{{ route('progress.simpan') }}", {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
    },
    body: JSON.stringify({ halaman: namaHalaman })
  })
  .then(res => res.json())
  .then(data => {
    console.log('✅ Progress berhasil dikirim:', data);
    if (redirectUrl) {
      window.location.href = redirectUrl;
    } else {
      const tombol = document.getElementById('btnSelanjutnya');
      if (tombol) {
        tombol.style.pointerEvents = 'auto';
        tombol.style.opacity = 1;
        tombol.removeAttribute('disabled');
      }
    }
  })
  .catch(err => {
    console.error('❌ Gagal kirim progress:', err);
  });
}



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
