@php 
use Illuminate\Support\Facades\Auth; 

$json = json_decode($result->jawaban_json, true);
$jawaban = $json['kuis_1'] ?? ['benar' => 0, 'salah' => 0];
$jawabanSiswa = $json['kuis_1']['jawaban'] ?? [];
$kunci = [3, 3, 2, 3, 4, 1, 4, 0, 2, 1];
 
$soalData = [
  ['pertanyaan' => "Istilah yang digunakan untuk mendeskripsikan cetak biru dari sebuah object dalam OOP adalah …", 'opsi' => ["Object", "Method", "Property", "Class", "Trait"]],
  ['pertanyaan' => "Perhatikan potongan kode berikut!\nclass Buku {\n    public \$judul;\n}\n\n\$novel = new Buku;\n\$novel->judul = \"Laskar Pelangi\";\nCara menampilkan nilai property judul yaitu dengan …", 'opsi' => ["echo \$judul;", "echo \$Buku->judul;", "echo \$novel->\$judul;", "echo \$novel->judul;", "echo Buku::judul;"]],
  ['pertanyaan' => "Pilihan berikut yang bukan keuntungan utama dari pendekatan OOP adalah …", 'opsi' => ["Pemeliharaan kode menjadi lebih mudah", "Kemampuan menggunakan kembali kode", "Penggunaan fungsi yang lebih cepat", "Struktur program lebih modular", "Enkapsulasi data"]],
  ['pertanyaan' => "Seorang mahasiswa membuat program perpustakaan dengan object Anggota, Buku, dan Peminjaman. Dalam proses debugging, ia menyadari bahwa fungsinya terlalu tersebar dan sulit dilacak. Evaluasi terbaik dari masalah tersebut, yaitu …", 'opsi' => ["Mahasiswa tidak cukup menguasai PHP", "Program menggunakan array dan bukan object", "Mahasiswa perlu lebih banyak menggunakan variabel global", "Program belum sepenuhnya menerapkan prinsip OOP", "Program terlalu banyak class"]],
  ['pertanyaan' => "Cara yang benar untuk membuat object dari sebuah class bernama Mobil adalah …", 'opsi' => ["Mobil mobil = new();", "\$mobil = new \"Mobil\";", "\$mobil = Mobil();", "new Mobil = \$mobil;", "\$mobil = new Mobil;"]],
  ['pertanyaan' => "Perhatikan dua pendekatan berikut:\nPendekatan A: fungsi dan data disimpan terpisah.\nPendekatan B: fungsi dan data digabung dalam satu unit.\nPendekatan yang sesuai dengan prinsip OOP adalah …", 'opsi' => ["A, karena fungsi lebih mudah dipanggil", "B, karena data lebih aman dan terorganisir", "A, karena pemanggilan lebih cepat", "B, karena menghindari penggunaan object", "A, karena sesuai dengan OOP"]],
  ['pertanyaan' => "Seorang pengembang membandingkan dua program: satu berbasis OOP dan satu prosedural. Keduanya bekerja dengan baik, tetapi dia memilih OOP untuk proyek jangka panjang. Alasan paling kuat untuk pilihan tersebut adalah …", 'opsi' => ["Membutuhkan lebih sedikit kode", "OOP tidak memerlukan testing", "OOP mempercepat runtime program", "OOP lebih cocok untuk program pendek", "OOP lebih mudah dipelihara dan dikembangkan"]],
  ['pertanyaan' => "Jika kamu diminta merancang object Dosen, property dan method yang sebaiknya dimiliki agar sesuai prinsip OOP adalah …", 'opsi' => ["idDosen, mataKuliah, inputAbsen()", "nilai, sks, hitungUmur()", "warna, ukuran, cetakStruk()", "jurusan, kodePos, loginAdmin()", "namaDosen, jumlahMahasiswa, cekStatusServer()"]],
  ['pertanyaan' => "Yang membedakan pendekatan OOP dengan pemrograman procedural adalah …", 'opsi' => ["OOP tidak memerlukan struktur data", "OOP menyimpan semua kode dalam satu file", "OOP menggabungkan data dan fungsi dalam satu entitas", "OOP tidak menggunakan fungsi sama sekali", "OOP lebih cocok untuk perhitungan numerik"]],
  ['pertanyaan' => "Jika kamu diminta membuat sistem data mahasiswa berbasis object, atribut dan method yang paling tepat untuk class Mahasiswa adalah …", 'opsi' => ["nama, email; method: hitungGaji()", "nama, nilai, method: tampilkanProfil()", "jenisKelamin, mataKuliah; method: hapusFile()", "username, password; method: printKartuUjian()", "alamat, usia; method: inputNilai()"]],
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
    <h2 class="hasil-kuis-title">KUIS 1</h2>
    <p class="hasil-kuis-subtitle">Pengenalan</p>
    <hr>

    <h5 class="hasil-kuis-heading">HASIL KUIS</h5>

    <div class="hasil-kuis-section">
      <h6 class="hasil-kuis-label">WAKTU SELESAI</h6>
      @php \Carbon\Carbon::setLocale('id'); @endphp
      <p><strong>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</strong></p>
    </div>

    <div class="hasil-kuis-nilai">
      <h6 class="hasil-kuis-label">NILAI</h6>
      <h1 class="hasil-kuis-score {{ ($result?->kuis_1 ?? 0) >= $kkm ? 'text-success' : 'text-danger' }}">
        {{ $result?->kuis_1 ?? 0 }}
      </h1>
      <p>Jawaban benar: {{ $jawaban['benar'] }}</p>
      <p>Jawaban salah: {{ $jawaban['salah'] }}</p>
    </div>

    @php
      $skor = $result?->kuis_1 ?? 0;
      $statusClass = $skor >= $kkm ? 'alert-success' : 'alert-danger';
      $feedback = $skor >= $kkm
        ? '🎉 Selamat! Kamu dapat melanjutkan ke materi berikutnya.'
        : '⚠️ Skor kamu belum memenuhi, silakan pelajari ulang dan coba lagi.';
    @endphp

    <div class="hasil-kuis-alert alert {{ $statusClass }}">
      {{ $feedback }}
    </div>


<!-- REFLEKSI JAWABAN -->
 @if ($skor >= $kkm)
<div class="refleksi-jawaban mt-5">
  <h4 class="mb-4 fw-bold">🔎 Refleksi Jawaban </h4>

  <div class="alert alert-info shadow-sm rounded">
    <i class="bi bi-info-circle-fill me-2"></i>
    Kamu menjawab <strong>{{ $jawaban['benar'] }}</strong> dari <strong>{{ count($soalData) }}</strong> soal dengan benar.
  </div>

  <div class="accordion" id="refleksiAccordion">
    @foreach ($soalData as $i => $soal)
      @php
        $dipilih = $jawabanSiswa[$i] ?? -1;
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



    <!-- ✅ Aksi setelah kuis -->
    <div id="btn-kkm" class="nextphp-kuis-btn-group mt-4">
      @if ($skor >= $kkm)
        <a href="/b21-mendeklarasikanm" class="nextphp-btn-mulai"
           style="background-color: #22c55e;"
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

  document.querySelectorAll('.toggle-refleksi').forEach(btn => {
  btn.addEventListener('click', () => {
    const targetId = btn.getAttribute('data-target');
    const targetEl = document.querySelector(targetId);
    const isOpen = targetEl.classList.contains('show');

    targetEl.classList.toggle('show');
    btn.textContent = isOpen ? '👁️ Lihat Jawaban' : '🙈 Sembunyikan';
  });
});

</script>
@endsection
