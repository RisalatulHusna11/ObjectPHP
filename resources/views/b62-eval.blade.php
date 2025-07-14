@php use Illuminate\Support\Facades\Auth; @endphp

@extends(
  Auth::check()
    ? (Auth::user()->role === 'mahasiswa'
        ? 'layout.mainMateriM'
        : (Auth::user()->role === 'dosen' ? 'layout.mainMateriBukaD' : 'layout.mainMateriBukaG')
      )
    : 'layout.mainMateriBukaG'
)


@section('container')
<div class="materi-subbab1 kuis-wrapper">
  <div class="kuis-header-bar">
    <h4>EVALUASI OOP PHP</h4>
    <div id="timer-kuis" class="kuis-timer-kuis1">60:00</div>
  </div>

  <div class="kuis-body">
    <div class="kuis-sidebar">
      <h6>NAVIGASI SOAL</h6>
      <div class="kuis-nav-buttons" id="nav-buttons"></div>
      <div class="kuis-progress">
        <small>Progres: <span id="progress-text">0/20</span></small>
        <div class="progress">
          <div class="progress-bar bg-purple" id="progress-bar" style="width: 0%"></div>
        </div>
      </div>
      <div class="kuis-keterangan">
        <div><span class="legend belum"></span> Belum dijawab</div>
        <div><span class="legend sudah"></span> Sudah dijawab</div>
      </div>
    </div>

    <div class="kuis-content">
      <div id="soal-container"></div>
      <div class="kuis-actions">
        <button class="btn-next" onclick="prevSoal()">&laquo; Sebelumnya</button>
        <button class="btn-next" onclick="nextSoal()">Berikutnya &raquo;</button>
      </div>
      @if(Auth::user()->role !== 'dosen')
      <button id="btnSelesai" class="btn-selesai" onclick="tampilkanModal()" disabled>SELESAI</button>
      @endif
    </div>
  </div>

  {{-- MODAL KONFIRMASI --}}
  <div class="modal fade" id="modalKonfirmasi" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Selesai</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Apakah kamu yakin telah menyelesaikan semua soal evaluasi?
        </div>
        <div class="modal-footer">
          <button type="button" class="btnb-kuis1 btn-danger" data-bs-dismiss="modal">BATAL</button>
          <button type="button" class="btns-kuis1 btn-success" onclick="prosesSelesai()">SELESAI</button>
        </div>
      </div>
    </div>
  </div>

<script src="{{ asset('js/eval.js') }}"></script>
<script>
@if(Auth::user()->role !== 'dosen')
function mulaiTimer() {
  timerInterval = setInterval(() => {
    const timerEl = document.getElementById('timer-kuis');
    if (!timerEl) return;
    waktu--;
    const m = String(Math.floor(waktu / 60)).padStart(2, '0');
    const s = String(waktu % 60).padStart(2, '0');
    timerEl.textContent = `${m}:${s}`;
    if (waktu <= 0) {
      clearInterval(timerInterval);
      prosesSelesai();
    }
  }, 1000);
}
@endif
</script>
</div>
@endsection
