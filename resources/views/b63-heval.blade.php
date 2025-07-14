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
  $refleksi = json_decode($result->jawaban_json, true);
  $jawabanUser = $refleksi['evaluasi']['jawaban'] ?? [];
@endphp


@php
  $benar = $refleksi['evaluasi']['benar'] ?? 0;
  $salah = $refleksi['evaluasi']['salah'] ?? 0;
@endphp

<p>Jawaban benar: {{ $benar }}</p>
<p>Jawaban salah: {{ $salah }}</p>
   </div>

    <div class="emoji-besar">
      {{ ($result?->evaluasi ?? 0) >= $kkm ? '🎉' : '💡' }}
    </div>

    <div class="hasil-kuis-alert alert {{ ($result?->evaluasi ?? 0) >= $kkm ? 'alert-success' : 'alert-danger' }}">
      {!! ($result?->evaluasi ?? 0) >= $kkm
          ? '<strong>Selamat!</strong> Kamu telah menyelesaikan <em>evaluasi akhir</em> dengan hasil memuaskan. Media ini resmi kamu taklukkan! 🎓💪'
          : '<strong>Semangat terus!</strong> Hasil ini bukan akhir, tapi langkah menuju lebih baik. Yuk coba lagi dan buktikan kamu bisa! 🚀' !!}
    </div>

    {{-- REFLEKSI JAWABAN --}}
    @if (($result?->evaluasi ?? 0) >= $kkm && $result && isset($result->jawaban_json))
      @php
        $refleksi = json_decode($result->jawaban_json, true);
        $jawabanUser = $refleksi['refleksi'] ?? [];
        $kunci = [2, 3, 4, 1, 2, 2, 1, 3, 2, 1, 1, 2, 2, 2, 1, 0, 1, 0, 2, 0];

        $soalData = [
  ['pertanyaan' => 'Alasan utama penggunaan object dalam OOP dibandingkan sekadar menyimpan data dalam array adalah …', 'opsi' => ['Object lebih cepat dieksekusi', 'Array tidak mendukung method', 'Object menyatukan data dan perilaku dalam satu entitas', 'Object tidak bisa diubah setelah dibuat', 'Array membutuhkan lebih banyak resource']],
  ['pertanyaan' => 'Jika kamu membuat object dari class Siswa, maka hasil dari get_class($obj) akan mengembalikan...', 'opsi' => ['Nama method aktif', 'Tipe data object', 'String "Object"', 'Nama class: "Siswa"', 'NULL']],
  ['pertanyaan' => 'Dalam paradigma OOP, alasan penting untuk menghindari variabel global dan lebih memilih property dalam object yaitu …', 'opsi' => ['Variabel global tidak efisien dalam OOP', 'Untuk menjaga struktur kode tetap procedural', 'Untuk meningkatkan fleksibilitas inheritance', 'Karena property hanya bisa dibuat di dalam object', 'Untuk menjaga enkapsulasi dan modularitas program']],
  ['pertanyaan' => 'class Kalkulator { public static function tambah($a, $b) { return $a + $b; } } echo Kalkulator::tambah(3, 5); Fungsi penggunaan static pada method di atas adalah …', 'opsi' => ['Agar method hanya bisa dipanggil dalam class turunan', 'Agar method dapat diakses tanpa membuat object', 'Agar method bersifat private secara default', 'Agar method tidak bisa diubah', 'Agar method dijalankan otomatis saat class dibuat']],
  ['pertanyaan' => 'Perhatikan kode program di bawah ini! class Kendaraan { final public function nyalakan() { return \'Mesin menyala\'; } } class Mobil extends Kendaraan { public function nyalakan() { return \'Mobil dinyalakan\'; } } $toyota = new Mobil(); echo $toyota->nyalakan(); Yang akan terjadi jika kode di atas dijalankan adalah ...', 'opsi' => ['Kode berhasil dijalankan dan mencetak "Mobil dinyalakan"', 'Method nyalakan pada Mobil menimpa method final', 'Akan terjadi error karena method final tidak bisa ditimpa', 'PHP mengabaikan method final', 'Outputnya tetap "Mesin menyala"']],
  ['pertanyaan' => 'Yang akan terjadi jika method __construct() tidak dipanggil menggunakan parent::__construct() di class turunan adalah …', 'opsi' => ['Program tetap berjalan seperti biasa', 'Property dari induk akan diakses secara otomatis', 'Konstruktor induk tidak dijalankan, sehingga property bisa tidak terisi', 'Konstruktor induk akan tertimpa', 'Property subclass akan mewarisi semua method induk']],
  ['pertanyaan' => 'Keunggulan utama anonymous class dalam pengujian unit (unit testing) yaitu …', 'opsi' => ['Lebih cepat dieksekusi', 'Dapat digunakan untuk membuat object tanpa definisi class baru', 'Bisa digunakan untuk menulis ulang interface', 'Digunakan untuk serialisasi', 'Bisa diakses dari luar file']],
  ['pertanyaan' => 'class { public $nilai = 100; public function tampil() { return $this->nilai; } }; echo $obj->tampil(); Output dari kode di atas adalah …', 'opsi' => ['0', 'NULL', 'Error', '100', 'tampil']],
  ['pertanyaan' => 'Alasan anonymous class tidak cocok untuk digunakan berulang kali di banyak file yaitu …', 'opsi' => ['Karena tidak bisa memiliki property', 'Karena terlalu berat', 'Karena tidak bisa di-serialize dan tidak memiliki nama', 'Karena tidak mendukung inheritance', 'Karena tidak dapat digunakan dalam loop']],
  ['pertanyaan' => 'Fungsi get_object_vars() dalam introspeksi digunakan untuk...', 'opsi' => ['Menampilkan semua class aktif', 'Menampilkan properti yang telah diisi dalam object', 'Menampilkan seluruh method', 'Menampilkan subclass', 'Menampilkan konstanta class']],
  ['pertanyaan' => 'class User { public $nama = "Ayu"; private $email = "a@example.com"; } $user = new User(); print_r(get_object_vars($user)); Output dari kode di atas adalah …', 'opsi' => ['Menampilkan semua property termasuk private', 'Menampilkan hanya public property nama', 'Menampilkan isi method', 'Menampilkan string kosong', 'Menampilkan class User']],
  ['pertanyaan' => 'Fungsi introspeksi method_exists() dapat digunakan untuk...', 'opsi' => ['Membuat method baru saat runtime', 'Menentukan visibilitas property', 'Mengecek apakah object memiliki method tertentu', 'Menyalin class dari object', 'Membuat anonymous class baru']],
  ['pertanyaan' => 'class Sesi { public $status = "aktif"; public function __sleep() { return ["status"]; } } $s = new Sesi(); echo serialize($s); Hasil dari kode di atas adalah …', 'opsi' => ['"aktif"', 'Objek kosong', 'String representasi object hanya berisi properti status', 'Error karena method __sleep() tidak mengembalikan array', 'NULL']],
  ['pertanyaan' => 'class Data { public $pesan; public function __construct($p) { $this->pesan = $p; } } $d = new Data("Selamat datang!"); $s = serialize($d); $o = unserialize($s); echo $o->pesan; Output dari program tersebut adalah …', 'opsi' => ['Menampilkan hanya public property nama', 'NULL', 'Error karena property tidak dikenali', '"Selamat datang!"', '"Data"']],
  ['pertanyaan' => 'class Log { private $file; public function __wakeup() { $this->file = fopen("log.txt", "a"); } } $log = unserialize(serialize(new Log())); Yang dilakukan oleh program tersebut adalah …', 'opsi' => ['Menulis log ke file', 'Membuka file setelah deserialisasi', 'Menampilkan isi file', 'Menutup koneksi database', 'Error karena file tidak ditentukan']],
  ['pertanyaan' => '1) return $a * $b; 2) echo $hasil->kali(3, 4); 3) $hasil = new class { 4) public function kali($a, $b) { 5) }; Urutan penyusunan yang benar adalah …', 'opsi' => ['3 - 4 - 1 - 5 - 2', '3 - 4 - 5 - 1 - 2', '3 - 1 - 4 - 5 - 2', '2 - 3 - 4 - 1 - 5', '1 - 4 - 3 - 5 - 2']],
  ['pertanyaan' => 'interface Operasi { public function jalankan(); } $obj = new class ___ Operasi { public function ___() { return "Berhasil!"; } }; echo $obj->___(); Isi yang tepat untuk bagian kosong tersebut adalah …', 'opsi' => ['extends, jalankan, jalankan', 'implements, jalankan, jalankan', 'implements, run, run', 'extends, run, run', 'class, function, echo']],
  ['pertanyaan' => '1) $hasil = new class { echo count($props); 2) $ref = new ReflectionClass("Tes"); 3) $props = $ref->getProperties(); 4) class Tes { private $x = 1; } Urutan penyusunan yang benar adalah …', 'opsi' => ['4 - 2 - 3 - 1', '1 - 2 - 3 - 4', '2 - 3 - 4 - 1', '2 - 4 - 3 - 1', '4 - 3 - 2 - 1']],
  ['pertanyaan' => 'class Uji { public $nilai = 90; } $obj = new Uji(); if (___($obj, \'nilai\')) { echo "Ada"; } else { echo "Tidak Ada"; } Isi yang tepat untuk bagian kosong tersebut adalah …', 'opsi' => ['isset', 'method_exists', 'property_exists', 'get_class_vars', 'array_key_exists']],
  ['pertanyaan' => 'Lengkapilah kode berikut agar mencetak seluruh konstanta yang didefinisikan dalam class! class Matematika { const PI = 3.14; const E = 2.71; } print_r(___(\'Matematika\')); Fungsi PHP yang tepat untuk melengkapi kode di atas adalah …', 'opsi' => ['get_class_constants', 'get_constants', 'class_constants', 'get_class_vars', 'get_defined_constants']],
];

      @endphp

      
  <div class="refleksi-jawaban mt-5">
  <h4 class="mb-4 fw-bold">🔎 Refleksi Jawaban</h4>

  <div class="alert alert-info shadow-sm rounded">
    <i class="bi bi-info-circle-fill me-2"></i>
    Kamu menjawab <strong>{{ $refleksi['evaluasi']['benar'] ?? 0 }}</strong> dari <strong>{{ count($soalData) }}</strong> soal dengan benar.
  </div>

  <div class="accordion" id="refleksiAccordion">
    @foreach ($soalData as $i => $soal)
      @php
        $dipilih = $jawabanUser[$i] ?? -1;
        $benar = $kunci[$i];
        $isBenar = $dipilih === $benar;
        $statusBadge = $isBenar ? 'success' : 'danger';
        $statusText = $isBenar ? '✔ Benar' : '✘ Salah';
        $bgCard = $isBenar ? 'border-success' : 'border-danger';
      @endphp

      <div class="accordion-item mb-3 border {{ $bgCard }} shadow-sm">
        <h2 class="accordion-header" id="heading-{{ $i }}">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $i }}" aria-expanded="false" aria-controls="collapse-{{ $i }}">
            Soal {{ $i + 1 }}
            <span class="badge bg-{{ $statusBadge }} ms-3">{{ $statusText }}</span>
          </button>
        </h2>

        <div id="collapse-{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $i }}" data-bs-parent="#refleksiAccordion">
          <div class="accordion-body">
            <p class="mb-3">{!! nl2br(e($soal['pertanyaan'])) !!}</p>

            <div class="row row-cols-1 row-cols-md-2 g-2">
              @foreach ($soal['opsi'] as $j => $opsi)
                @php
                  $isChosen = $dipilih === $j;
                  $isKey = $j === $benar;
                  $itemClass = 'list-group-item';
                  $badgeText = '';

                  if ($isChosen) {
                    $itemClass .= $isBenar ? ' bg-success-subtle text-success fw-semibold' : ' bg-danger-subtle text-danger fw-semibold';
                    $badgeText = 'Pilihanmu';
                  } elseif (!$isBenar && $isKey) {
                    $itemClass .= ' bg-success-subtle text-success fw-semibold';
                    $badgeText = 'Jawaban Benar';
                  }
                @endphp

                <div class="col">
                  <div class="{{ $itemClass }} rounded d-flex justify-content-between align-items-center px-3 py-2">
                    <span>{{ $opsi }}</span>
                    @if ($badgeText)
                      <span class="badge bg-{{ $isBenar || $isKey ? 'success' : 'danger' }}">{{ $badgeText }}</span>
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endif


    <div id="btn-kkm" class="nextphp-kuis-btn-group mt-4">
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



<style>
  .accordion-button {
  font-weight: 600;
  background-color: #f3f0ff;
}

.accordion-button:not(.collapsed) {
  background-color: #e0e7ff;
  color: #1e293b;
}

.accordion-body p {
  margin-bottom: 0.5rem;
}

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