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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b51-konsepd')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="TIKjudul">
            <h4>E.  SERIALIZATION</h4>
        </div>

        <div class="TIK">
            <h5>Tujuan Pembelajaran</h5>
            <p>Setelah menyelesaikan materi ini, mahasiswa diharapkan mampu:</p>
            <ol>
                <li>Memahami konsep serialization dan deserialization dalam PHP.</li>
                <li>Menggunakan fungsi serialize() dan unserialize() untuk menyimpan dan memulihkan object.</li>
                <li>Menjelaskan peran __sleep() dan __wakeup() dalam proses serialization.</li>
                <li>Menerapkan serialization dalam pengelolaan data pada program PHP berbasis objek.</li>

            </ol>
        </div>

<div class="judul-subbab">
      <h5>KONSEP DASAR SERIALIZE</h5>
  </div>

  <div class="TIK">
    <p><strong>Konsep Dasar:</strong> Serialisasi adalah proses mengubah suatu object menjadi format <i>bytestream</i> yang dapat disimpan dalam file atau ditransfer melalui jaringan. Hal ini berguna untuk menyimpan data secara persisten, seperti dalam sesi PHP.</p>
    <p>Di PHP, serialisasi dan deserialisasi dilakukan dengan menggunakan dua fungsi utama:</p>
    <ul>
      <li><code>serialize(\$object)</code>: Mengubah object menjadi format string.</li>
      <li><code>unserialize(\$string)</code>: Mengembalikan object dari string yang telah diserialisasi.</li>
    </ul>
    <pre class="line-numbers"><code class="language-php">\$encoded = serialize(\$object);
\$decoded = unserialize(\$encoded);</code></pre>

<p>Untuk menambah pemahamanmu, coba perhatikan ilustrasi inheritance berikut ini!. </p>
<div class="teks-kontenpt2">
    <img style="display: block; margin: 0 auto;" class="scrool" src="images/G7.png" alt="Gambar 7 Proses Serialize dan Unserialize pada Object">
    <p>Gambar 7 Proses Serialize dan Unserialize pada Object</p>
</div>    

<p><em>Pada proses serialize, object seperti “barang” dimasukkan ke dalam kotak untuk disimpan atau dikirim. Kemudian melalui unserialize, kotak dibuka kembali dan object tersebut siap digunakan.</em></p>

    <h6>Penggunaan Serialisasi dalam PHP</h6>
    <p>Serialisasi paling sering digunakan dalam sesi PHP, yang secara otomatis menyimpan dan memulihkan object di antara kunjungan halaman. Selain itu, serialisasi juga dapat digunakan untuk:</p>
    <ul>
      <li>Menyimpan object dalam file atau database</li>
      <li>Mengirim object melalui jaringan (API/WebSocket)</li>
      <li>Menyimpan <i>cache</i> object untuk meningkatkan performa aplikasi</li>
    </ul>
    <p>Sebelum melakukan deserialisasi dengan unserialize(), class object harus sudah didefinisikan. Jika tidak, object akan dikonversi menjadi stdClass, yang membuatnya tidak dapat digunakan dengan semestinya. Untuk menghindari masalah ini, pastikan file yang berisi definisi class selalu dimuat sebelum sesi dimulai:</p>
    <pre class="line-numbers"><code class="language-php">include "class_definitions.php";
session_start();</code></pre>

    <h6>Magic Method <code>__sleep()</code> dan <code>__wakeup()</code></h6>
    <p>PHP menyediakan dua magic method yang dipanggil saat proses serialisasi dan deserialisasi terjadi. <code>__sleep()</code>	dipanggil sebelum serialisasi, dapat digunakan untuk membersihkan data, menutup koneksi database, dan hanya menyimpan property tertentu, harus mengembalikan array berisi property yang akan disimpan. <code>__wakeup()</code> dipanggil setelah deserialisasi, dapat digunakan untuk menginisialisasi ulang object, seperti membuka kembali koneksi database atau file.</p>
    <p>Berikut adalah contoh class Log, yang dapat mencatat log ke dalam file. Class ini menggunakan __sleep() untuk menutup file sebelum serialisasi dan __wakeup() untuk membukanya kembali setelah deserialisasi.</p>
    <pre class="line-numbers"><code class="language-php">class Log {
    private \$filename;
    private \$fileHandle;

    public function __construct(\$filename) {
        \$this->filename = \$filename;
        \$this->open();
    }

    private function open() {
        \$this->fileHandle = fopen(\$this->filename, 'a') or die("Tidak dapat membuka file {\$this->filename}");
    }

    public function write(\$message) {
        fwrite(\$this->fileHandle, "{\$message}\n");
    }

    public function read() {
        return file_get_contents(\$this->filename);
    }

    public function __sleep() {
        fclose(\$this->fileHandle);
        return ['filename'];
    }

    public function __wakeup() {
        \$this->open();
    }
}</code></pre>

<p>Dalam implementasi ini, ketika object diserialisasi, __sleep() akan menutup file dan hanya menyimpan property filename. Saat object di-unserialize, __wakeup() akan membuka kembali file sehingga object dapat digunakan kembali.</p>
    <h6>Membuat Object Persistent dengan Sesi PHP</h6>
    <p>Untuk menunjukkan penggunaan serialisasi dalam sesi PHP, berikut adalah implementasi yang memungkinkan object Log tetap ada di antara halaman yang berbeda.</p>
    <p>Contoh implementasi penggunaan object <code>Log</code> dalam sesi PHP:</p>

    <p><strong>1. Halaman Utama (index.php)</strong></p>
    <p>Halaman ini akan membuat object log jika belum ada dalam sesi, lalu menuliskan pesan ke dalamnya.</p>
    <pre class="line-numbers"><code class="language-php">include_once "Log.php";
session_start();

\$now = date("Y-m-d H:i:s");

if (!isset($_SESSION['logger'])) {
    $_SESSION['logger'] = new Log("log.txt");
    $_SESSION['logger']->write("Session dimulai pada \$now");
    echo "<p>Session dimulai dan object log dibuat.</p>";
} else {
    echo "<p>Object log telah ada dalam sesi.</p>";
}

$_SESSION['logger']->write("Mengakses halaman utama pada \$now");

echo "<p>Isi log saat ini:</p>";
echo nl2br($_SESSION['logger']->read());
<.a href="#">Ke Halaman Selanjutnya</a></code></pre>

    <p><strong>2. next.php</strong></p>
    <p>Halaman ini akan menggunakan kembali object log dari sesi tanpa perlu membuat ulang.</p>
    <pre class="line-numbers"><code class="language-php">include_once "Log.php";
session_start();

\$now = date("Y-m-d H:i:s");

if (isset($_SESSION['logger'])) {
    $_SESSION['logger']->write("Mengakses halaman kedua pada \$now");

    echo "<p>Isi log saat ini:</p>";
    echo nl2br($_SESSION['logger']->read());
} else {
    echo "<p>Session belum dibuat!</p>";
}
<.a href="#">Kembali ke Halaman Utama</a>
</code></pre>


    <h6><strong>Output yang Dihasilkan</strong></h6>
    <p>Jika pengguna mengakses index.php terlebih dahulu, lalu berpindah ke next.php, isi log akan terlihat seperti berikut:</p>
    <pre><strong>
Session dimulai pada 2025-02-18 14:00:00
Mengakses halaman utama pada 2025-02-18 14:00:00
Mengakses halaman kedua pada 2025-02-18 14:02:15
</strong></pre>
  </div>

<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>
      Untuk menguji pemahaman kamu tentang penggunaan <strong>serialization</strong> dalam OOP PHP,
      kerjakan aktivitas berikut ini!
    </p>
    <p>
      Lengkapilah kode berikut agar object dari class <code>Pengaturan</code> dapat diserialisasi dan
      disimpan dalam file, lalu dibaca ulang dan ditampilkan kembali. Isilah bagian yang kosong dengan fungsi atau properti yang tepat.
    </p>
  </div>

  <div class="row">
    <!-- KODE -->
    <div class="col-md-8">
      <div class="kode-box p-3">
<pre style="font-size: 13px;"><code>&lt;?php
class Pengaturan {
    public $tema;
    public $bahasa;

    public function __construct($tema, $bahasa) {
        $this-><span class="drop-zone" id="drop1">___</span> = $tema;
        $this-><span class="drop-zone" id="drop2">___</span> = $bahasa;
    }

    public function tampilkan() {
        return "Tema: {$this->tema}, Bahasa: {$this->bahasa}";
    }
}

// Buat object baru
$setelan = new Pengaturan("Gelap", "Indonesia");

// Simpan ke file
$konten = <span class="drop-zone" id="drop3">___</span>($setelan);
file_put_contents("setelan.txt", $konten);

// Baca kembali dari file
$data = file_get_contents("setelan.txt");
$setelanBaru = <span class="drop-zone" id="drop4">___</span>($data);

// Tampilkan hasil
echo $setelanBaru-><span class="drop-zone" id="drop5">___</span>();
?&gt;
</code></pre>
      </div>
    </div>

    <!-- PILIHAN -->
    <div class="col-md-4">
      <p><strong>Seret ke bagian kosong:</strong></p>
      <ul id="dragItems" class="list-group">
        <li class="drag-item" draggable="true" data-value="serialize">serialize</li>
        <li class="drag-item" draggable="true" data-value="bahasa">bahasa</li>
        <li class="drag-item" draggable="true" data-value="tema">tema</li>
        <li class="drag-item" draggable="true" data-value="tampilkan">tampilkan</li>
        <li class="drag-item" draggable="true" data-value="unserialize">unserialize</li>
      </ul>
    </div>
  </div>

  <div class="quiz-actions mt-3">
    <button class="btn-next" onclick="cekDragJawaban()">PERIKSA</button>
    <button class="btn-back" onclick="resetDragJawaban()">RESET</button>
  </div>

  <div id="feedbackDrag" class="feedback d-none mt-2"></div>
</div>

<script>
let draggedItem = null;

document.querySelectorAll('.drag-item').forEach(item => {
  item.addEventListener('dragstart', () => {
    draggedItem = item;
    item.classList.add('dragging');
  });

  item.addEventListener('dragend', () => {
    item.classList.remove('dragging');
  });
});

document.querySelectorAll('.drop-zone').forEach(zone => {
  zone.addEventListener('dragover', e => e.preventDefault());
  zone.addEventListener('drop', e => {
    e.preventDefault();
    if (draggedItem) {
      zone.textContent = draggedItem.dataset.value;
      zone.dataset.value = draggedItem.dataset.value;
    }
  });
});

function cekDragJawaban() {
  const d1 = document.getElementById('drop1').dataset.value || '';
  const d2 = document.getElementById('drop2').dataset.value || '';
  const d3 = document.getElementById('drop3').dataset.value || '';
  const d4 = document.getElementById('drop4').dataset.value || '';
  const d5 = document.getElementById('drop5').dataset.value || '';
  const feedback = document.getElementById('feedbackDrag');
  feedback.className = 'feedback';

  if (
    d1 === 'tema' &&
    d2 === 'bahasa' &&
    d3 === 'serialize' &&
    d4 === 'unserialize' &&
    d5 === 'tampilkan'
  ) {
    feedback.classList.add('correct');
    feedback.innerHTML = '🎉 Jawaban kamu benar! Serialization dan deserialization sudah tepat.';
    kirimProgressHalaman("b51-konsepd");

    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Ada yang salah, coba periksa kembali nama fungsi dan properti.';
  }

  feedback.classList.remove('d-none');
}

function resetDragJawaban() {
  ['drop1', 'drop2', 'drop3', 'drop4', 'drop5'].forEach(id => {
    const el = document.getElementById(id);
    el.textContent = '___';
    el.dataset.value = '';
  });
  document.getElementById('feedbackDrag').className = 'feedback d-none';
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


</div>

@php
  $nextPage = './b52-pkuis';
  $tampilkanTombol = true;

  if (!auth()->check()) {
    $tampilkanTombol = false; // guest tidak melihat tombol
  } else {
    $role = auth()->user()->role ?? null;
    if ($role === 'mahasiswa' || $role === 'dosen') {
      $nextPage = './b52-pkuis';
    }
  }
@endphp

@if($tampilkanTombol)
  <div class="pagination">
    <a href="{{ $nextPage }}"
       id="btnSelanjutnya"
       class="next"
       style="pointer-events: none; opacity: 0.5;">
      Selanjutnya &raquo;
    </a>
  </div>
@endif



@endsection

