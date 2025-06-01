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
<div class="materi-subbab1">
  <div class="hasil-kuis-wrapper">
    <h2 class="hasil-kuis-title">EVALUASI</h2>
    <p class="hasil-kuis-subtitle">Ujian Akhir</p>

    <hr>
    <h5 class="hasil-kuis-heading">HASIL EVALUASI</h5>

    <div class="hasil-kuis-section">
      <h6 class="hasil-kuis-label">WAKTU SELESAI</h6>
      @php \Carbon\Carbon::setLocale('id'); @endphp
      <p>Hari & Tanggal: <strong>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</strong></p>
    </div>

    <div class="hasil-kuis-nilai">
      <h6 class="hasil-kuis-label">NILAI</h6>
      <h1 class="hasil-kuis-score {{ ($result?->evaluasi ?? 0) >= $kkm ? 'text-success' : 'text-danger' }}">
        {{ $result?->evaluasi ?? 0 }}
      </h1>

      @php
  $json = json_decode($result->jawaban_json, true);
  $jawaban = $json['evaluasi'] ?? ['benar' => 0, 'salah' => 0];
@endphp

<p>Jawaban benar: {{ $jawaban['benar'] }}</p>
<p>Jawaban salah: {{ $jawaban['salah'] }}</p>

    </div>

    <div class="emoji-besar">
  {{ ($result?->evaluasi ?? 0) >= $kkm ? '🎉' : '💡' }}
</div>

<div class="hasil-kuis-alert alert {{ ($result?->evaluasi ?? 0) >= $kkm ? 'alert-success' : 'alert-danger' }}">
  {!! ($result?->evaluasi ?? 0) >= $kkm
      ? '<strong>Selamat!</strong> Kamu telah menyelesaikan <em>evaluasi akhir</em> dengan hasil memuaskan. Media ini resmi kamu taklukkan! 🎓💪'
      : '<strong>Semangat terus!</strong> Hasil ini bukan akhir, tapi langkah menuju lebih baik. Yuk coba lagi dan buktikan kamu bisa! 🚀' !!}
</div>


    <div id="btn-kkm" class="nextphp-kuis-btn-group">
      @if (($result?->evaluasi ?? 0) >= $kkm)
        <a href="{{ route('dashboard.mahasiswa') }}"
           class="nextphp-btn-mulai" style="background-color: #22c55e;">
          KEMBALI KE BERANDA
        </a>
      @else
        <a href="/b62-eval" class="nextphp-btn-mulai">ULANGI EVALUASI</a>
        <a href="/b11-object" class="nextphp-btn-kembali">KEMBALI KE MATERI</a>
      @endif
    </div>
  </div>
  @if (($result?->evaluasi ?? 0) >= $kkm)
<script>
  document.addEventListener('DOMContentLoaded', () => {
    kirimProgressHalaman('b63-heval');
  });
</script>
@endif
</div>


<style>
  .materi-subbab1 {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 2rem 1rem;
    background: #faf7ff;
  }

  .hasil-kuis-wrapper {
    background: #ffffff;
    border: 2px solid #c7b0f4;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(166, 136, 241, 0.1);
    padding: 1.5rem 2rem;
    width: 100%;
    max-width: 550px;
    text-align: center;
    font-family: "Segoe UI", sans-serif;
  }

  .hasil-kuis-title {
    color: #713ab2;
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 0.2rem;
  }

  .hasil-kuis-subtitle {
    color: #888;
    font-size: 0.95rem;
    margin-bottom: 1rem;
  }

  .hasil-kuis-label {
    font-size: 0.85rem;
    color: #6d28d9;
    margin-top: 1rem;
    text-transform: uppercase;
    font-weight: 600;
  }

  .hasil-kuis-heading {
    font-size: 1.2rem;
    margin: 0.8rem 0;
    font-weight: 600;
    color: #333;
  }

  .hasil-kuis-score {
    font-size: 3.5rem;
    margin: 0.4rem 0 0.2rem;
    font-weight: 800;
  }

  .hasil-kuis-nilai p {
    margin: 0;
    font-size: 0.95rem;
    color: #555;
  }

  .hasil-kuis-alert {
    margin-top: 1.5rem;
    padding: 1rem;
    font-size: 0.95rem;
    border-radius: 10px;
    border-left: 5px solid #c084fc;
    background: #f3e8ff;
    color: #4b0082;
  }

  .hasil-kuis-alert.alert-success {
    background: #e9fff2;
    color: #166534;
    border-left-color: #22c55e;
  }

  .hasil-kuis-alert.alert-danger {
    background: #fff1f2;
    color: #991b1b;
    border-left-color: #ef4444;
  }

  .emoji-besar {
    font-size: 2.5rem;
    margin-top: 1.2rem;
    animation: pop 1s ease-in-out;
  }

  @keyframes pop {
    0% { transform: scale(0); }
    50% { transform: scale(1.4); }
    100% { transform: scale(1); }
  }

  .nextphp-kuis-btn-group {
    margin-top: 2rem;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.8rem;
  }

  .nextphp-btn-mulai,
  .nextphp-btn-kembali {
    padding: 0.45rem 1.2rem;
    font-size: 0.9rem;
    border-radius: 8px;
    border: none;
    font-weight: 600;
    transition: 0.2s ease-in-out;
  }

  .nextphp-btn-mulai:hover,
  .nextphp-btn-kembali:hover {
    transform: translateY(-2px);
    opacity: 0.9;
  }
</style>



@if (($result?->evaluasi ?? 0) >= $kkm)
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
  window.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
      confetti({
        particleCount: 100,
        spread: 70,
        origin: { y: 0.6 },
        colors: ['#a172e8', '#c084fc', '#ffffff', '#bbf7d0'],
      });
    }, 500);
  });
</script>
@endif

@endsection
