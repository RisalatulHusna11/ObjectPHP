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
    <h2 class="hasil-kuis-title">KUIS 1</h2>
    <p class="hasil-kuis-subtitle">Pengenalan</p>

    <hr>
    <h5 class="hasil-kuis-heading">HASIL KUIS</h5>

    <div class="hasil-kuis-section">
      <h6 class="hasil-kuis-label">WAKTU SELESAI</h6>
      @php \Carbon\Carbon::setLocale('id'); @endphp
      <p>Hari & Tanggal: <strong>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</strong></p>
    </div>

    <div class="hasil-kuis-nilai">
      <h6 class="hasil-kuis-label">NILAI</h6>
      <h1 class="hasil-kuis-score {{ ($result?->kuis_1 ?? 0) >= $kkm ? 'text-success' : 'text-danger' }}">
        {{ $result?->kuis_1 ?? 0 }}
      </h1>
      @php
        $json = json_decode($result->jawaban_json, true);
        $jawaban = $json['kuis_1'] ?? ['benar' => 0, 'salah' => 0];
      @endphp

      <p>Jawaban benar: {{ $jawaban['benar'] }}</p>
      <p>Jawaban salah: {{ $jawaban['salah'] }}</p>

    </div>

    <div class="hasil-kuis-alert alert {{ ($result?->kuis_1 ?? 0) >= $kkm ? 'alert-success' : 'alert-danger' }}">
      {{ ($result?->kuis_1 ?? 0) >= $kkm
          ? 'Selamat, skor kamu memenuhi untuk dapat lanjut ke materi berikutnya'
          : 'Mohon Maaf, skor kamu belum memenuhi untuk dapat lanjut ke materi berikutnya' }}
    </div>

    <div id="btn-kkm" class="nextphp-kuis-btn-group">
      @if (($result?->kuis_1 ?? 0) >= $kkm)
        <a href="/b21-mendeklarasikanm"
           class="nextphp-btn-mulai" style="background-color: #22c55e;"
           onclick="event.preventDefault(); kirimProgressHalaman('b17-hkuis', '/b21-mendeklarasikanm')">
          LANJUT KE MATERI BERIKUTNYA
        </a>
      @else
        <a href="/b16-kuis" class="nextphp-btn-mulai">ULANGI KUIS</a>
        <a href="/b11-object" class="nextphp-btn-kembali">KEMBALI KE MATERI</a>
      @endif
    </div>
  </div>
</div>

<script>
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
      if (redirectUrl) window.location.href = redirectUrl;
    })
    .catch(err => {
      console.error('❌ Gagal kirim progress:', err);
    });
  }
</script>
@endsection
