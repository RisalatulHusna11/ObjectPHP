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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b24-inheritance')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>4. INHERITANCE</h5>
  </div> 

  <div class="TIK">
    <p>Pewarisan, atau <em>inheritance</em>, adalah konsep dalam pemrograman berorientasi objek (OOP) di mana sebuah class dapat mewarisi <code>property</code> dan <code>method</code> dari class lain. Class yang mewarisi disebut sebagai <strong>child class</strong> atau <strong>subclass</strong>, sementara class yang diwarisi disebut sebagai <strong>parent class</strong> atau <strong>superclass</strong>. Dengan pewarisan, kita dapat menghindari duplikasi kode dan memanfaatkan kembali kode yang sudah ada.</p>

    <p>Untuk menambah pemahamanmu, coba perhatikan ilustrasi inheritance berikut ini!</p>
      <div class="teks-kontenpt2">
        <img style="display: block; margin: 0 auto;" class="scrool" src="images/G5.png" alt="Gambar 5 Hubungan Pewarisan: Kendaraan sebagai Superclass">
      <p>Gambar 5 Hubungan Pewarisan: Kendaraan sebagai Superclass</p>
  </div>
    <p>Ilustrasi ini menunjukkan bahwa Mobil, Sepeda, dan Truk semuanya adalah turunan dari class <code>Kendaraan</code>. Hubungan "adalah" ini dibentuk dalam PHP dengan keyword <code>extends</code>. Class anak akan mewarisi semua property dan method dari class induknya yang bersifat public dan protected, dan dapat menambahkan atau memodifikasi fungsionalitas sesuai kebutuhan.</p>

    <h6>Contoh Penggunaan Pewarisan</h6>
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
    <a href="{{ route('ayoPahami.besar17') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Manusia {
    public $nama, $alamat, $umur;

    public function __construct($nama, $alamat, $umur) {
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->umur = $umur;
    }

    public function perkenalan() {
        echo "Halo, nama saya {$this->nama}, saya berumur {$this->umur} tahun dan tinggal di {$this->alamat}.&lt;br&gt;";
    }
}

class Pekerja extends Manusia {
    public $pekerjaan, $gaji;

    public function __construct($nama, $alamat, $umur, $pekerjaan, $gaji) {
        parent::__construct($nama, $alamat, $umur);
        $this->pekerjaan = $pekerjaan;
        $this->gaji = $gaji;
    }

    public function infoPekerjaan() {
        echo "{$this->nama} bekerja sebagai {$this->pekerjaan} dengan gaji sebesar Rp.{$this->gaji}.&lt;br&gt;";
    }
}

$pekerja1 = new Pekerja("Andi", "Jakarta", 30, "Programmer", 10000000);
$pekerja1->perkenalan();
$pekerja1->infoPekerjaan();
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Class <code>Manusia</code> memiliki property <code>$nama</code>, <code>$alamat</code>, dan <code>$umur</code> serta method <code>perkenalan()</code>. Class <code>Pekerja</code> mewarisi class <code>Manusia</code> menggunakan <code>extends</code> dan menambahkan property <code>$pekerjaan</code> serta <code>$gaji</code>. Method <code>perkenalan()</code> diwarisi dari <code>Manusia</code>, sementara method <code>infoPekerjaan()</code> ditambahkan di <code>Pekerja</code>. Constructor di <code>Pekerja</code> memanggil constructor <code>Manusia</code> menggunakan <code>parent::__construct()</code> agar nilai dari class induk tetap terinisialisasi.
  </p>
</div>



<h6>Overriding Method</h6>
    <p>Jika sebuah class turunan memiliki method dengan nama yang sama seperti di class induk, maka method di class turunan akan menimpa method di class induk. Jika tetap ingin memanggil method induk, gunakan parent::method(). Contoh overriding method:</p>
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
    <a href="{{ route('ayoPahami.besar18') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Ayah {
    public function motivasi() {
        echo "[Class Ayah] Nak, belajarlah dengan giat untuk masa depanmu!&lt;br&gt;";
    }
}

class Anak extends Ayah {
    public function motivasi() {
        echo "[Class Anak] Aku akan belajar dengan giat dan bekerja keras!&lt;br&gt;";
    }

    public function motivasiAyah() {
        parent::motivasi(); // Memanggil method dari class induk
    }
}

$anak1 = new Anak();
$anak1->motivasi();       // Output dari class Anak
$anak1->motivasiAyah();   // Memanggil method dari class Ayah
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Class <code>Ayah</code> memiliki method <code>motivasi()</code>. Class <code>Anak</code> mewarisi class <code>Ayah</code> tetapi menimpa method <code>motivasi()</code>. Method <code>motivasiAyah()</code> di class <code>Anak</code> menggunakan <code>parent::motivasi()</code> untuk tetap memanggil method dari class induk.
  </p>
</div>



    <h6>Constructor dalam Inheritance</h6>
    <p>PHP tidak secara otomatis memanggil constructor class induk saat class turunan memiliki constructor sendiri. Oleh karena itu, harus memanggilnya secara eksplisit menggunakan parent::__construct(). Contoh pemanggilan constructor class induk:</p>
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
    <a href="{{ route('ayoPahami.besar19') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class OrangTua {
    public $nama;

    public function __construct($nama) {
        $this->nama = $nama;
        echo "Orang tua bernama {$this->nama} telah dibuat.&lt;br&gt;";
    }
}

class Anak extends OrangTua {
    public $hobi;

    public function __construct($nama, $hobi) {
        parent::__construct($nama); // Memanggil constructor dari class induk
        $this->hobi = $hobi;
        echo "Anak bernama {$this->nama} memiliki hobi {$this->hobi}.&lt;br&gt;";
    }
}

$anak1 = new Anak("Budi", "Bermain Sepak Bola");
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Class <code>OrangTua</code> memiliki constructor yang menerima parameter <code>$nama</code>. Class <code>Anak</code> memiliki constructor sendiri yang tetap memanggil constructor <code>OrangTua</code> menggunakan <code>parent::__construct($nama)</code>. Output menampilkan pesan dari constructor <code>OrangTua</code> dan <code>Anak</code>.
  </p>
</div>



<h6>Final Method dalam Inheritance</h6>
    <p>Jika ingin mencegah method tertentu agar tidak bisa ditimpa oleh class turunan, gunakan final pada deklarasi method. Contoh penggunaan final method:</p>
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
    <a href="{{ route('ayoPahami.besar20') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pengguna {
    final public function hakAkses() {
        echo "Hak akses ini tidak bisa diubah oleh class turunan.&lt;br&gt;";
    }
}

class Admin extends Pengguna {
    // Jika mencoba menimpa method hakAkses(), akan muncul error
    /*
    public function hakAkses() {
        echo "Ini tidak boleh dilakukan.";
    }
    */
}

$admin1 = new Admin();
$admin1->hakAkses();
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    <code>Final public function hakAkses()</code> dalam class <code>Pengguna</code> tidak bisa ditimpa oleh class <code>Admin</code>. Jika mencoba menulis ulang method <code>hakAkses()</code> di <code>Admin</code>, PHP akan memberikan error.
  </p>
</div>



<h6>Mengecek Instance dengan instanceof</h6>
    <p>Operator instanceof digunakan untuk mengecek apakah sebuah object merupakan instance dari suatu class tertentu. Contoh penggunaan instanceof:</p>
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
    <a href="{{ route('ayoPahami.besar21') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mahasiswa {
}

class Dosen {
}

$orang1 = new Mahasiswa();
$orang2 = new Dosen();

if ($orang1 instanceof Mahasiswa) {
    echo "Orang pertama adalah seorang Mahasiswa.&lt;br&gt;";
}

if ($orang2 instanceof Dosen) {
    echo "Orang kedua adalah seorang Dosen.&lt;br&gt;";
}
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    <code>instanceof</code> digunakan untuk memeriksa apakah <code>$orang1</code> merupakan instance dari <code>Mahasiswa</code> dan <code>$orang2</code> merupakan instance dari <code>Dosen</code>. Hasilnya akan menampilkan bahwa <code>$orang1</code> adalah Mahasiswa dan <code>$orang2</code> adalah Dosen.
  </p>
</div>

  </div>

<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Ayo uji pemahamanmu tentang <strong>pewarisan class di PHP!</strong></p>
    <p>
      Lengkapilah potongan kode berikut agar bisa membuat objek dari <strong>child class</strong> dan memanggil <strong>method yang diwariskan</strong> dari parent class.
    </p>
  </div>

  <div class="kode-box">
<pre><code>&lt;?php
class Elektronik {
    public $nama = "Televisi";

    public function hidupkan() {
        echo "Elektronik dinyalakan.";
    }
}

class Laptop <span class="drop-zone" id="drop1">___</span> Elektronik {
}

$laptopBaru = new Laptop;
echo <span class="drop-zone" id="drop2">___</span> . PHP_EOL;
$laptopBaru-><span class="drop-zone" id="drop3">___</span>();
?&gt;
</code></pre>
  </div>

  <p class="mt-3"><strong>Seret potongan kode berikut ke tempat yang kosong:</strong></p>
  <ul id="dragItems" class="list-group mb-3">
    <li class="drag-item" draggable="true" data-value="public">public</li>
    <li class="drag-item" draggable="true" data-value="hidupkan">hidupkan</li>
    <li class="drag-item" draggable="true" data-value="extends">extends</li>
    <li class="drag-item" draggable="true" data-value="$laptopBaru->nama">$laptopBaru-&gt;nama</li>
  </ul>

  <div class="quiz-actions">
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
  const drop1 = document.getElementById('drop1').dataset.value || '';
  const drop2 = document.getElementById('drop2').dataset.value || '';
  const drop3 = document.getElementById('drop3').dataset.value || '';
  const feedback = document.getElementById('feedbackDrag');
  feedback.className = 'feedback';

  if (
    drop1 === 'extends' &&
    drop2 === '$laptopBaru->nama' &&
    drop3 === 'hidupkan'
  ) {
    feedback.classList.add('correct');
    feedback.innerHTML = '🎉 Jawaban kamu benar! Class telah mewarisi method dan property dengan tepat.';
    kirimProgressHalaman("b24-inheritance"); // SIMPAN PROGRESS
    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Masih salah, coba cek kembali keyword pewarisan, pemanggilan property, dan method-nya.';
  }

  feedback.classList.remove('d-none');
}

function resetDragJawaban() {
  ['drop1', 'drop2', 'drop3'].forEach(id => {
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
</div>

<div class="pagination">
  <a href="./b23-mendeklarasikanc" class="prev">&laquo; Sebelumnya</a>
  <a href="./b25-interface"
     id="btnSelanjutnya"
     class="next"
     style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
     {{ $selesai ? '' : 'disabled' }}>
    Selanjutnya &raquo;
  </a>
</div>


@endsection
