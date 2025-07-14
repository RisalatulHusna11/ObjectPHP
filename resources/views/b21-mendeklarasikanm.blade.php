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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b21-mendeklarasikanm')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="TIKjudul">
            <h4>B. MENDEKLARASIKAN CLASS</h4>
        </div>

        <div class="TIK">
            <h5>Tujuan Pembelajaran</h5>
            <p>Setelah menyelesaikan materi ini, mahasiswa diharapkan mampu:</p>
            <ol>
                <li>Memahami konsep dasar dalam mendeklarasikan class pada PHP.</li>
                <li>Mendeklarasikan method, property, dan constant dalam sebuah class.</li>
                <li>Menerapkan konsep inheritance, interface, dan trait dalam pemrograman berbasis objek.</li>
                <li>Menggunakan abstract method, constructor, dan destructor untuk mengelola perilaku object.</li>

            </ol>
        </div>

        <div class="judul-subbab">
            <h5>1. MENDEKLARASIKAN METHOD</h5>
        </div>

  <div class="TIK">
    <p>Metode adalah fungsi yang didefinisikan di dalam sebuah kelas. Meskipun PHP tidak memberlakukan batasan khusus, sebagian besar metode hanya beroperasi pada data dalam objek tempat metode tersebut berada. </p>

```
<h6>Aturan Penamaan Methods</h6>
<p>Method yang diawali dengan dua garis bawah (<code>__</code>) mungkin akan digunakan oleh PHP di masa depan. Saat ini, beberapa method dengan awalan tersebut sudah digunakan dalam proses serialisasi objek, seperti <code>__sleep()</code> dan <code>__wakeup()</code>. Oleh karena itu, disarankan untuk tidak menggunakan awalan <code>__</code> pada method buatan sendiri, kecuali untuk method bawaan PHP.</p>

<h6>Menggunakan <code>$this</code> dalam Method</h6>
<p>Di dalam sebuah method, variabel <code>$this</code> mengacu pada objek yang memanggil method tersebut. Misalnya, jika kita memanggil $mobil->nyalakanMesin(), maka di dalam method nyalakanMesin(), $this merujuk pada objek $mobil. Method menggunakan $this untuk mengakses properti dari objek saat ini dan untuk memanggil method lain dalam objek yang sama. Berikut adalah contoh class Mobil yang menunjukkan bagaimana $this digunakan:</p>
        

<div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p class="quiz-intro">
  Ikuti langkah-langkah berikut untuk memahami dan mempraktikkan konsep penting dalam pemrograman PHP berbasis objek.
</p>
<ol>
  <li>Baca dan pahami kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
  <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan sesuai urutan dan struktur aslinya.</li>
  <li>Pastikan setiap detail penulisan seperti titik koma (<code>;</code>), tanda kurung, dan indentasi sesuai dengan contoh.</li>
  <li>Setelah selesai mengetik, klik tombol <code>RUN</code> untuk menjalankan kode.</li>
  <li>Perhatikan hasil output program yang muncul.</li>
  <li>Salin dan tuliskan output tersebut ke dalam kolom yang tersedia di bawah.</li>
  <li>Terakhir, klik tombol <strong>Periksa Output</strong> untuk mengecek apakah hasil output kamu sudah benar.</li>
</ol>

<p class="mt-3">
  💡 <strong>Catatan:</strong> Aktivitas <em>Ayo Pahami</em> ini merupakan <u>syarat untuk dapat mengakses halaman selanjutnya</u>. Pastikan output yang kamu masukkan sudah benar agar kamu dapat melanjutkan ke materi berikutnya.
</p>

  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public $merk = '';

    function getMerk() {
        return $this->merk;
    }

    function setMerk($merkBaru) {
        $this->merk = $merkBaru;
    }
}

$mobil = new Mobil();
$mobil->setMerk('Toyota');
echo $mobil->getMerk();</code></pre>
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
</div>


  
<h6>Method Statis</h6>
<p>Untuk mendeklarasikan method sebagai method statis, gunakan kata kunci <code>static</code>. Di dalam method statis, variabel <code>$this</code> tidak dapat digunakan karena method ini tidak terkait dengan instance tertentu dari sebuah class.</p>
        <div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p class="quiz-intro">
  Ikuti langkah-langkah berikut untuk memahami dan mempraktikkan konsep penting dalam pemrograman PHP berbasis objek.
</p>
<ol>
  <li>Baca dan pahami kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
  <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan sesuai urutan dan struktur aslinya.</li>
  <li>Pastikan setiap detail penulisan seperti titik koma (<code>;</code>), tanda kurung, dan indentasi sesuai dengan contoh.</li>
  <li>Setelah selesai mengetik, klik tombol <code>RUN</code> untuk menjalankan kode.</li>
  <li>Perhatikan hasil output program yang muncul.</li>
  <li>Salin dan tuliskan output tersebut ke dalam kolom yang tersedia di bawah.</li>
  <li>Terakhir, klik tombol <strong>Periksa Output</strong> untuk mengecek apakah hasil output kamu sudah benar.</li>
</ol>

<p class="mt-3">
  💡 <strong>Catatan:</strong> Aktivitas <em>Ayo Pahami</em> ini merupakan <u>syarat untuk dapat mengakses halaman selanjutnya</u>. Pastikan output yang kamu masukkan sudah benar agar kamu dapat melanjutkan ke materi berikutnya.
</p>

  </div>

  <!-- <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar3') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div> -->

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class PembantuMatematika {
    static function kuadrat($angka) {
        return $angka * $angka;
    }

    static function kubus($angka) {
        return $angka * $angka * $angka;
    }
}

// Memanggil method statis tanpa membuat objek
echo PembantuMatematika::kuadrat(4); 
echo PembantuMatematika::kubus(3);</code></pre>
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
  </div>
</div>



<h6>Method Final</h6>
<p>Jika sebuah method dideklarasikan dengan kata kunci <code>final</code>, maka method tersebut tidak dapat ditimpa (override) oleh class turunannya.</p>
<div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p class="quiz-intro">
  Ikuti langkah-langkah berikut untuk memahami dan mempraktikkan konsep penting dalam pemrograman PHP berbasis objek.
</p>
<ol>
  <li>Baca dan pahami kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
  <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan sesuai urutan dan struktur aslinya.</li>
  <li>Pastikan setiap detail penulisan seperti titik koma (<code>;</code>), tanda kurung, dan indentasi sesuai dengan contoh.</li>
  <li>Setelah selesai mengetik, klik tombol <code>RUN</code> untuk menjalankan kode.</li>
  <li>Perhatikan hasil output program yang muncul.</li>
  <li>Salin dan tuliskan output tersebut ke dalam kolom yang tersedia di bawah.</li>
  <li>Terakhir, klik tombol <strong>Periksa Output</strong> untuk mengecek apakah hasil output kamu sudah benar.</li>
</ol>

<p class="mt-3">
  💡 <strong>Catatan:</strong> Aktivitas <em>Ayo Pahami</em> ini merupakan <u>syarat untuk dapat mengakses halaman selanjutnya</u>. Pastikan output yang kamu masukkan sudah benar agar kamu dapat melanjutkan ke materi berikutnya.
</p>

  </div>

  <!-- <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar4') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div> -->

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Hewan {
    public $nama;

    final function getNama() {
        return $this->nama;
    }
}

class Anjing extends Hewan {
    function getNama() {
        return "Ini adalah anjing bernama " . $this->nama;
    }
}</code></pre>
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
</div>


```
<h6>Modifier Akses (Public, Private, Protected)</h6>
<p>Dalam pemrograman berorientasi objek, penting untuk mengontrol akses terhadap properti dan method dalam class. Untuk itulah PHP menyediakan modifier akses: <code>public</code>, <code>protected</code>, dan <code>private</code> yang digunakan untuk menentukan sejauh mana anggota class (property dan method) bisa diakses dari luar:</p>
<ul>
  <li><strong>Public</strong>: Dapat diakses dari mana saja, baik dari dalam class maupun luar.</li>
  <li><strong>Protected</strong>: Hanya dapat diakses oleh class itu sendiri dan class turunannya.</li>
  <li><strong>Private</strong>: Hanya dapat diakses oleh class itu sendiri, tidak dapat diakses dari luar atau subclass.</li>
</ul>
<p>Agar lebih mudah dipahami, perhatikan ilustrasi berikut yang menggambarkan perbedaan ketiga jenis akses tersebut.</p>
<div class="teks-kontenpt2">
      <img style="display: block; margin: 0 auto;" class="scrool" src="images/G4.png" alt="Gambar 4 Ilustrasi Akses Modifier: Public, Protected, dan Private">
      <p>Gambar 4 Ilustrasi Akses Modifier: Public, Protected, dan Private</p>
  </div>
<p>Gambar tersebut menunjukkan analogi akses modifier sebagai jenis “pintu akses” dalam sistem OOP:</p>
<ul>
  <li><strong>Public</strong> diibaratkan sebagai pintu terbuka yang bisa dilalui siapa saja.</li>
  <li><strong>Protected</strong> digambarkan sebagai akses terbatas, hanya bisa dilalui oleh "keluarga" (class induk dan turunannya).</li>
  <li><strong>Private</strong> digambarkan seperti ruang pribadi yang hanya bisa diakses oleh pemiliknya sendiri, yaitu class tempat property atau method itu didefinisikan.</li>
</ul>
<p>Dengan memahami gambar ini, kita dapat menyadari bahwa pemilihan akses modifier sangat penting dalam menjaga keamanan data dan struktur kode yang rapi. Contoh penggunaan modifier akses:</p>
<div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p class="quiz-intro">
      Ikuti langkah-langkah berikut untuk memahami dan mempraktikkan konsep penting dalam pemrograman PHP berbasis objek.
    </p>
    <ol>
      <li>Baca dan pahami kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
      <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan sesuai urutan dan struktur aslinya.</li>
      <li>Pastikan setiap detail penulisan seperti titik koma (<code>;</code>), tanda kurung, dan indentasi sesuai dengan contoh.</li>
      <li>Setelah selesai mengetik, klik tombol <code>RUN</code> untuk menjalankan kode.</li>
      <li>Perhatikan hasil output program yang muncul.</li>
      <li>Salin dan tuliskan output tersebut ke dalam kolom yang tersedia di bawah.</li>
      <li>Terakhir, klik tombol <strong>Periksa Output</strong> untuk mengecek apakah hasil output kamu sudah benar.</li>
    </ol>

    <p class="mt-3">
      💡 <strong>Catatan:</strong> Aktivitas <em>Ayo Pahami</em> ini merupakan <u>syarat untuk dapat mengakses halaman selanjutnya</u>. Pastikan output yang kamu masukkan sudah benar agar kamu dapat melanjutkan ke materi berikutnya.
    </p>

  </div>

  <!-- <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar5') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div> -->

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class RekeningBank {
    public $saldo = 0;

    public function setor($jumlah) {
        $this->saldo += $jumlah;
        $this->catatTransaksi();
    }

    protected function tarik($jumlah) {
        if ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            $this->catatTransaksi();
        } else {
            echo "Saldo tidak cukup!";
        }
    }

    private function catatTransaksi() {
        echo "Transaksi berhasil. Saldo saat ini: {$this->saldo}\n";
    }
}

$rekening = new RekeningBank();
$rekening->setor(1000);
// $rekening->tarik(500); // Tidak dapat dipanggil karena bersifat protected
// $rekening->catatTransaksi(); // Tidak dapat dipanggil karena bersifat private</code></pre>
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
</div>



```
<h6>Type Hinting dalam Parameter Method</h6>
<p>PHP mendukung type hinting untuk memastikan parameter yang diterima oleh sebuah method sesuai dengan tipe data yang diharapkan. Contoh:</p>
      <div class="code-salinan mb-3">
        <div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p class="quiz-intro">
      Ikuti langkah-langkah berikut untuk memahami dan mempraktikkan konsep penting dalam pemrograman PHP berbasis objek.
    </p>
    <ol>
      <li>Baca dan pahami kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
      <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan sesuai urutan dan struktur aslinya.</li>
      <li>Pastikan setiap detail penulisan seperti titik koma (<code>;</code>), tanda kurung, dan indentasi sesuai dengan contoh.</li>
      <li>Setelah selesai mengetik, klik tombol <code>RUN</code> untuk menjalankan kode.</li>
      <li>Perhatikan hasil output program yang muncul.</li>
      <li>Salin dan tuliskan output tersebut ke dalam kolom yang tersedia di bawah.</li>
      <li>Terakhir, klik tombol <strong>Periksa Output</strong> untuk mengecek apakah hasil output kamu sudah benar.</li>
    </ol>

    <p class="mt-3">
      💡 <strong>Catatan:</strong> Aktivitas <em>Ayo Pahami</em> ini merupakan <u>syarat untuk dapat mengakses halaman selanjutnya</u>. Pastikan output yang kamu masukkan sudah benar agar kamu dapat melanjutkan ke materi berikutnya.
    </p>

  </div>

  <!-- <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar6') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div> -->

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Karyawan {
    function berikanTugas(Tugas $tugas) {
        echo "Tugas diberikan: {$tugas->deskripsi}\n";
    }
}

class Tugas {
    public $deskripsi;
    
    function __construct($deskripsi) {
        $this->deskripsi = $deskripsi;
    }
}

$tugas = new Tugas("Menganalisis data keuangan");
$karyawan = new Karyawan();
$karyawan->berikanTugas($tugas);</code></pre>
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
</div>
```



<h6>Type Hinting dalam Return Type Method</h6>
<p>Kita juga dapat menentukan tipe data yang akan dikembalikan oleh suatu method dengan menambahkan tanda : diikuti tipe data setelah deklarasi parameter.
Contoh:
</p>
<div class="quiz-card mt-5 ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p class="quiz-intro">
      Ikuti langkah-langkah berikut untuk memahami dan mempraktikkan konsep penting dalam pemrograman PHP berbasis objek.
    </p>
    <ol>
      <li>Baca dan pahami kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
      <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan sesuai urutan dan struktur aslinya.</li>
      <li>Pastikan setiap detail penulisan seperti titik koma (<code>;</code>), tanda kurung, dan indentasi sesuai dengan contoh.</li>
      <li>Setelah selesai mengetik, klik tombol <code>RUN</code> untuk menjalankan kode.</li>
      <li>Perhatikan hasil output program yang muncul.</li>
      <li>Salin dan tuliskan output tersebut ke dalam kolom yang tersedia di bawah.</li>
      <li>Terakhir, klik tombol <strong>Periksa Output</strong> untuk mengecek apakah hasil output kamu sudah benar.</li>
    </ol>

    <p class="mt-3">
      💡 <strong>Catatan:</strong> Aktivitas <em>Ayo Pahami</em> ini merupakan <u>syarat untuk dapat mengakses halaman selanjutnya</u>. Pastikan output yang kamu masukkan sudah benar agar kamu dapat melanjutkan ke materi berikutnya.
    </p>

  </div>

  <!-- <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar7') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div> -->

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Perpustakaan {
    function ambilBuku(): Buku {
        return new Buku("Pemrograman PHP");
    }
}

class Buku {
    public $judul;

    function __construct($judul) {
        $this->judul = $judul;
    }
}

$perpustakaan = new Perpustakaan();
$buku = $perpustakaan->ambilBuku();
echo "Buku yang diperoleh: " . $buku->judul;</code></pre>
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
    <textarea id="outputAyo6" class="form-control" rows="4" placeholder="Tulis output di sini..."></textarea>
    <button class="btn-next mt-2" onclick="cekAyoPahami6()">Periksa Output</button>
    <div id="feedbackAyo6" class="mt-3"></div>
  </div>
</div>
  </div>
  

  
<!--  LATIHAN -->
  <div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p class="quiz-intro">
  Susunlah potongan-potongan kode PHP berikut ini agar membentuk program yang benar untuk mendeklarasikan sebuah <strong>method</strong> di dalam <strong>class</strong>.<br>
  Gunakan metode <strong>drag-and-drop</strong> (seret dan lepas) untuk mengatur urutan baris kode yang tersedia hingga sesuai struktur program yang benar.<br><br>

  Perhatikan dengan seksama posisi tanda <code>}</code> pada setiap baris, karena terdapat dua penutup kurung kurawal: satu untuk <strong>method</strong> dan satu lagi untuk <strong>class</strong>. Gunakan komentar yang ada di samping tanda <code>}</code> sebagai petunjuk dalam menentukan urutan.<br><br>

  Setelah kamu selesai menyusun kode, klik tombol <strong>Cek Jawaban</strong> untuk melihat hasilnya.<br>
  Jika jawaban masih salah, kamu bisa mencoba kembali hingga urutan benar.<br>
  Untuk memulai ulang dari awal, klik tombol <strong>Ulang</strong> agar semua baris kode dikocok ulang.<br><br>

  💡 <strong>Catatan:</strong> Latihan ini merupakan <u>syarat</u> untuk membuka akses ke halaman berikutnya. Pastikan kamu menyusunnya dengan benar agar dapat melanjutkan ke materi selanjutnya.
</p>

  </div>

  <ul id="list-kode-b21" class="list-group-b21 mb-3"></ul>

  <div class="quiz-actions">
    <button id="cekJawaban-b21" class="btn-next">Cek Jawaban</button>
    <button id="resetJawaban-b21" class="btn-back">Ulang</button>
  </div>

  <div id="feedback-b21" class="feedback d-none"></div>
</div>

```
  </div>
</div>

<div class="pagination">
<a href="./b22-mendeklarasikanp"
   id="btnSelanjutnya"
   class="next"
   style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
   {{ $selesai ? '' : 'disabled' }}>
  Selanjutnya &raquo;
</a>
</div>






<script>
let ayoPahamiBerhasil = [false, false, false, false, false, false]; // 6 soal Ayo Pahami di B21
let sudahLatihan = false;
let progressTerkirim = false;

function cekKelayakanAksesGabunganB21() {
  const semuaSelesai = ayoPahamiBerhasil.every(val => val === true);

  if (semuaSelesai && sudahLatihan && !progressTerkirim) {
    progressTerkirim = true;
    kirimProgressHalaman("b21-mendeklarasikanm");

    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  }
}


  
// CEK OUTPUT AYO PAHAMI
function cekAyoPahami1() {
  const jawaban = document.getElementById('outputAyo1').value.trim();
  const kunci = 'Toyota';
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
        <li><strong>Baris 2</strong>: Mendefinisikan class <code>Mobil</code>.</li>
        <li><strong>Baris 3</strong>: Menambahkan properti publik <code>$merk</code> dengan nilai awal kosong.</li>
        <li><strong>Baris 5–7</strong>: Mendefinisikan method <code>getMerk()</code> untuk mengembalikan nilai <code>$this->merk</code>.</li>
        <li><strong>Baris 9–11</strong>: Mendefinisikan method <code>setMerk()</code> untuk menetapkan nilai baru ke <code>$merk</code>.</li>
        <li><strong>Baris 14</strong>: Membuat object baru dari class <code>Mobil</code>.</li>
        <li><strong>Baris 15</strong>: Menetapkan nilai <code>"Toyota"</code> ke properti <code>$merk</code> melalui method <code>setMerk()</code>.</li>
        <li><strong>Baris 16</strong>: Menampilkan nilai <code>$merk</code> melalui method <code>getMerk()</code> yang menghasilkan output <code>Toyota</code>.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> Pada contoh di atas, method <code>getMerk()</code> dan <code>setMerk()</code> menggunakan <code>$this</code> untuk mengakses dan mengubah properti <code>$merk</code> pada objek yang sedang digunakan.
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

  cekKelayakanAksesGabunganB21();
}


function cekAyoPahami2() {
  const jawaban = document.getElementById('outputAyo2').value.trim();
  const kunci = '1627';
  const feedback = document.getElementById('feedbackAyo2');

  if (jawaban === kunci) {
    feedback.innerHTML = `
    <div class="alert alert-success">
      ✅ <strong>Selamat!</strong> Output kamu sudah sesuai.<br>
      Kamu telah berhasil memahami cara mendeklarasikan dan menggunakan <strong>method statis</strong> dalam PHP.<br>
      Method statis bisa dipanggil langsung dari nama class tanpa harus membuat objek terlebih dahulu.
    </div>

    <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
      <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
      <ul style="padding-left: 20px;">
        <li><strong>Baris 2</strong>: Mendefinisikan class <code>PembantuMatematika</code>.</li>
        <li><strong>Baris 3–5</strong>: Mendeklarasikan method statis <code>kuadrat()</code> untuk menghitung hasil pangkat dua dari angka.</li>
        <li><strong>Baris 7–9</strong>: Mendeklarasikan method statis <code>kubus()</code> untuk menghitung pangkat tiga dari angka.</li>
        <li><strong>Baris 13</strong>: Memanggil method <code>kuadrat(4)</code> langsung dari class tanpa membuat objek → hasilnya <code>16</code>.</li>
        <li><strong>Baris 14</strong>: Memanggil method <code>kubus(3)</code> → hasilnya <code>27</code>.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> Method <code>kuadrat()</code> dan <code>kubus()</code> dideklarasikan sebagai method statis dan dapat langsung dipanggil dengan <code>PembantuMatematika::kuadrat(4)</code> tanpa perlu membuat objek terlebih dahulu.
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

  cekKelayakanAksesGabunganB21();
}


function cekAyoPahami3() {
  const jawaban = document.getElementById('outputAyo3').value.trim();
  const kunci = 'Error';
  const feedback = document.getElementById('feedbackAyo3');

  if (jawaban === kunci) {
    feedback.innerHTML = `
    <div class="alert alert-success">
      ✅ <strong>Benar!</strong> Kamu berhasil memahami aturan penggunaan method <code>final</code> dalam pewarisan class.<br>
      Program menghasilkan <strong>error</strong> karena method <code>getNama()</code> yang dideklarasikan sebagai <code>final</code> di class <code>Hewan</code> tidak boleh dioverride oleh class <code>Anjing</code>.
    </div>

    <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
      <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
      <ul style="padding-left: 20px;">
        <li><strong>Baris 2</strong>: Mendefinisikan class <code>Hewan</code> dengan properti <code>$nama</code>.</li>
        <li><strong>Baris 5–7</strong>: Method <code>getNama()</code> ditandai sebagai <code>final</code>, artinya tidak boleh dioverride.</li>
        <li><strong>Baris 10</strong>: Mendefinisikan class <code>Anjing</code> sebagai turunan dari <code>Hewan</code>.</li>
        <li><strong>Baris 11–13</strong>: Class <code>Anjing</code> mencoba mendeklarasikan ulang method <code>getNama()</code> → ini menyebabkan error.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> Dalam contoh ini, method <code>getNama()</code> di dalam class <code>Hewan</code> dideklarasikan sebagai <code>final</code>, sehingga class <code>Anjing</code> tidak diperbolehkan untuk menggantinya (override).
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

  cekKelayakanAksesGabunganB21();
}


function cekAyoPahami4() {
  const jawaban = document.getElementById('outputAyo4').value.trim();
  const kunci = 'Transaksi berhasil. Saldo saat ini: 1000';
  const feedback = document.getElementById('feedbackAyo4');

  if (jawaban === kunci) {
    feedback.innerHTML = `
    <div class="alert alert-success">
      ✅ <strong>Selamat!</strong> Output kamu sudah sesuai.<br>
      Kamu berhasil memahami <strong>modifier akses</strong> seperti <code>public</code>, <code>protected</code>, dan <code>private</code> dalam class PHP.<br>
      Selain itu, kamu juga telah memahami bagaimana sebuah method bisa memanggil method lain dalam class yang sama.
    </div>

    <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
      <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
      <ul style="padding-left: 20px;">
        <li><strong>Baris 2</strong>: Membuat class <code>RekeningBank</code> dengan properti <code>$saldo</code>.</li>
        <li><strong>Baris 5–8</strong>: Method <code>setor()</code> bersifat <code>public</code>, dapat diakses dari luar class.</li>
        <li><strong>Baris 10–17</strong>: Method <code>tarik()</code> bersifat <code>protected</code>, hanya bisa diakses dari dalam class atau turunannya.</li>
        <li><strong>Baris 19–21</strong>: Method <code>catatTransaksi()</code> bersifat <code>private</code>, hanya bisa dipanggil dari dalam class.</li>
        <li><strong>Baris 24</strong>: Membuat objek baru dari class <code>RekeningBank</code>.</li>
        <li><strong>Baris 25</strong>: Memanggil method <code>setor(1000)</code> → saldo bertambah, dan method <code>catatTransaksi()</code> mencetak informasi saldo.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> Akses modifier digunakan untuk mengontrol akses terhadap properti dan method. Contoh ini menunjukkan bagaimana method <code>private</code> dan <code>protected</code> menjaga keamanan internal class, sementara method <code>public</code> digunakan sebagai antarmuka luar class.
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

  cekKelayakanAksesGabunganB21();
}


function cekAyoPahami5() {
  const jawaban = document.getElementById('outputAyo5').value.trim();
  const kunci = 'Tugas diberikan: Menganalisis data keuangan';
  const feedback = document.getElementById('feedbackAyo5');

  if (jawaban === kunci) {
    feedback.innerHTML = `
    <div class="alert alert-success">
      ✅ <strong>Selamat!</strong> Output kamu sudah sesuai.<br>
      Kamu telah berhasil memahami <strong>type hinting pada parameter</strong> method di PHP, serta cara menggunakan class sebagai parameter antar objek.
    </div>

    <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
      <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
      <ul style="padding-left: 20px;">
        <li><strong>Baris 2–6</strong>: Mendefinisikan class <code>Karyawan</code> dan method <code>berikanTugas()</code> yang menerima parameter bertipe <code>Tugas</code>.</li>
        <li><strong>Baris 8–14</strong>: Mendefinisikan class <code>Tugas</code> dengan properti <code>deskripsi</code> dan constructor untuk menetapkan nilainya.</li>
        <li><strong>Baris 16</strong>: Membuat objek <code>Tugas</code> baru dengan deskripsi "Menganalisis data keuangan".</li>
        <li><strong>Baris 17</strong>: Membuat objek <code>Karyawan</code>.</li>
        <li><strong>Baris 18</strong>: Memanggil method <code>berikanTugas()</code> dengan parameter objek <code>Tugas</code> → mencetak deskripsi tugas.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> Dalam contoh ini, method <code>berikanTugas()</code> hanya menerima objek dari class <code>Tugas</code>, sehingga pemanggilan dengan tipe data lain akan menyebabkan error.
      </p>
    </div>
    `;
    ayoPahamiBerhasil[4] = true;
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
    ayoPahamiBerhasil[4] = false;
  }

  cekKelayakanAksesGabunganB21();
}


function cekAyoPahami6() {
  const jawaban = document.getElementById('outputAyo6').value.trim();
  const kunci = 'Buku yang diperoleh: Pemrograman PHP';
  const feedback = document.getElementById('feedbackAyo6');

  if (jawaban === kunci) {
    feedback.innerHTML = `
    <div class="alert alert-success">
      ✅ <strong>Selamat!</strong> Output kamu sudah sesuai.<br>
      Kamu berhasil memahami bagaimana cara menggunakan <strong>type hinting untuk return type</strong> dalam method PHP, dan bagaimana class bisa mengembalikan objek class lain.
    </div>

    <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
      <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
      <ul style="padding-left: 20px;">
        <li><strong>Baris 2–6</strong>: Mendefinisikan class <code>Perpustakaan</code> dan method <code>ambilBuku()</code> dengan <strong>return type</strong> <code>Buku</code>.</li>
        <li><strong>Baris 8–14</strong>: Mendefinisikan class <code>Buku</code> dengan properti <code>$judul</code> dan constructor untuk menetapkannya.</li>
        <li><strong>Baris 16</strong>: Membuat objek <code>Perpustakaan</code>.</li>
        <li><strong>Baris 17</strong>: Memanggil method <code>ambilBuku()</code> yang mengembalikan objek <code>Buku</code> dengan judul "Pemrograman PHP".</li>
        <li><strong>Baris 18</strong>: Menampilkan judul buku melalui properti <code>$buku->judul</code> → menghasilkan output akhir.</li>
      </ul>
      <p class="mt-3 mb-0">
        💡 <strong>Kesimpulan:</strong> Di sini, method <code>ambilBuku()</code> harus mengembalikan objek dari class <code>Buku</code>. Jika method ini mengembalikan tipe data lain, PHP akan menghasilkan error.
      </p>
    </div>
    `;
    ayoPahamiBerhasil[5] = true;
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
    ayoPahamiBerhasil[5] = false;
  }

  cekKelayakanAksesGabunganB21();
}


// LATIHAN
const barisKodeB21 = [
  { nomor: 1, isi: '} // penutup class Produk' },
  { nomor: 2, isi: 'public function getNama() {' },
  { nomor: 3, isi: 'class Produk {' },
  { nomor: 4, isi: '<?php' },
  { nomor: 5, isi: '} // penutup method getNama()' },
  { nomor: 6, isi: 'return $this->nama;' },
  { nomor: 7, isi: 'public $nama = "Buku Tulis";' },
  { nomor: 8, isi: '?>' }
];


const jawabanBenarB21 = [4, 3, 7, 2, 6, 5, 1, 8];

function tampilkanAcakB21() {
  const list = document.getElementById('list-kode-b21');
  list.innerHTML = '';
  const acak = [...barisKodeB21].sort(() => Math.random() - 0.5);
  acak.forEach(baris => {
    const item = document.createElement('li');
    item.className = 'list-group-item-b21';
    item.textContent = `${baris.nomor}. ${baris.isi}`;
    item.setAttribute('data-nomor', baris.nomor);
    item.setAttribute('draggable', true);
    list.appendChild(item);
  });
  aktifkanDragDropB21();
  document.getElementById('cekJawaban-b21').textContent = 'Cek Jawaban';
  document.getElementById('cekJawaban-b21').className = 'btn-next';
}

function aktifkanDragDropB21() {
  const list = document.getElementById('list-kode-b21');
  let draggedItem = null;

  list.querySelectorAll('li').forEach(item => {
    item.addEventListener('dragstart', () => {
      draggedItem = item;
      item.classList.add('dragging');
    });

    item.addEventListener('dragend', () => {
      item.classList.remove('dragging');
      draggedItem = null;
    });

    item.addEventListener('dragover', e => e.preventDefault());

    item.addEventListener('drop', e => {
      e.preventDefault();
      if (draggedItem && draggedItem !== item) {
        const siblings = [...list.children];
        const draggedIndex = siblings.indexOf(draggedItem);
        const targetIndex = siblings.indexOf(item);
        if (draggedIndex < targetIndex) {
          list.insertBefore(draggedItem, item.nextSibling);
        } else {
          list.insertBefore(draggedItem, item);
        }
      }
    });
  });
}

const cekBtnB21 = document.getElementById('cekJawaban-b21');
const resetBtnB21 = document.getElementById('resetJawaban-b21');
const feedbackB21 = document.getElementById('feedback-b21');

cekBtnB21.addEventListener('click', () => {
  const urutan = [...document.querySelectorAll('#list-kode-b21 li')].map(li => parseInt(li.dataset.nomor));
  const benar = JSON.stringify(urutan) === JSON.stringify(jawabanBenarB21);
  feedbackB21.className = 'feedback';
  if (benar) {
    feedbackB21.classList.add('correct');
    feedbackB21.innerHTML = '🎉 Jawaban kamu benar! Program PHP-nya sudah tersusun dengan tepat.';
    cekBtnB21.textContent = 'Jawaban Benar';
    cekBtnB21.className = 'btn-next';
    
    sudahLatihan = true;
    cekKelayakanAksesGabunganB21();

  } else {
    feedbackB21.classList.add('incorrect');
    feedbackB21.innerHTML = '❌ Masih salah, coba urutkan ulang dengan cermat.';
  }
  feedbackB21.classList.remove('d-none');
});

resetBtnB21.addEventListener('click', () => {
  if (feedbackB21.classList.contains('correct')) {
    tampilkanAcakB21();
    feedbackB21.className = 'feedback d-none';
  }
});
document.addEventListener('DOMContentLoaded', tampilkanAcakB21);

</script>

@if($selesai)
<script>
  window.addEventListener('DOMContentLoaded', () => {
    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  });
</script>
@endif

@endsection