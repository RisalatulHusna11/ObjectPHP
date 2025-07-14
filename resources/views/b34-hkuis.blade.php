@php
  use Illuminate\Support\Facades\Auth;

  $json = json_decode($result->jawaban_json, true);
  $jawaban = $json['kuis_3'] ?? ['benar' => 0, 'salah' => 0];
  $jawabanSiswa = $json['kuis_3']['jawaban'] ?? [];
  $refleksi = $json['refleksi'] ?? [];

  // Tambahkan ini:
$soalData = [
  [
    'nomor' => 1,
    'tipe' => 'isian-urut',
    'instruksi' => 'Susunlah potongan kode berikut agar menjadi program PHP yang benar. Gunakan variabel bernama <code>$objek</code>, yang merupakan object dari anonymous class. Class tersebut memiliki method <code>sapa()</code> yang mengembalikan teks <code>"Halo dari anonymous class!"</code>.',
    'potongan' => [
      'echo $objek->sapa();',
      'public function sapa() {',
      'return "Halo dari anonymous class!";',
      '$objek = new class() {',
      '}',
      '};'
    ],
    'jawaban' => [
      '$objek = new class() {',
      'public function sapa() {',
      'return "Halo dari anonymous class!";',
      '}',
      '};',
      'echo $objek->sapa();'
    ]
  ],
  [
    'nomor' => 2,
    'tipe' => 'isian',
    'instruksi' => 'Lengkapilah bagian kosong pada kode berikut agar program mencetak <code>"Barang spesial dikemas."</code>. Gunakan <code>class Barang</code> sebagai induk dan buat anonymous class yang mewarisi serta meng-override method <code>kemas()</code>.',
    'kode' => 'class Barang {
    public function kemas() {
        return "Barang dikemas.";
    }
}

$produk = new class() ___ Barang {
    public function ___() {
        return "Barang spesial dikemas.";
    }
};

echo $produk->___();',
    'input' => ['extends', 'kemas', 'kemas'],
    'jawaban' => ['extends', 'kemas', 'kemas']
  ],
  [
    'nomor' => 3,
    'tipe' => 'drag-drop-urutan',
    'instruksi' => 'Susunlah potongan kode berikut menjadi program PHP yang benar. Gunakan variabel <code>$obj</code> sebagai object dari anonymous class yang memiliki property <code>$angka = 10</code> dan method <code>ambilNilai()</code> yang mengembalikan "Nilai: 10", kemudian cetak hasilnya.',
    'potongan' => [
      'return "Nilai: " . $this->angka;',
      'public $angka = 10;',
      '$obj = new class() {',
      'echo $obj->ambilNilai();',
      'public function ambilNilai() {',
      '};',
      '}'
    ],
    'jawaban' => [
      '$obj = new class() {',
      'public $angka = 10;',
      'public function ambilNilai() {',
      'return "Nilai: " . $this->angka;',
      '}',
      '};',
      'echo $obj->ambilNilai();'
    ]
  ],
  [
    'nomor' => 4,
    'tipe' => 'drag-drop-isian',
    'instruksi' => 'Lengkapilah kode berikut agar anonymous class berhasil mengimplementasikan interface <code>View</code> dan mencetak <code>"Menampilkan halaman..."</code>.',
    'kode' => 'interface View {
    public function render();
}
$page = new class() ___ View {
    public function ___() {
        echo "Menampilkan halaman...";
    }
};
$page->___();',
    'drop' => ['View', 'implements', 'render'],
    'jawaban' => ['implements', 'render', 'render']
  ],
  [
    'nomor' => 5,
    'tipe' => 'isian-urut',
    'instruksi' => 'Susunlah potongan kode berikut agar menjadi program PHP yang benar. Buat anonymous class dengan constructor yang menerima parameter <code>$nama</code>. Gunakan object <code>$ucapan</code> untuk mencetak <code>"Selamat datang, Hana!"</code> menggunakan method <code>tampil()</code>.',
    'potongan' => [
      'private $nama;',
      'return "Selamat datang, " . $this->nama . "!";',
      'public function __construct($nama) {',
      'echo $ucapan->tampil();',
      'public function tampil() {',
      '$ucapan = new class("Hana") {',
      '}',
      '$this->nama = $nama;'
    ],
    'jawaban' => [
      '$ucapan = new class("Hana") {',
      'private $nama;',
      'public function __construct($nama) {',
      '$this->nama = $nama;',
      'public function tampil() {',
      'return "Selamat datang, " . $this->nama . "!";',
      '}',
      'echo $ucapan->tampil();'
    ]
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
    <h2 class="hasil-kuis-title">KUIS 3</h2>
    <p class="hasil-kuis-subtitle">Anonymous Classes</p>

    <hr>
    <h5 class="hasil-kuis-heading">HASIL KUIS</h5>

    <div class="hasil-kuis-section">
      <h6 class="hasil-kuis-label">WAKTU SELESAI</h6>
      @php \Carbon\Carbon::setLocale('id'); @endphp
      <p>Hari & Tanggal: <strong>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</strong></p>
    </div>

    <div class="hasil-kuis-nilai">
      <h6 class="hasil-kuis-label">NILAI</h6>
      <h1 class="hasil-kuis-score {{ ($result?->kuis_3 ?? 0) >= $kkm ? 'text-success' : 'text-danger' }}">
        {{ $result?->kuis_3 ?? 0 }}
      </h1>
      @php
        $json = json_decode($result->jawaban_json, true);
        $jawaban = $json['kuis_3'] ?? ['benar' => 0, 'salah' => 0];
      @endphp

      <p>Jawaban benar: {{ $jawaban['benar'] }}</p>
      <p>Jawaban salah: {{ $jawaban['salah'] }}</p>
    </div>

    <div class="hasil-kuis-alert alert {{ ($result?->kuis_3 ?? 0) >= $kkm ? 'alert-success' : 'alert-danger' }}">
      {{ ($result?->kuis_3 ?? 0) >= $kkm
          ? 'Selamat, skor kamu memenuhi untuk dapat lanjut ke materi berikutnya'
          : 'Mohon Maaf, skor kamu belum memenuhi untuk dapat lanjut ke materi berikutnya' }}
    </div>


<!-- REFLEKSI JAWABAN -->
@if (($result?->kuis_3 ?? 0) >= $kkm)
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
                @elseif (is_string($benar))
                  <pre class="bg-light p-2 rounded">{{ $benar }}</pre>
                @else
                  <p><em class="text-muted">Tidak tersedia.</em></p>
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
      @if (($result?->kuis_3 ?? 0) >= $kkm)
        <a href="/b41-memeriksac"
           class="nextphp-btn-mulai" style="background-color: #22c55e;"
           onclick="event.preventDefault(); kirimProgressHalaman('b34-hkuis', '/b41-memeriksac')">
          LANJUT KE MATERI BERIKUTNYA
        </a>
      @else
        <a href="/b33-kuis" class="nextphp-btn-mulai">ULANGI KUIS</a>
        <a href="/b31-konsepd" class="nextphp-btn-kembali">KEMBALI KE MATERI</a>
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
