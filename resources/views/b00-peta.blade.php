@php use Illuminate\Support\Facades\Auth; @endphp

@extends(
  Auth::check()
    ? (Auth::user()->role === 'mahasiswa'
        ? 'layout.mainMateriM'
        : (Auth::user()->role === 'dosen' ? 'layout.mainMateriBukaD' : 'layout.mainMateriBukaG')
      )
    : 'layout.mainMateriBukaG'
)

@php
  use App\Models\ProgressMahasiswa;

  $progress = ProgressMahasiswa::where('user_id', auth()->id())
              ->pluck('selesai', 'halaman')
              ->toArray();

  $selesai = $progress['b00-peta'] ?? false;
@endphp

@section('container')

<style>
  .all-peta {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 0;
  }

  .peta {
    max-width: 100%;
    width: 1000px;
    height: auto;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    cursor: zoom-in;
    transition: transform 0.3s ease;
  }

  @media (max-width: 768px) {
    .peta {
      width: 95%;
    }
  }

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

<div class="all-peta">
  <img class="peta" src="{{ asset('images/petaoop.jpg') }}" alt="Peta Konsep OOP" id="clickable-peta">
</div>

<!-- Modal -->
<div class="modal-img-container" id="modalPeta">
  <span class="close-btn" id="closeModal">&times;</span>
  <img src="{{ asset('images/petaoop.jpg') }}" alt="Peta Konsep OOP" id="modalImg">
</div>

<script>
// FITUR  ZOOM PETA
  const modal = document.getElementById('modalPeta');
  const img = document.getElementById('clickable-peta');
  const modalImg = document.getElementById('modalImg');
  const closeBtn = document.getElementById('closeModal');

  let zoomed = false;
  let isDragging = false;
  let startX, startY, currentX = 0, currentY = 0;

  img.onclick = () => {
    modal.style.display = "flex";
    resetZoom();
  }

  closeBtn.onclick = () => {
    modal.style.display = "none";
    resetZoom();
  }

  window.onclick = (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
      resetZoom();
    }
  }

  modalImg.onclick = (e) => {
    if (!zoomed) {
      zoomed = true;
      modalImg.style.transform = `scale(2) translate(0px, 0px)`;
      modalImg.style.cursor = 'grab';
    } else {
      resetZoom();
    }
    e.stopPropagation();
  }

  function resetZoom() {
    zoomed = false;
    currentX = currentY = 0;
    modalImg.style.transform = "scale(1)";
    modalImg.style.cursor = "zoom-in";
  }

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

  // Support drag di HP
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


function kirimProgressHalaman(namaHalaman) {
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

    // 🔥 GUNAKAN getElementById, BUKAN querySelector class
    const tombol = document.getElementById('btnSelanjutnya');
    if (tombol) {
      tombol.style.pointerEvents = 'auto';
      tombol.style.opacity = 1;
      tombol.removeAttribute('disabled');
    }
  })
  .catch(err => {
    console.error('❌ Gagal kirim progress:', err);
  });
}

  // Kirim progres otomatis saat halaman dibuka
document.addEventListener('DOMContentLoaded', function() {
  kirimProgressHalaman('b00-peta');
});


</script>

<div class="pagination">
  <a href="./b11-object" 
     id="btnSelanjutnya"
     class="next">
    Selanjutnya &raquo;
  </a>
</div>
@endsection
