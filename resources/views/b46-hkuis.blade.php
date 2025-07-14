@php
use Illuminate\Support\Facades\Auth;

$json = json_decode($result->jawaban_json, true);
$jawaban = $json['kuis_4'] ?? ['benar' => 0, 'salah' => 0];
$jawabanSiswa = $json['kuis_4']['jawaban'] ?? [];
$refleksi = $json['refleksi'] ?? [];

$soalData = [
  [
    'nomor' => 1,
    'tipe' => 'isian-urut',
    'instruksi' => 'Susun potongan kode berikut agar menjadi program PHP yang tepat. Gunakan <code>class</code> bernama <code>Alat</code> dengan dua method: <code>hidupkan()</code> dan <code>matikan()</code>. Buat object dengan nama <code>$obj</code>, kemudian gunakan <code>get_class_methods()</code> untuk mencetak semua method yang tersedia pada class Alat.<br><em><strong>Catatan:</strong> Terdapat dua baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (class atau perulangan).</em>',
    'potongan' => [
      '$methods = get_class_methods($obj);',
      'public function hidupkan() {}',
      'echo $m . "&lt;br&gt;";',
      'class Alat {',
      'foreach ($methods as $m) {',
      '$obj = new Alat();',
      '} // penutup class Alat',
      '} // penutup foreach',
      'public function matikan() {}'
    ],
    'jawaban' => [
      'class Alat {',
      'public function hidupkan() {}',
      'public function matikan() {}',
      '} // penutup class Alat',
      '$obj = new Alat();',
      '$methods = get_class_methods($obj);',
      'foreach ($methods as $m) {',
      'echo $m . "&lt;br&gt;";',
      '} // penutup foreach'
    ]
  ],
  [
    'nomor' => 2,
    'tipe' => 'isian',
    'instruksi' => 'Lengkapilah kode berikut agar program dapat: 1) Mengecek apakah variabel $akun adalah object, 2) Mengecek apakah object tersebut memiliki method masuk(), 3) Jika ya, jalankan method tersebut dan cetak hasilnya.',
    'kode' => 'class Akun {\n    public $username = "hana";\n    public function masuk() {\n        return "Login berhasil.";\n    }\n}\n$akun = new Akun();\nif (___($akun)) {\n    if (___($akun, "masuk")) {\n        echo $akun->___();\n    }\n}',
    'input' => ['___', '___', '___'],
    'jawaban' => ['is_object', 'method_exists', 'masuk']
  ],
  [
    'nomor' => 3,
    'tipe' => 'isian-urut',
    'instruksi' => 'Susun potongan kode berikut agar menjadi program PHP yang tepat dan mencetak semua class yang tersedia dalam skrip, satu per baris.',
    'potongan' => [
      'echo $class . "&lt;br&gt;";',
      '$daftar = get_declared_classes();',
      'foreach ($daftar as $class) {',
      '&lt;?php',
      '}',
      '?&gt;'
    ],
    'jawaban' => [
      '&lt;?php',
      '$daftar = get_declared_classes();',
      'foreach ($daftar as $class) {',
      'echo $class . "&lt;br&gt;";',
      '}',
      '?&gt;'
    ]
  ],
  [
    'nomor' => 4,
    'tipe' => 'drag-drop-isian',
    'instruksi' => 'Lengkapilah bagian kosong agar program dapat menampilkan semua property (baik public maupun private) yang dideklarasikan dalam class <code>User</code>.',
    'kode' => 'class User {\n    public $nama;\n    private $email;\n}\n$ref = new ___("User");\n$props = $ref->___();\nforeach ($props as $p) {\n    echo $p->___() . "&lt;br&gt;";\n}',
    'drop' => ['getProperties', 'getName', 'User', 'ReflectionClass'],
    'jawaban' => ['ReflectionClass', 'getProperties', 'getName']
  ],
  [
    'nomor' => 5,
    'tipe' => 'isian',
    'instruksi' => 'Lengkapilah kode berikut agar program mencetak nama class induk dari object <code>$produk</code>.',
    'kode' => 'class Barang {}\nclass Produk extends Barang {}\n\n$produk = new Produk();\n$induk = ___($produk);\n\necho "Class induknya: " . ($induk ? $induk : "Tidak ada");',
    'input' => ['___'],
    'jawaban' => ['get_parent_class']
  ]
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
    <h2 class="hasil-kuis-title">KUIS 4</h2>
    <p class="hasil-kuis-subtitle">Introspection</p>

    <hr>
    <h5 class="hasil-kuis-heading">HASIL KUIS</h5>

    <div class="hasil-kuis-section">
      <h6 class="hasil-kuis-label">WAKTU SELESAI</h6>
      @php \Carbon\Carbon::setLocale('id'); @endphp
      <p>Hari & Tanggal: <strong>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</strong></p>
    </div>

    <div class="hasil-kuis-nilai">
      <h6 class="hasil-kuis-label">NILAI</h6>
      <h1 class="hasil-kuis-score {{ ($result?->kuis_4 ?? 0) >= $kkm ? 'text-success' : 'text-danger' }}">
        {{ $result?->kuis_4 ?? 0 }}
      </h1>
      @php
        $json = json_decode($result->jawaban_json, true);
        $jawaban = $json['kuis_4'] ?? ['benar' => 0, 'salah' => 0];
      @endphp

      <p>Jawaban benar: {{ $jawaban['benar'] }}</p>
      <p>Jawaban salah: {{ $jawaban['salah'] }}</p>
    </div>

    <div class="hasil-kuis-alert alert {{ ($result?->kuis_4 ?? 0) >= $kkm ? 'alert-success' : 'alert-danger' }}">
      {{ ($result?->kuis_4 ?? 0) >= $kkm
          ? 'Selamat, skor kamu memenuhi untuk dapat lanjut ke materi berikutnya'
          : 'Mohon Maaf, skor kamu belum memenuhi untuk dapat lanjut ke materi berikutnya' }}
    </div>


<!-- REFLEKSI JAWABAN -->
 @if (($result?->kuis_4 ?? 0) >= $kkm)
<div class="refleksi-jawaban mt-5">
  <h4 class="mb-4 fw-bold">🔎 Refleksi Jawaban</h4>

  <div class="alert alert-info shadow-sm rounded">
    <i class="bi bi-info-circle-fill me-2"></i>
    Kamu menjawab <strong>{{ $jawaban['benar'] }}</strong> dari <strong>{{ count($soalData) }}</strong> soal dengan benar.
  </div>

  <div class="accordion" id="refleksiAccordion">
    @foreach ($soalData as $i => $soal)
      @php
        $userJawab = $jawabanSiswa[$i] ?? null;
        $tipe = $soal['tipe'];
        $benar = $soal['jawaban'];
        $isBenar = $refleksi[$i]['benar'] ?? false;
        $statusBadge = $isBenar ? 'success' : 'danger';
        $statusText = $isBenar ? '✔ Benar' : '✘ Salah';
        $bgCard = $isBenar ? 'border-success' : 'border-danger';
      @endphp

      <div class="accordion-item mb-3 border {{ $bgCard }} shadow-sm">
        <h2 class="accordion-header" id="heading-{{ $i }}">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $i }}">
            Soal {{ $i + 1 }}
            <span class="badge bg-{{ $statusBadge }} ms-3">{{ $statusText }}</span>
          </button>
        </h2>

        <div id="collapse-{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#refleksiAccordion">
          <div class="accordion-body">
  <p class="mb-3">{!! $soal['instruksi'] ?? '' !!}</p>

  @if ($tipe === 'drag-drop-urutan' || $tipe === 'isian-urut')
    <div class="mb-2"><strong>Jawabanmu:</strong>
      <pre class="bg-light p-2 rounded">{{ is_array($userJawab) ? implode("\n", $userJawab) : $userJawab }}</pre>
    </div>
    <div><strong>Jawaban Benar:</strong>
      <pre class="bg-light p-2 rounded">{{ is_array($benar) ? implode("\n", $benar) : $benar }}</pre>
    </div>

  @elseif ($tipe === 'drag-drop-isian' || $tipe === 'isian')
    <div class="mb-2"><strong>Jawabanmu:</strong>
      @if (is_array($userJawab))
        <ul>@foreach ($userJawab as $val)<li>{{ $val }}</li>@endforeach</ul>
      @elseif (is_string($userJawab))
        <pre class="bg-light p-2 rounded">{{ $userJawab }}</pre>
      @else
        <p><em class="text-muted">Belum ada jawaban.</em></p>
      @endif
    </div>
    <div><strong>Jawaban Benar:</strong>
      @if (is_array($benar))
        <ul>@foreach ($benar as $val)<li>{{ $val }}</li>@endforeach</ul>
      @else
        <pre class="bg-light p-2 rounded">{{ $benar }}</pre>
      @endif
    </div>
  @endif
</div>

        </div>
      </div>
    @endforeach
  </div>
</div>
@endif



    <div id="btn-kkm" class="nextphp-kuis-btn-group">
      @if (($result?->kuis_4 ?? 0) >= $kkm)
        <a href="/b51-konsepd"
           class="nextphp-btn-mulai" style="background-color: #22c55e;"
           onclick="event.preventDefault(); kirimProgressHalaman('b46-hkuis', '/b51-konsepd')">
          LANJUT KE MATERI BERIKUTNYA
        </a>
      @else
        <a href="/b45-kuis" class="nextphp-btn-mulai">ULANGI KUIS</a>
        <a href="/b43-contohpi" class="nextphp-btn-kembali">KEMBALI KE MATERI</a>
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
