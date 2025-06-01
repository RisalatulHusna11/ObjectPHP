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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b41-memeriksac')->value('selesai');
@endphp


@section('container')

<div class="materi-subbab1">
  <div class="TIKjudul">
            <h4>D.	 INTROSPECTION</h4>
        </div>

        <div class="TIK">
            <h5>Tujuan Pembelajaran</h5>
            <p>Setelah menyelesaikan materi ini, mahasiswa diharapkan mampu:</p>
            <ol>
                <li>Memahami konsep introspection dalam PHP.</li>
                <li>Menggunakan fungsi introspection untuk memeriksa class dan object dalam PHP.</li>
                <li>Menerapkan introspection dalam pengembangan program yang fleksibel dan dinamis.</li>

            </ol>
        </div>

<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>1. MEMERIKSA CLASS</h5>
  </div>

  <div class="TIK">
    <p>PHP menyediakan beberapa fungsi bawaan untuk menganalisis class, seperti mengecek keberadaan class, melihat method dan property dalam class, serta mengetahui class induk dari suatu class turunan.</p>

    <h6>Mengecek Keberadaan Class</h6>
    <p>Sebelum menggunakan class, kita bisa mengecek apakah class tersebut sudah dideklarasikan menggunakan class_exists(). Fungsi ini mengembalikan true jika class ditemukan, dan false jika tidak. Contoh penggunaan:</p>
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
    <a href="{{ route('ayoPahami.besar38') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
if (class_exists("Karyawan")) {
    echo "Class Karyawan tersedia.";
} else {
    echo "Class Karyawan belum dideklarasikan.";
}
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Fungsi <code>class_exists()</code> digunakan untuk memeriksa apakah sebuah class telah dideklarasikan atau belum. Ini berguna untuk menghindari error jika suatu class belum tersedia. Pada contoh di atas, jika class <code>Karyawan</code> sudah didefinisikan sebelumnya, maka akan ditampilkan pesan <em>"Class Karyawan tersedia."</em>; jika belum, maka muncul <em>"Class Karyawan belum dideklarasikan."</em>.
  </p>
</div>


    <p>Cara lain untuk mengecek apakah suatu class ada dalam daftar class yang sudah dideklarasikan adalah menggunakan <code>get_declared_classes()</code>, yang mengembalikan array berisi semua class yang sudah dibuat dalam skrip.</p>
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
    <a href="{{ route('ayoPahami.besar39') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
$semuaClass = get_declared_classes();
if (in_array("Karyawan", $semuaClass)) {
    echo "Class Karyawan ditemukan.";
} else {
    echo "Class Karyawan tidak ditemukan.";
}
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Fungsi <code>get_declared_classes()</code> digunakan untuk mengambil semua class yang sudah dideklarasikan dalam script. Dengan <code>in_array()</code>, kita bisa memeriksa apakah sebuah class tertentu (misalnya <code>Karyawan</code>) termasuk dalam daftar tersebut. Jika class tersebut sudah ada, maka ditampilkan pesan bahwa class ditemukan; jika belum, maka ditampilkan bahwa class tidak ditemukan.
  </p>
</div>


    <h6>Mendapatkan Method dan Property dalam Class</h6>
    <p>Untuk melihat method yang tersedia dalam suatu class, gunakan get_class_methods(), yang mengembalikan array berisi daftar method dalam class, termasuk method yang diwarisi dari superclass.</p>
    
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
    <a href="{{ route('ayoPahami.besar40') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pegawai {
    public function bekerja() {}
    private function istirahat() {}
}

$methods = get_class_methods("Pegawai");
print_r($methods); 
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Fungsi <code>get_class_methods()</code> digunakan untuk mengambil daftar method yang dapat diakses (hanya public) dari suatu class. Pada contoh di atas, class <code>Pegawai</code> memiliki dua method, yaitu <code>bekerja()</code> dan <code>istirahat()</code>. Namun karena <code>istirahat()</code> bersifat private, maka hanya <code>bekerja()</code> yang ditampilkan dalam hasil fungsi.
  </p>
</div>


<p>Sedangkan untuk mendapatkan daftar property dalam class, gunakan get_class_vars(), yang mengembalikan array asosiatif berisi daftar property dan nilai defaultnya.</p>    
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
    <a href="{{ route('ayoPahami.besar41') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public $warna = "Merah";
    private $kecepatan = 100;
}

$properties = get_class_vars("Mobil");
print_r($properties); 
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Fungsi <code>get_class_vars()</code> digunakan untuk mengambil semua property yang memiliki visibilitas <code>public</code> dari sebuah class beserta nilai default-nya. Pada contoh di atas, class <code>Mobil</code> memiliki dua properti: <code>warna</code> (public) dan <code>kecepatan</code> (private). Hanya <code>warna</code> yang dimasukkan ke dalam array hasil karena <code>kecepatan</code> tidak bisa diakses dari luar class. <strong>Catatan:</strong> <code>get_class_vars()</code> hanya mengembalikan property yang memiliki nilai default dan dapat diakses dalam scope saat ini. Property yang belum diinisialisasi atau bersifat private tidak akan muncul.
  </p>
</div>



    <h6>Mengetahui Class Induk (Parent Class)</h6>
    <p>Jika suatu class merupakan turunan dari class lain, kita bisa mengetahui class induknya menggunakan get_parent_class(). Contohnya:</p>
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
    <a href="{{ route('ayoPahami.besar42') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Kendaraan {}
class Motor extends Kendaraan {}

echo get_parent_class("Motor"); 
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Fungsi <code>get_parent_class()</code> digunakan untuk mengetahui nama class induk dari suatu class turunan. Dalam contoh di atas, class <code>Motor</code> merupakan turunan dari <code>Kendaraan</code>, sehingga fungsi akan mengembalikan string <code>"Kendaraan"</code>. Fungsi ini sangat berguna dalam refleksi class atau debugging hubungan pewarisan dalam OOP.
  </p>
</div>


    <h6>Menggunakan ReflectionClass untuk Menganalisis Class</h6>
    <p>PHP memiliki class <code>ReflectionClass</code> untuk melakukan analisis mendalam terhadap class, termasuk mengecek apakah class bersifat anonymous, menampilkan method static, dan melihat property dalam class.</p>
    <pre class="line-numbers"><code class="language-php">function tampilkanClass() {
    $classes = get_declared_classes();

    foreach ($classes as $class) {
        echo "Informasi tentang class: {$class}<br />";
        $refleksi = new ReflectionClass($class);

        // Mengecek apakah class ini adalah anonymous class
        $isAnonymous = $refleksi->isAnonymous() ? "Ya" : "Tidak";
        echo "Apakah Anonymous Class: {$isAnonymous}<br />";

        // Menampilkan method static dalam class
        echo "Method static:<br />";
        $methods = $refleksi->getMethods(ReflectionMethod::IS_STATIC);
        if (!count($methods)) {
            echo "<i>Tidak ada</i><br />";
        } else {
            foreach ($methods as $method) {
                echo "<b>{$method->name}</b>()<br />";
            }
        }

        // Menampilkan property dalam class
        echo "Property dalam class:<br />";
        $properties = $refleksi->getProperties();
        if (!count($properties)) {
            echo "<i>Tidak ada</i><br />";
        } else {
            foreach ($properties as $property) {
                echo "<b>\${$property->name}</b><br />";
            }
        }

        echo "<hr />";
    }
}

tampilkanClass();</code></pre>

    <p><code>ReflectionClass</code> digunakan untuk mendapatkan informasi tentang suatu class. <code>isAnonymous()</code> digunakan untuk mengecek apakah class adalah anonymous class. <code>getMethods(ReflectionMethod::IS_STATIC)</code> mengambil semua method static dalam class. <code>getProperties()</code> mendapatkan semua property dalam class.</p>

    <h6>Contoh Lain: Mengecek Class, Method, dan Property</h6>
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
    <a href="{{ route('ayoPahami.besar43') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Produk {
    public $nama = "Laptop";
    private $harga = 15000000;

    public function tampilkanProduk() {
        return "Nama Produk: " . $this->nama;
    }
}

// Mengecek apakah class Produk ada
if (class_exists("Produk")) {
    echo "Class Produk tersedia.&lt;br&gt;";
}

// Mendapatkan method dan property class Produk
$methods = get_class_methods("Produk");
$properties = get_class_vars("Produk");

echo "Method yang tersedia: ";
print_r($methods);
echo "&lt;br&gt;Property yang tersedia: ";
print_r($properties);
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Kode ini menggunakan fungsi <code>class_exists()</code>, <code>get_class_methods()</code>, dan <code>get_class_vars()</code> untuk memeriksa ketersediaan class <code>Produk</code>, serta mengambil daftar method dan property yang tersedia. Method privat seperti <code>$harga</code> tidak akan ditampilkan oleh <code>get_class_vars()</code> karena fungsinya hanya mengembalikan properti publik.
  </p>
</div>

  </div>
</div>

<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Ayo buktikan pemahamanmu!</p>
    <p>
      Lengkapilah kode program berikut agar dapat memeriksa apakah <strong>class Perangkat</strong> telah dibuat, dan tampilkan semua <strong>method</strong> dan <strong>property</strong> yang tersedia di dalamnya menggunakan <em>fungsi bawaan PHP</em>.
    </p>
  </div>

  <div class="kode-box p-3" style="font-size: 16px;">
<pre><code>&lt;?php
class Perangkat {
    public $tipe = "Router";
    private $versi = "v2.0";

    public function koneksi() {
        return "Menyambung ke jaringan...";
    }
}

// Cek apakah class Perangkat telah dibuat
if (<input type="text" class="input-fill auto" id="input1" placeholder="...">("Perangkat")) {
    echo "Class Perangkat ditemukan.&lt;br&gt;";
}

// Tampilkan method yang dimiliki class
$daftarMethod = <input type="text" class="input-fill auto" id="input2" placeholder="...">("Perangkat");
echo "Method dalam class: ";
print_r($daftarMethod);
echo "&lt;br&gt;";

// Tampilkan property dalam class
$daftarProperti = <input type="text" class="input-fill auto" id="input3" placeholder="...">("Perangkat");
echo "Property dalam class: ";
print_r($daftarProperti);
?&gt;
</code></pre>
  </div>

  <div class="quiz-actions">
    <button class="btn-next" onclick="cekIsian()">PERIKSA</button>
    <button class="btn-back" onclick="resetIsian()">RESET</button>
  </div>

  <div id="feedbackIsian" class="feedback d-none mt-2"></div>
</div>

<script>
function cekIsian() {
  const jawaban = {
    input1: 'class_exists',
    input2: 'get_class_methods',
    input3: 'get_object_vars'
  };

  let benar = true;

  for (const id in jawaban) {
    const input = document.getElementById(id);
    const nilai = input.value.trim();
    if (nilai === jawaban[id]) {
      input.style.borderColor = 'green';
    } else {
      input.style.borderColor = 'red';
      benar = false;
    }
  }

  const feedback = document.getElementById('feedbackIsian');
  feedback.className = 'feedback';
  if (benar) {
    feedback.classList.add('correct');
    feedback.innerHTML = '🎉 Jawaban kamu benar! Semua fungsi telah diisi dengan benar.';
    kirimProgressHalaman("b41-memeriksac");

    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Masih ada jawaban yang salah. Coba periksa kembali fungsi yang kamu gunakan.';
  }
  feedback.classList.remove('d-none');
}

function resetIsian() {
  ['input1', 'input2', 'input3'].forEach(id => {
    const input = document.getElementById(id);
    input.value = '';
    input.style.borderColor = '#999';
  });
  document.getElementById('feedbackIsian').className = 'feedback d-none';
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

<div class="pagination">
  <a href="./b42-memeriksao"
     id="btnSelanjutnya"
     class="next"
     style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
     {{ $selesai ? '' : 'disabled' }}>
    Selanjutnya &raquo;
  </a>
</div>


@endsection

