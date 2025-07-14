@php
  use Illuminate\Support\Facades\Auth;
  $json = json_decode($result->jawaban_json, true);
  $jawaban = $json['kuis_5'] ?? ['benar' => 0, 'salah' => 0, 'jawaban' => []];
  $refleksi = $json['refleksi'] ?? [];

  $soalData = [
    [
      'nomor' => 1,
      'tipe' => 'isian',
      'instruksi' => 'Lengkapilah kode program berikut agar object dari class <code>Catatan</code> dapat disimpan di dalam sesi menggunakan serialisasi. Pastikan object tetap dapat digunakan meskipun halaman di-refresh.',
      'kode' => 'session_start(); class Catatan { ... }',
    ],
    [
      'nomor' => 2,
      'tipe' => 'drag-drop-urutan',
      'instruksi' => 'Susunlah potongan kode berikut agar menjadi program PHP yang benar.<br>Program ini mendefinisikan <code>class Data</code>, kemudian membuat object darinya, menyimpannya dengan <code>serialize()</code>, dan mengembalikannya dengan <code>unserialize()</code>. Terakhir, program mencetak hasil dari method <code>tampil()</code>.',
      'potongan' => [
        'echo "Hasil: " . $dataBaru->tampil();',
        '$dataBaru = unserialize($hasilSerial);',
        '$hasilSerial = serialize($data);',
        'class Data {',
        '$data = new Data();',
        'return "Data berhasil diproses.";',
        'public function tampil() {',
        '} // penutup method tampil()',
        '} // penutup class Data'
      ],
    ],
    [
      'nomor' => 3,
      'tipe' => 'isian-urut',
      'instruksi' => 'Susun potongan kode agar menjadi program PHP yang benar.<br>Program ini membuat <code>class Arsip</code> dengan dua properti. Saat object diserialisasi, hanya property <code>judul</code> yang disimpan dengan bantuan method <code>__sleep()</code>.',
      'potongan' => [
        'class Arsip {',
        'public $judul = "Catatan Rahasia";',
        'private $file;',
        'public function __sleep() {',
        "return ['judul'];",
        '} // penutup function __sleep()',
        '} // penutup class Arsip',
        '} // penutup akhir program',
        'echo serialize(new Arsip());'
      ],
    ],
    [
      'nomor' => 4,
      'tipe' => 'isian',
      'instruksi' => 'Lengkapilah kode agar saat object dari class <code>RiwayatLogin</code> diserialisasi, hanya properti tertentu yang disimpan. Gunakan magic method <code>__sleep()</code> dan <code>__wakeup()</code> untuk mengelola file log login pengguna.',
      'kode' => 'class RiwayatLogin { private $___; public function __sleep() { return [\'___\']; } public function __wakeup() { $this->___(); } private function ___() { echo "File log dibuka kembali."; } }',
    ],
    [
      'nomor' => 5,
      'tipe' => 'isian-urut',
      'instruksi' => 'Susunlah kode berikut agar program membuat object dari <code>class Log</code>, lalu diserialisasi dan di-unserialize. Saat deserialisasi, method <code>__wakeup()</code> dipanggil otomatis untuk membuka kembali file atau resource.',
      'potongan' => [
        'private function aktifkan() {',
        'echo "Log aktif kembali.\\n";',
        'public function __wakeup() {',
        'class Log {',
        '$logBaru = unserialize(serialize(new Log()));',
        '} // penutup function aktifkan()',
        'return $this->aktifkan();',
        '} // penutup function __wakeup()',
        '} // penutup class Log'
      ],
    ],
  ];
@endphp


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
    <h2 class="hasil-kuis-title">KUIS 5</h2>
    <p class="hasil-kuis-subtitle">Serialization</p>

    <hr>
    <h5 class="hasil-kuis-heading">HASIL KUIS</h5>

    <div class="hasil-kuis-section">
      <h6 class="hasil-kuis-label">WAKTU SELESAI</h6>
      @php \Carbon\Carbon::setLocale('id'); @endphp
      <p>Hari & Tanggal: <strong>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</strong></p>
    </div>

    <div class="hasil-kuis-nilai">
      <h6 class="hasil-kuis-label">NILAI</h6>
      <h1 class="hasil-kuis-score {{ ($result?->kuis_5 ?? 0) >= $kkm ? 'text-success' : 'text-danger' }}">
        {{ $result?->kuis_5 ?? 0 }}
      </h1>
      @php
        $json = json_decode($result->jawaban_json, true);
        $jawaban = $json['kuis_5'] ?? ['benar' => 0, 'salah' => 0];
      @endphp

      <p>Jawaban benar: {{ $jawaban['benar'] }}</p>
      <p>Jawaban salah: {{ $jawaban['salah'] }}</p>
    </div>

    <div class="hasil-kuis-alert alert {{ ($result?->kuis_5 ?? 0) >= $kkm ? 'alert-success' : 'alert-danger' }}">
      {{ ($result?->kuis_5 ?? 0) >= $kkm
          ? 'Selamat, skor kamu memenuhi untuk dapat lanjut ke ujian akhir di media ini, yaitu EVALUASI'
          : 'Mohon Maaf, skor kamu belum memenuhi untuk dapat lanjut ke ujian akhir di media ini, yaitu EVALUASI' }}
    </div>

    
<!-- REFLEKSI JAWABAN -->
 @if (($result?->kuis_5 ?? 0) >= $kkm && isset($json['refleksi']))
  <div class="hasil-kuis-refleksi mt-4">
    <h5 class="mb-3">🔎 Refleksi Jawaban</h5>

    <div class="accordion" id="accordionRefleksi">
      @foreach ($soalData as $i => $soal)
        @php
          $nomor = $soal['nomor'];
          $tipe = $soal['tipe'];
          $ref = $json['refleksi'][$i] ?? [];
          $userJawab = $ref['jawaban'] ?? '-';
          $benar = $ref['kunci'] ?? '-';
          $status = $ref['status'] ?? 'salah';
        @endphp

        <div class="accordion-item mb-2">
          <h2 class="accordion-header" id="heading{{ $i }}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
              Soal {{ $nomor }} &mdash; 
              <span class="badge ms-2 {{ $status === 'benar' ? 'bg-success' : 'bg-danger' }}">
                {{ strtoupper($status) }}
              </span>
            </button>
          </h2>

          <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionRefleksi">
            <div class="accordion-body">
              <p><strong>Instruksi:</strong> {!! $soal['instruksi'] !!}</p>

              {{-- Jawaban Siswa --}}
              <p class="mt-2 mb-1"><strong>Jawabanmu:</strong></p>
              @if ($tipe === 'drag-drop-urutan' || $tipe === 'isian-urut')
                <pre class="bg-light p-2 rounded">{{ is_array($userJawab) ? implode("\n", $userJawab) : $userJawab }}</pre>
              @elseif ($tipe === 'isian' || $tipe === 'drag-drop-isian')
                @if (is_array($userJawab))
                  <ul>
                    @foreach ($userJawab as $val)
                      <li>{{ $val }}</li>
                    @endforeach
                  </ul>
                @else
                  <pre class="bg-light p-2 rounded">{{ $userJawab }}</pre>
                @endif
              @else
                <pre class="bg-light p-2 rounded">{{ $userJawab }}</pre>
              @endif

              {{-- Kunci Jawaban --}}
              <p class="mt-3 mb-1"><strong>Jawaban Benar:</strong></p>
              @if ($tipe === 'isian' || $tipe === 'drag-drop-isian')
                @if (is_array($benar))
                  <ul>
                    @foreach ($benar as $val)
                      <li>{{ $val }}</li>
                    @endforeach
                  </ul>
                @else
                  <pre class="bg-light p-2 rounded">{{ $benar }}</pre>
                @endif
              @elseif ($tipe === 'drag-drop-urutan' || $tipe === 'isian-urut')
                <pre class="bg-light p-2 rounded">{{ is_array($benar) ? implode("\n", $benar) : $benar }}</pre>
              @else
                <pre class="bg-light p-2 rounded">{{ $benar }}</pre>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endif


    <div id="btn-kkm" class="nextphp-kuis-btn-group">
      @if (($result?->kuis_5 ?? 0) >= $kkm)
        <a href="/b61-peval"
           class="nextphp-btn-mulai" style="background-color: #22c55e;"
           onclick="event.preventDefault(); kirimProgressHalaman('b54-hkuis', '/b61-peval')">
          LANJUT KE MATERI BERIKUTNYA
        </a>
      @else
        <a href="/b53-kuis" class="nextphp-btn-mulai">ULANGI KUIS</a>
        <a href="/b51-konsepd" class="nextphp-btn-kembali">KEMBALI KE MATERI</a>
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
