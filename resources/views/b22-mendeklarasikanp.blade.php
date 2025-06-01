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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b22-mendeklarasikanp')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>2. MENDEKLARASIKAN PROPERTY</h5>
  </div>

  <div class="TIK">
    <p>Misalkan kita memiliki class <code>Mobil</code> yang menyimpan data tentang mobil, seperti nama, warna, dan kecepatan. Di sini, kita mendeklarasikan properti <code>nama</code>, <code>warna</code>, dan <code>kecepatan</code> dalam class Mobil secara eksplisit.</p>
```
<div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p>Petunjuk:</p>
    <ol>
      <li>Perhatikan kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
      <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan.</li>
      <li>Pastikan setiap baris dan struktur penulisan sesuai dengan contoh (termasuk titik koma, kurung, dll).</li>
      <li>Tekan tombol <code>RUN</code> di dalam editor untuk menjalankan program.</li>
      <li>Perhatikan hasil keluaran di bawah editor. Apa yang ditampilkan?</li>
    </ol>
  </div>

  <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar8') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public $nama;  // Properti publik untuk nama mobil
    public $warna; // Properti publik untuk warna mobil
    private $kecepatan; // Properti privat untuk kecepatan mobil

    // Method untuk mengatur nama mobil
    public function setNama($namaBaru) {
        $this->nama = $namaBaru;
    }

    // Method untuk mengatur warna mobil
    public function setWarna($warnaBaru) {
        $this->warna = $warnaBaru;
    }

    // Method untuk mengatur kecepatan mobil
    private function setKecepatan($kecepatanBaru) {
        $this->kecepatan = $kecepatanBaru;
    }

    // Method untuk mendapatkan informasi mobil
    public function infoMobil() {
        return "Nama Mobil: " . $this->nama . ", Warna: " . $this->warna . ", Kecepatan: " . $this->kecepatan . " km/jam";
    }
}

// Membuat objek dari class Mobil
$mobilSaya = new Mobil();
$mobilSaya->setNama("Toyota Corolla");
$mobilSaya->setWarna("Merah");

// Akses ke properti dan method
echo $mobilSaya->infoMobil();</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Pada contoh di atas, kita memiliki properti publik ($nama dan $warna) yang dapat diakses dari luar class, dan properti privat ($kecepatan) yang hanya dapat diakses melalui method dalam class itu sendiri.
  </p>
</div>


```

<h6>Menetapkan Nilai Default pada Properti</h6>
<p>PHP memungkinkan Anda untuk menetapkan nilai default pada properti class. Misalnya, kita ingin menetapkan nilai default untuk properti warna menjadi "Putih" dan untuk kecepatan menjadi 0.</p>
<div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p>Petunjuk:</p>
    <ol>
      <li>Perhatikan kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
      <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan.</li>
      <li>Pastikan setiap baris dan struktur penulisan sesuai dengan contoh (termasuk titik koma, kurung, dll).</li>
      <li>Tekan tombol <code>RUN</code> di dalam editor untuk menjalankan program.</li>
      <li>Perhatikan hasil keluaran di bawah editor. Apa yang ditampilkan?</li>
    </ol>
  </div>

  <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar9') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public $nama = "Honda Civic";  // Nilai default
    public $warna = "Putih";       // Nilai default
    private $kecepatan = 0;        // Nilai default

    public function infoMobil() {
        return "Nama Mobil: " . $this->nama . ", Warna: " . $this->warna . ", Kecepatan: " . $this->kecepatan . " km/jam";
    }
}

$mobilSaya = new Mobil();
echo $mobilSaya->infoMobil();</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Pada contoh ini, jika kita tidak menetapkan nilai untuk properti <code>nama</code>, <code>warna</code>, dan <code>kecepatan</code>, mereka akan memiliki nilai default yang telah ditetapkan dalam class.
  </p>
</div>
```



<h6>Menggunakan Properti Statis</h6>
<p>Dalam beberapa kasus, kita ingin property yang terkait dengan class dan bukan dengan object individual. Ini dapat dilakukan dengan menggunakan properti static. Berikut adalah contoh penggunaan properti static untuk menghitung jumlah objek yang dibuat dari class.</p>
<div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p>Petunjuk:</p>
    <ol>
      <li>Perhatikan kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
      <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan.</li>
      <li>Pastikan setiap baris dan struktur penulisan sesuai dengan contoh (termasuk titik koma, kurung, dll).</li>
      <li>Tekan tombol <code>RUN</code> di dalam editor untuk menjalankan program.</li>
      <li>Perhatikan hasil keluaran di bawah editor. Apa yang ditampilkan?</li>
    </ol>
  </div>

  <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar10') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public static $jumlahMobil = 0; // Properti statis

    public function __construct() {
        self::$jumlahMobil++; // Setiap objek yang dibuat akan menambah jumlahMobil
    }

    public static function jumlahMobil() {
        return self::$jumlahMobil;
    }
}

$mobil1 = new Mobil();
$mobil2 = new Mobil();

echo "Jumlah Mobil: " . Mobil::jumlahMobil();</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Dalam contoh ini, kita menggunakan properti <code>static</code> <code>$jumlahMobil</code> untuk menghitung jumlah object <code>Mobil</code> yang telah dibuat. Static property ini tidak terkait dengan objek individu, melainkan dengan class itu sendiri.
  </p>
</div>
```


<h6>Deklarasi Properti secara Implisit</h6>
<p>Anda juga bisa mendeklarasikan properti secara implisit di PHP, meskipun ini tidak disarankan karena bisa menyebabkan kesalahan yang sulit ditemukan. Berikut adalah contoh deklarasi properti secara implisit di luar class.</p>

<div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p>Petunjuk:</p>
    <ol>
      <li>Perhatikan kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
      <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan.</li>
      <li>Pastikan setiap baris dan struktur penulisan sesuai dengan contoh (termasuk titik koma, kurung, dll).</li>
      <li>Tekan tombol <code>RUN</code> di dalam editor untuk menjalankan program.</li>
      <li>Perhatikan hasil keluaran di bawah editor. Apa yang ditampilkan?</li>
    </ol>
  </div>

  <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar11') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pengguna {}

$pengguna1 = new Pengguna();
$pengguna1->nama = "Alice"; // Properti dideklarasikan secara implisit
echo $pengguna1->nama;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Pada contoh ini, kita langsung menetapkan properti <code>nama</code> di luar class <code>Pengguna</code>. Meskipun kode ini berfungsi, mendeklarasikan properti secara implisit bisa menyebabkan masalah jika ada kesalahan penulisan atau kebingungannya.
  </p>
</div>



```
<h6>Menggunakan Method Magis __get() dan __set()</h6>
<p>PHP juga memiliki method magis __get() dan __set() yang memungkinkan kita untuk mengakses atau menetapkan nilai pada properti yang tidak ada. Ini berguna jika kita ingin menangani data secara dinamis, seperti mengakses nilai dari database.</p>
<div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p>Petunjuk:</p>
    <ol>
      <li>Perhatikan kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
      <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan.</li>
      <li>Pastikan setiap baris dan struktur penulisan sesuai dengan contoh (termasuk titik koma, kurung, dll).</li>
      <li>Tekan tombol <code>RUN</code> di dalam editor untuk menjalankan program.</li>
      <li>Perhatikan hasil keluaran di bawah editor. Apa yang ditampilkan?</li>
    </ol>
  </div>

  <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar12') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pengguna {
    private $data = [];

    // Method magis __get untuk mengambil nilai properti
    public function __get($property) {
        if ($property === 'biografi') {
            return "Biografi panjang..."; // Mengambil data dari database
        }
    }

    // Method magis __set untuk menetapkan nilai properti
    public function __set($property, $value) {
        if ($property === 'biografi') {
            $this->data['biografi'] = $value; // Menyimpan data ke database
        }
    }
}

$pengguna = new Pengguna();
echo $pengguna->biografi; 
$pengguna->biografi = "Biografi baru"; // Menyimpan data baru</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Dalam contoh ini, kita menggunakan method magis <code>__get()</code> dan <code>__set()</code> untuk mengelola akses ke properti <code>biografi</code>, yang tidak dideklarasikan sebelumnya. Ini memungkinkan kita untuk menangani data secara dinamis, seperti menarik dan menyimpan informasi dari sumber eksternal (misalnya database).
  </p>
</div>

  </div>

<!-- LATIHAN: SUSUN KODE DENGAN ISIAN -->
<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Untuk menguji seberapa paham kamu tentang materi <strong>deklarasi properti</strong> dalam PHP, susunlah potongan-potongan kode berikut menjadi urutan kode PHP yang benar!</p>
    <p><strong>Petunjuk:</strong> Tulis jawabanmu berupa urutan angka, dipisah dengan spasi. Contoh format jawaban yang benar: <code>1 5 4 2 3 6</code></p>
    <p><em><strong>Catatan:</strong> Terdapat dua baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (method atau class).</em></p>
  </div>

  <ul class="list-group mb-3">
    <li class="list-group-item">1. public function infoTanaman() {</li>
    <li class="list-group-item">2. return "Nama: " . $this->nama;</li>
    <li class="list-group-item">3. public $nama = "Bambu";</li>
    <li class="list-group-item">4. class Tanaman {</li>
    <li class="list-group-item">5. } // penutup method infoTanaman()</li>
    <li class="list-group-item">6. } // penutup class Tanaman</li>
  </ul>

  <div class="mb-3">
    <label for="input-jawaban" class="form-label">Masukkan jawaban kamu:</label>
    <input type="text" id="input-jawaban" class="form-control" placeholder="Contoh: 1 5 4 2 3 6">
  </div>

  <div class="quiz-actions">
    <button id="cekJawabanProperti" class="btn-next">Cek Jawaban</button>
    <button id="resetJawabanProperti" class="btn-back">Reset</button>
  </div>

  <div id="feedbackProperti" class="feedback d-none mt-2"></div>
</div>

<script>
const jawabanBenarProperti = "4 3 1 2 5 6";

document.getElementById('cekJawabanProperti').addEventListener('click', () => {
  const input = document.getElementById('input-jawaban').value.trim().replace(/\s+/g, ' ');
  const feedback = document.getElementById('feedbackProperti');
  feedback.className = 'feedback';

  if (input === jawabanBenarProperti) {
    feedback.classList.add('correct');
    feedback.textContent = '🎉 Jawaban kamu benar! Kode sudah tersusun dengan tepat.';
    kirimProgressHalaman("b22-mendeklarasikanp");

    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }

  } else {
    feedback.classList.add('incorrect');
    feedback.textContent = '❌ Jawaban masih salah. Perhatikan kembali urutan logika program.';
  }

  feedback.classList.remove('d-none');
});

document.getElementById('resetJawabanProperti').addEventListener('click', () => {
  document.getElementById('input-jawaban').value = '';
  document.getElementById('feedbackProperti').className = 'feedback d-none';
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
  })
  .catch(err => {
    console.error('❌ Gagal kirim progress:', err);
  });
}

@if($selesai)
window.addEventListener('DOMContentLoaded', () => {
  const tombol = document.getElementById("btnSelanjutnya");
  if (tombol) {
    tombol.style.pointerEvents = "auto";
    tombol.style.opacity = 1;
    tombol.removeAttribute("disabled");
  }
});
@endif
</script>




```

  </div>
</div>

<div class="pagination">
  <a href="./b21-mendeklarasikanm" class="prev">&laquo; Sebelumnya</a>
  <a href="./b23-mendeklarasikanc"
     id="btnSelanjutnya"
     class="next"
     style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
     {{ $selesai ? '' : 'disabled' }}>
    Selanjutnya &raquo;
  </a>
</div>

@endsection
