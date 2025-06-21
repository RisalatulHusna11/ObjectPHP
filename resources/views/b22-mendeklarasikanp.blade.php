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
      <li>Amati hasil output program, lalu masukkan hasilnya pada kolom di bawahnya untuk memeriksa output sudah benar atau belum.</li>

      <li>Tekan tombol <strong>Periksa Output</strong> untuk mengecek jawabanmu.</li>
    </ol>
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

  <div class="mt-4">
    <label for="outputMahasiswa" class="form-label">Masukkan output yang kamu lihat dari program di atas:</label>
    <small class="text-muted d-block mb-2" style="font-style: italic;">
    *Tulis output sama persis seperti yang kamu lihat di bagian [Output] diatas.<br>
    *Jika output menunjukkan pesan error, cukup tulis <strong>"Error"</strong> saja di kolom ini.
  </small>
    <textarea id="outputAyo1" class="form-control" rows="4" placeholder="Tulis output di sini..."></textarea>
    <button class="btn-next mt-2" onclick="cekAyoPahami1()">Periksa Output</button>
    <div id="feedbackAyo1" class="mt-3"></div>
  </div>

  <!-- <p class="mt-3">
    Pada contoh di atas, kita memiliki properti publik ($nama dan $warna) yang dapat diakses dari luar class, dan properti privat ($kecepatan) yang hanya dapat diakses melalui method dalam class itu sendiri.
  </p> -->
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
      <li>Amati hasil output program, lalu masukkan hasilnya pada kolom di bawahnya untuk memeriksa output sudah benar atau belum.</li>
      <li>Tekan tombol <strong>Periksa Output</strong> untuk mengecek jawabanmu.</li>
    </ol>
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

  <div class="mt-4">
    <label for="outputMahasiswa" class="form-label">Masukkan output yang kamu lihat dari program di atas:</label>
    <small class="text-muted d-block mb-2" style="font-style: italic;">
    *Tulis output sama persis seperti yang kamu lihat di bagian [Output] diatas.<br>
    *Jika output menunjukkan pesan error, cukup tulis <strong>"Error"</strong> saja di kolom ini.
  </small>
    <textarea id="outputAyo2" class="form-control" rows="4" placeholder="Tulis output di sini..."></textarea>
    <button class="btn-next mt-2" onclick="cekAyoPahami2()">Periksa Output</button>
    <div id="feedbackAyo2" class="mt-3"></div>

  <!-- <p class="mt-3">
    Pada contoh ini, jika kita tidak menetapkan nilai untuk properti <code>nama</code>, <code>warna</code>, dan <code>kecepatan</code>, mereka akan memiliki nilai default yang telah ditetapkan dalam class.
  </p> -->
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
      <li>Amati hasil output program, lalu masukkan hasilnya pada kolom di bawahnya untuk memeriksa output sudah benar atau belum.</li>
      <li>Tekan tombol <strong>Periksa Output</strong> untuk mengecek jawabanmu.</li>
    </ol>
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

  <div class="mt-4">
    <label for="outputMahasiswa" class="form-label">Masukkan output yang kamu lihat dari program di atas:</label>
    <small class="text-muted d-block mb-2" style="font-style: italic;">
    *Tulis output sama persis seperti yang kamu lihat di bagian [Output] diatas.<br>
    *Jika output menunjukkan pesan error, cukup tulis <strong>"Error"</strong> saja di kolom ini.
  </small>
    <textarea id="outputAyo3" class="form-control" rows="4" placeholder="Tulis output di sini..."></textarea>
    <button class="btn-next mt-2" onclick="cekAyoPahami3()">Periksa Output</button>
    <div id="feedbackAyo3" class="mt-3"></div>
  </div>

  <!-- <p class="mt-3">
    Dalam contoh ini, kita menggunakan properti <code>static</code> <code>$jumlahMobil</code> untuk menghitung jumlah object <code>Mobil</code> yang telah dibuat. Static property ini tidak terkait dengan objek individu, melainkan dengan class itu sendiri.
  </p> -->
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
      <li>Amati hasil output program, lalu masukkan hasilnya pada kolom di bawahnya untuk memeriksa output sudah benar atau belum.</li>
      <li>Tekan tombol <strong>Periksa Output</strong> untuk mengecek jawabanmu.</li>
    </ol>
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

  <div class="mt-4">
    <label for="outputMahasiswa" class="form-label">Masukkan output yang kamu lihat dari program di atas:</label>
    <small class="text-muted d-block mb-2" style="font-style: italic;">
    *Tulis output sama persis seperti yang kamu lihat di bagian [Output] diatas.<br>
    *Jika output menunjukkan pesan error, cukup tulis <strong>"Error"</strong> saja di kolom ini.
  </small>
    <textarea id="outputAyo4" class="form-control" rows="4" placeholder="Tulis output di sini..."></textarea>
    <button class="btn-next mt-2" onclick="cekAyoPahami4()">Periksa Output</button>
    <div id="feedbackAyo4" class="mt-3"></div>
  </div>

  <!-- <p class="mt-3">
    Pada contoh ini, kita langsung menetapkan properti <code>nama</code> di luar class <code>Pengguna</code>. Meskipun kode ini berfungsi, mendeklarasikan properti secara implisit bisa menyebabkan masalah jika ada kesalahan penulisan atau kebingungannya.
  </p> -->
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
      <li>Amati hasil output program, lalu masukkan hasilnya pada kolom di bawahnya untuk memeriksa output sudah benar atau belum.</li>
      <li>Tekan tombol <strong>Periksa Output</strong> untuk mengecek jawabanmu.</li>
    </ol>
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

  <div class="mt-4">
    <label for="outputMahasiswa" class="form-label">Masukkan output yang kamu lihat dari program di atas:</label>
    <small class="text-muted d-block mb-2" style="font-style: italic;">
    *Tulis output sama persis seperti yang kamu lihat di bagian [Output] diatas.<br>
    *Jika output menunjukkan pesan error, cukup tulis <strong>"Error"</strong> saja di kolom ini.
  </small>
    <textarea id="outputAyo5" class="form-control" rows="4" placeholder="Tulis output di sini..."></textarea>
    <button class="btn-next mt-2" onclick="cekAyoPahami5()">Periksa Output</button>
    <div id="feedbackAyo5" class="mt-3"></div>
  </div>

  <!-- <p class="mt-3">
    Dalam contoh ini, kita menggunakan method magis <code>__get()</code> dan <code>__set()</code> untuk mengelola akses ke properti <code>biografi</code>, yang tidak dideklarasikan sebelumnya. Ini memungkinkan kita untuk menangani data secara dinamis, seperti menarik dan menyimpan informasi dari sumber eksternal (misalnya database).
  </p> -->
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
let ayoPahamiBerhasil = [false, false, false, false, false];
let sudahLatihan = false;
let progressTerkirim = false;

function cekKelayakanAksesGabunganB22() {
  const semuaAyoPahamiSelesai = ayoPahamiBerhasil.every(val => val === true);

  if (semuaAyoPahamiSelesai && sudahLatihan && !progressTerkirim) {
    progressTerkirim = true;
    kirimProgressHalaman("b22-mendeklarasikanp");

    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  }
  console.log("✅ Semua Ayo Pahami selesai:", semuaAyoPahamiSelesai);
  console.log("✅ Sudah latihan:", sudahLatihan);
  console.log("✅ Progress terkirim:", progressTerkirim);
}


// CEK JAWABAN AYO PAHAMI
function cekAyoPahami1() {
  const jawaban = document.getElementById('outputAyo1').value.trim();
  const kunci = 'Nama Mobil: Toyota Corolla, Warna: Merah, Kecepatan:  km/jam';
  const feedback = document.getElementById('feedbackAyo1');

  if (jawaban === kunci) {
    feedback.innerHTML = `
    <div class="alert alert-success">
      ✅ <strong>Selamat!</strong> Output kamu sudah sesuai.<br>
      Kamu berhasil memahami cara mendefinisikan class, membuat object, menetapkan nilai properti, dan mengaksesnya melalui method dalam OOP PHP.<br>
      Silakan lanjutkan ke latihan berikutnya!
    </div>

    <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
      <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
      <ul style="padding-left: 20px;">
        <li><strong>Baris 2</strong>: Mendefinisikan class <code>Mobil</code> untuk menyimpan atribut dan perilaku mobil.</li>
        <li><strong>Baris 3–5</strong>: Menambahkan properti <code>$nama</code>, <code>$warna</code> (publik), dan <code>$kecepatan</code> (privat).</li>
        <li><strong>Baris 8-10</strong>: Method <code>setNama()</code> untuk mengatur nilai properti <code>$nama</code>.</li>
        <li><strong>Baris 13-15</strong>: Method <code>setWarna()</code> untuk mengatur nilai <code>$warna</code>.</li>
        <li><strong>Baris 18–20</strong>: Method privat <code>setKecepatan()</code> untuk mengatur nilai <code>$kecepatan</code>.</li>
        <li><strong>Baris 23–25</strong>: Method <code>infoMobil()</code> untuk menggabungkan dan menampilkan seluruh informasi mobil.</li>
        <li><strong>Baris 29-31</strong>: Membuat objek <code>$mobilSaya</code>, menetapkan nama dan warna menggunakan method yang tersedia.</li>
        <li><strong>Baris 34</strong>: Menampilkan hasil gabungan dari properti melalui method <code>infoMobil()</code>. Karena <code>kecepatan</code> tidak disetel, maka tampil kosong.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> Contoh ini menunjukkan perbedaan antara properti publik (dapat diakses langsung atau melalui method publik) dan properti privat yang hanya bisa diakses dari dalam class. Method <code>infoMobil()</code> digunakan untuk menyajikan informasi terstruktur kepada pengguna.
      </p>
    </div>
    `;
    ayoPahamiBerhasil[0] = true;
  } else {
    feedback.innerHTML = `<div class="alert alert-warning">
      ⚠️ <strong>Jawaban belum tepat.</strong><br>
      Coba periksa kembali:
      <ul style="margin-top:5px;">
        <li>Apakah <strong>kode program</strong> yang kamu ketik sudah benar, tanpa salah huruf, tanda baca, atau spasi yang keliru?</li>
        <li>Apakah <strong>output</strong> yang kamu salin sudah persis sama seperti hasil yang muncul, termasuk huruf kapital dan urutan karakter?</li>
      </ul>
      Pastikan untuk menyalin dengan teliti. Kamu bisa tekan tombol <code>RUN</code> lagi dan salin ulang outputnya jika perlu.
    </div>`;
    ayoPahamiBerhasil[0] = false;
  }

  cekKelayakanAksesGabunganB22();
}

function cekAyoPahami2() {
  const jawaban = document.getElementById('outputAyo2').value.trim();
  const kunci = 'Nama Mobil: Honda Civic, Warna: Putih, Kecepatan: 0 km/jam';
  const feedback = document.getElementById('feedbackAyo2');

  if (jawaban === kunci) {
    feedback.innerHTML = `
    <div class="alert alert-success">
      ✅ <strong>Selamat!</strong> Output kamu sudah sesuai.<br>
      Kamu telah memahami cara memberikan <strong>nilai default</strong> pada properti dalam class PHP, serta cara mengaksesnya melalui method.<br>
      Silakan lanjutkan ke latihan berikutnya!
    </div>

    <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
      <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
      <ul style="padding-left: 20px;">
        <li><strong>Baris 2</strong>: Membuat class <code>Mobil</code> untuk menyimpan atribut mobil.</li>
        <li><strong>Baris 3–5</strong>: Mendeklarasikan properti <code>$nama</code>, <code>$warna</code>, dan <code>$kecepatan</code> dengan nilai default: <code>"Honda Civic"</code>, <code>"Putih"</code>, dan <code>0</code>.</li>
        <li><strong>Baris 7–9</strong>: Mendefinisikan method <code>infoMobil()</code> untuk menampilkan informasi gabungan dari properti.</li>
        <li><strong>Baris 12</strong>: Membuat object baru dari class <code>Mobil</code> dan menyimpannya ke variabel <code>$mobilSaya</code>.</li>
        <li><strong>Baris 13</strong>: Memanggil method <code>infoMobil()</code> yang menampilkan nilai-nilai default dari properti.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> Memberikan nilai default pada properti memungkinkan object memiliki data awal meskipun belum diberi nilai eksplisit. Ini membantu dalam mengurangi error dan memastikan stabilitas object saat diakses.
      </p>
    </div>
    `;
    ayoPahamiBerhasil[1] = true;
  } else {
    feedback.innerHTML = `<div class="alert alert-warning">
      ⚠️ <strong>Jawaban belum tepat.</strong><br>
      Coba periksa kembali:
      <ul style="margin-top:5px;">
        <li>Apakah <strong>kode program</strong> yang kamu ketik sudah benar, tanpa salah huruf, tanda baca, atau spasi yang keliru?</li>
        <li>Apakah <strong>output</strong> yang kamu salin sudah persis sama seperti hasil yang muncul, termasuk huruf kapital dan urutan karakter?</li>
      </ul>
      Pastikan untuk menyalin dengan teliti. Kamu bisa tekan tombol <code>RUN</code> lagi dan salin ulang outputnya jika perlu.
    </div>`;
    ayoPahamiBerhasil[1] = false;
  }

  cekKelayakanAksesGabunganB22();
}

function cekAyoPahami3() {
  const jawaban = document.getElementById('outputAyo3').value.trim();
  const kunci = 'Jumlah Mobil: 2';
  const feedback = document.getElementById('feedbackAyo3');

  if (jawaban === kunci) {
    feedback.innerHTML = `
    <div class="alert alert-success">
      ✅ <strong>Selamat!</strong> Output kamu sudah sesuai.<br>
      Kamu berhasil memahami cara menggunakan <strong>properti statis</strong> untuk mencatat jumlah objek yang dibuat dari sebuah class.<br>
      Silakan lanjutkan ke latihan berikutnya!
    </div>

    <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
      <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
      <ul style="padding-left: 20px;">
        <li><strong>Baris 3</strong>: Mendeklarasikan properti statis <code>$jumlahMobil</code> dengan nilai awal 0. Properti ini milik class, bukan object individual.</li>
        <li><strong>Baris 5–7</strong>: Method <code>__construct()</code> dipanggil setiap kali object dibuat, dan akan menambah nilai <code>self::$jumlahMobil</code>.</li>
        <li><strong>Baris 9–11</strong>: Method <code>jumlahMobil()</code> mengembalikan nilai dari properti statis.</li>
        <li><strong>Baris 14–15</strong>: Membuat dua objek dari class <code>Mobil</code>, sehingga <code>$jumlahMobil</code> bertambah dua kali.</li>
        <li><strong>Baris 17</strong>: Menampilkan jumlah total mobil yang telah dibuat, yaitu 2.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> Properti statis digunakan untuk menyimpan data yang berbagi antar seluruh instance dari sebuah class. Dalam contoh ini, properti <code>$jumlahMobil</code> melacak berapa banyak object yang dibuat.
      </p>
    </div>
    `;
    ayoPahamiBerhasil[2] = true;
  } else {
    feedback.innerHTML = `<div class="alert alert-warning">
      ⚠️ <strong>Jawaban belum tepat.</strong><br>
      Coba periksa kembali:
      <ul style="margin-top:5px;">
        <li>Apakah <strong>kode program</strong> yang kamu ketik sudah benar, tanpa salah huruf, tanda baca, atau spasi yang keliru?</li>
        <li>Apakah <strong>output</strong> yang kamu salin sudah persis sama seperti hasil yang muncul, termasuk huruf kapital dan urutan karakter?</li>
      </ul>
      Pastikan untuk menyalin dengan teliti. Kamu bisa tekan tombol <code>RUN</code> lagi dan salin ulang outputnya jika perlu.
    </div>`;
    ayoPahamiBerhasil[2] = false;
  }

  cekKelayakanAksesGabunganB22();
}

function cekAyoPahami4() {
  const jawaban = document.getElementById('outputAyo4').value.trim();
  const kunci = 'Alice';
  const feedback = document.getElementById('feedbackAyo4');

  if (jawaban === kunci) {
    feedback.innerHTML = `
    <div class="alert alert-success">
      ✅ <strong>Selamat!</strong> Output kamu sudah sesuai.<br>
      Kamu berhasil memahami bagaimana PHP mengizinkan penambahan properti baru secara implisit di luar class, meskipun cara ini tidak direkomendasikan dalam praktik OOP yang baik.<br>
      Silakan lanjutkan ke latihan berikutnya!
    </div>

    <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
      <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
      <ul style="padding-left: 20px;">
        <li><strong>Baris 2</strong>: Mendefinisikan class kosong <code>Pengguna</code> tanpa properti atau method.</li>
        <li><strong>Baris 4</strong>: Membuat objek baru dari class <code>Pengguna</code> dan menyimpannya dalam variabel <code>$pengguna1</code>.</li>
        <li><strong>Baris 5</strong>: Menambahkan properti <code>nama</code> secara langsung ke object, walaupun properti ini tidak didefinisikan sebelumnya dalam class.</li>
        <li><strong>Baris 6</strong>: Menampilkan nilai dari properti <code>nama</code>, yaitu <code>Alice</code>.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> PHP memperbolehkan penambahan properti baru secara implisit pada objek. Namun, pendekatan ini dapat menyebabkan bug jika nama properti salah ketik. Oleh karena itu, deklarasi properti sebaiknya dilakukan secara eksplisit di dalam class.
      </p>
    </div>
    `;
    ayoPahamiBerhasil[3] = true;
  } else {
    feedback.innerHTML = `<div class="alert alert-warning">
      ⚠️ <strong>Jawaban belum tepat.</strong><br>
      Coba periksa kembali:
      <ul style="margin-top:5px;">
        <li>Apakah <strong>kode program</strong> yang kamu ketik sudah benar, tanpa salah huruf, tanda baca, atau spasi yang keliru?</li>
        <li>Apakah <strong>output</strong> yang kamu salin sudah persis sama seperti hasil yang muncul, termasuk huruf kapital dan urutan karakter?</li>
      </ul>
      Pastikan untuk menyalin dengan teliti. Kamu bisa tekan tombol <code>RUN</code> lagi dan salin ulang outputnya jika perlu.
    </div>`;
    ayoPahamiBerhasil[3] = false;
  }

  cekKelayakanAksesGabunganB22();
}

function cekAyoPahami5() {
  const jawaban = document.getElementById('outputAyo5').value.trim();
  const kunci = 'Biografi panjang...';
  const feedback = document.getElementById('feedbackAyo5');

  if (jawaban === kunci) {
    feedback.innerHTML = `
    <div class="alert alert-success">
      ✅ <strong>Selamat!</strong> Output kamu sudah sesuai.<br>
      Kamu telah memahami cara penggunaan method magis <code>__get()</code> dan <code>__set()</code> dalam OOP PHP untuk mengakses dan menetapkan nilai properti yang tidak didefinisikan secara eksplisit dalam class.<br>
      Silakan lanjutkan ke latihan berikutnya!
    </div>

    <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
      <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
      <ul style="padding-left: 20px;">
        <li><strong>Baris 2</strong>: Mendefinisikan class <code>Pengguna</code>.</li>
        <li><strong>Baris 3</strong>: Menambahkan properti privat <code>$data</code> sebagai array kosong untuk menyimpan nilai-nilai dinamis.</li>
        <li><strong>Baris 5–9</strong>: Method magis <code>__get()</code> digunakan untuk mengambil nilai dari properti <code>biografi</code>, dan dalam contoh ini mengembalikan string "Biografi panjang...".</li>
        <li><strong>Baris 11–15</strong>: Method magis <code>__set()</code> digunakan untuk menetapkan nilai ke properti <code>biografi</code>, dan menyimpannya ke array <code>$data</code>.</li>
        <li><strong>Baris 18</strong>: Membuat objek baru dari class <code>Pengguna</code>.</li>
        <li><strong>Baris 19</strong>: Memanggil <code>echo \$pengguna->biografi;</code> yang secara otomatis menjalankan <code>__get()</code> dan menghasilkan output <code>Biografi panjang...</code>.</li>
        <li><strong>Baris 20</strong>: Menetapkan nilai baru "Biografi baru" ke properti <code>biografi</code> yang akan diproses oleh <code>__set()</code>.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> Method <code>__get()</code> dan <code>__set()</code> memungkinkan penanganan properti yang tidak dideklarasikan secara eksplisit. Hal ini sangat berguna ketika berinteraksi dengan data dinamis, seperti hasil query database atau field fleksibel.
      </p>
    </div>
    `;
    ayoPahamiBerhasil[4] = true;
  } else {
    feedback.innerHTML = `
    <div class="alert alert-warning">
      ⚠️ <strong>Jawaban belum tepat.</strong><br>
      Coba periksa kembali:
      <ul style="margin-top:5px;">
        <li>Apakah <strong>output</strong> yang kamu tuliskan sudah persis sama dengan yang muncul di layar? Pastikan tidak ada kesalahan huruf atau spasi.</li>
        <li>Perhatikan tanda baca dan huruf kapital.</li>
      </ul>
      Kamu bisa klik <code>RUN</code> lagi, lalu salin ulang output-nya dengan teliti.
    </div>`;
    ayoPahamiBerhasil[4] = false;
  }

  cekKelayakanAksesGabunganB22();
}



const jawabanBenarProperti = "4 3 1 2 5 6";

document.getElementById('cekJawabanProperti').addEventListener('click', () => {
  const input = document.getElementById('input-jawaban').value.trim().replace(/\s+/g, ' ');
  const feedback = document.getElementById('feedbackProperti');
  feedback.className = 'feedback';

  sudahLatihan = true; // ✅ Ini tetap
  cekKelayakanAksesGabunganB22(); // ✅ Ini yang akan aktifkan tombol jika semua sudah selesai

  if (input === jawabanBenarProperti) {
    feedback.classList.add('correct');
    feedback.textContent = '🎉 Jawaban kamu benar! Kode sudah tersusun dengan tepat.';
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
