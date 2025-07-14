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
    <h2 class="hasil-kuis-title">KUIS 2</h2>
    <p class="hasil-kuis-subtitle">Mendeklarasikan Class</p>

    <hr>
    <h5 class="hasil-kuis-heading">HASIL KUIS</h5>

    <div class="hasil-kuis-section">
      <h6 class="hasil-kuis-label">WAKTU SELESAI</h6>
      @php \Carbon\Carbon::setLocale('id'); @endphp
      <p>Hari & Tanggal: <strong>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</strong></p>
    </div>

    <div class="hasil-kuis-nilai">
      <h6 class="hasil-kuis-label">NILAI</h6>
      <h1 class="hasil-kuis-score {{ ($result?->kuis_2 ?? 0) >= $kkm ? 'text-success' : 'text-danger' }}">
        {{ $result?->kuis_2 ?? 0 }}
      </h1>
      @php
        $json = json_decode($result->jawaban_json, true);
        $jawaban = $json['kuis_2'] ?? ['benar' => 0, 'salah' => 0];
      @endphp

      <p>Jawaban benar: {{ $jawaban['benar'] }}</p>
      <p>Jawaban salah: {{ $jawaban['salah'] }}</p>

    </div>

    <div class="hasil-kuis-alert alert {{ ($result?->kuis_2 ?? 0) >= $kkm ? 'alert-success' : 'alert-danger' }}">
      {{ ($result?->kuis_2 ?? 0) >= $kkm
          ? 'Selamat, skor kamu memenuhi untuk dapat lanjut ke materi berikutnya'
          : 'Mohon Maaf, skor kamu belum memenuhi untuk dapat lanjut ke materi berikutnya' }}
    </div>

    @php
$json = json_decode($result->jawaban_json, true);
$jawaban = $json['kuis_2'] ?? ['benar' => 0, 'salah' => 0];
$jawabanSiswa = $json['kuis_2']['jawaban'] ?? [];

$soalData = [
  [
    'tipe' => 'drag-drop-urutan',
    'instruksi' => 'Susunlah potongan-potongan kode berikut agar menjadi program PHP yang benar...',
    'potongan' => [
      "const MINIMUM_UMUR = 17;",
      "class Verifikasi {",
      "echo Verifikasi::MINIMUM_UMUR;",
      "}",
    ],
    'jawaban' => [
      "class Verifikasi {",
      "const MINIMUM_UMUR = 17;",
      "}",
      "echo Verifikasi::MINIMUM_UMUR;"
    ]
  ],
  [
    'tipe' => 'drag-drop-isian',
    'instruksi' => 'Lengkapilah bagian kosong agar program dapat berjalan dengan benar. Gunakan nama class: Dokumen, dan method tampil() yang mencetak: Dokumen dicetak.. Lengkapi bagian yang kosong agar output tersebut tercetak ketika objek $laporan dipanggil.',
    'kode' => 'interface Cetak {
    public function tampil();
}
class Dokumen ___ Cetak {
    public function ___() {
        echo "Dokumen dicetak.";
    }
}
$laporan = new Dokumen();
$laporan->___();',
    'drop' => ["implements", "Dokumen", "tampil"],
    'jawaban' => ["implements", "tampil", "tampil"]
  ],
  [
    'tipe' => 'isian',
    'instruksi' => 'Lengkapilah bagian kosong pada class berikut agar setiap kali object dibuat, nilai static property $jumlah bertambah 1.',
    'kode' => 'class Penghitung {
    public static $jumlah = 0;
    public function __construct() {
        ___::$jumlah++;
    }
    public static function tampilkan() {
        echo "Jumlah saat ini: " . ___::$jumlah;
    }
}',
    'input' => ["self", "self"],
    'jawaban' => ["self", "self"]
  ],
  [
    'tipe' => 'isian-urut',
    'instruksi' => 'Susun potongan kode berikut agar menjadi program PHP yang benar. Buat sebuah class bernama <code>Hewan</code> dengan properti <code>$jenis</code> bernilai "Kucing" dan sebuah method <code>info()</code> yang mencetak.<p><em><strong>Catatan:</strong> Terdapat tiga baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (<code>method</code> atau <code>class</code>).</em></p>',
    'potongan' => [
      "echo (new Hewan())->info();",
      "public \$jenis = \"Kucing\";",
      "public function info() {",
      "class Hewan {",
      "return \"Jenis hewan: \" . \$this->jenis;",
      "} // penutup method info()",
      "} // penutup class Hewan",
      "?>",
      "&lt;?php"
    ],
    'jawaban' => [
      "&lt;?php",
      "class Hewan {",
      "public \$jenis = \"Kucing\";",
      "public function info() {",
      "return \"Jenis hewan: \" . \$this->jenis;",
      "} // penutup method info()",
      "} // penutup class Hewan",
      "echo (new Hewan())->info();",
      "?>"
    ]
  ],
  [
    'tipe' => 'isian-urut',
    'instruksi' => 'Susunlah potongan kode berikut agar menjadi program PHP yang benar. Class <code>Rekening</code> memiliki properti <code>$saldo</code> dengan nilai 5000 dan sebuah method <code>lihatSaldo()</code> yang mencetak.<p><em><strong>Catatan:</strong> Terdapat tiga baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (<code>function</code> atau <code>class</code>).</em></p>',
    'potongan' => [
      "echo \$akun->lihatSaldo();",
      "class Rekening {",
      "public \$saldo = 5000;",
      "public function lihatSaldo() {",
      "return \"Saldo: Rp. \" . \$this->saldo;",
      "} // penutup function lihatSaldo()",
      "} // penutup class Rekening",
      "\$akun = new Rekening();",
      "&lt;?php",
      "?&gt;"
    ],
    'jawaban' => [
      "&lt;?php",
      "class Rekening {",
      "public \$saldo = 5000;",
      "public function lihatSaldo() {",
      "return \"Saldo: Rp. \" . \$this->saldo;",
      "} // penutup function lihatSaldo()",
      "} // penutup class Rekening",
      "\$akun = new Rekening();",
      "echo \$akun->lihatSaldo();",
      "?&gt;"
    ]
  ],
];
@endphp

@if (($result?->kuis_2 ?? 0) >= $kkm)
<div class="refleksi-jawaban mt-5">
  <h4 class="mb-4 fw-bold">🔎 Refleksi Jawaban </h4>

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
        $isBenar = false;

        if ($tipe === 'drag-drop-urutan' || $tipe === 'drag-drop-isian' || $tipe === 'isian') {
          $isBenar = is_array($userJawab) && is_array($benar) && $userJawab === $benar;
        } elseif ($tipe === 'isian-urut') {
          $urutIndex = collect(explode(' ', $userJawab))->map(fn($v) => $soal['potongan'][(int)$v - 1] ?? '')->toArray();
          $isBenar = $urutIndex === $benar;
        }

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
      <ul>
        @foreach ($userJawab as $val)
          <li>{{ $val }}</li>
        @endforeach
      </ul>
    @elseif (is_string($userJawab))
      <pre class="bg-light p-2 rounded">{{ $userJawab }}</pre>
    @else
      <p><em class="text-muted">Belum ada jawaban.</em></p>
    @endif
  </div>

  <div><strong>Jawaban Benar:</strong>
    @if (is_array($benar))
      <ul>
        @foreach ($benar as $val)
          <li>{{ $val }}</li>
        @endforeach
      </ul>
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
      @if (($result?->kuis_2 ?? 0) >= $kkm)
        <a href="/b31-konsepd"
           class="nextphp-btn-mulai" style="background-color: #22c55e;"
           onclick="event.preventDefault(); kirimProgressHalaman('b212-hkuis', '/b31-konsepd')">
          LANJUT KE MATERI BERIKUTNYA
        </a>
      @else
        <a href="/b211-kuis" class="nextphp-btn-mulai">ULANGI KUIS</a>
        <a href="/b21-mendeklarasikanm" class="nextphp-btn-kembali">KEMBALI KE MATERI</a>
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
