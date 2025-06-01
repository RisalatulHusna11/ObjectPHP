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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b43-contohpi')->value('selesai');
@endphp


@section('container')

<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>3. CONTOH PROGRAM INTROSPECTION</h5>
  </div>

  <div class="TIK">
    <p>PHP menyediakan berbagai fungsi untuk melakukan introspeksi object, yaitu mengetahui informasi tentang class, method, property, serta hubungan antara class dan subclass. Dengan introspeksi ini, kita bisa melihat struktur pewarisan, daftar method yang bisa dipanggil, serta property yang dimiliki suatu object.</p>

    <h6>Mendapatkan Daftar Method yang Dapat Dipanggil</h6>
    <p>Untuk mengetahui method yang dapat dipanggil dalam suatu object (termasuk method yang diwarisi dari parent class), kita bisa menggunakan <code>ReflectionClass</code>.</p>
    <pre class="line-numbers"><code class="language-php">function getCallableMethods($object): array {
    $refleksi = new ReflectionClass($object);
    return $refleksi->getMethods();
}</code></pre>
<p>ReflectionClass($object) membuat representasi class dari object yang diberikan. getMethods() mengembalikan daftar method yang tersedia dalam bentuk array.</p>
    
<h6>Mengetahui Pohon Pewarisan (Inheritance Tree)</h6>
<p>Untuk mengetahui parent class dari suatu object, kita bisa menggunakan getParentClass() secara rekursif.</p>    
<pre class="line-numbers"><code class="language-php">function getLineage($object): array {
    $refleksi = new ReflectionClass($object);
    if ($refleksi->getParentClass()) {
        $parent = $refleksi->getParentClass();
        $lineage = getLineage($parent);
        $lineage[] = $refleksi->getName();
    } else {
        $lineage = [$refleksi->getName()];
    }
    return $lineage;
}</code></pre>
<p>Jika class memiliki parent, kita akan terus mencari hingga ke tingkat tertinggi. Menggunakan array rekursif untuk menyusun urutan pewarisan.</p>
    
<h6>Mengetahui Subclass dari Suatu Class</h6>
<p>Jika kita ingin mengetahui class mana saja yang mewarisi class tertentu, kita bisa menggunakan get_declared_classes() untuk mendapatkan semua class yang ada, lalu mengecek apakah masing-masing merupakan subclass dari class yang kita analisis.</p>    
<pre class="line-numbers"><code class="language-php">function getChildClasses($object): array {
    $refleksi = new ReflectionClass($object);
    $classes = get_declared_classes();
    $children = [];

    foreach ($classes as $class) {
        $checkedReflection = new ReflectionClass($class);
        if ($checkedReflection->isSubclassOf($refleksi->getName())) {
            $children[] = $checkedReflection->getName();
        }
    }
    return $children;
}</code></pre>

    <h6>Mendapatkan Property yang Dimiliki Object</h6>
    <pre class="line-numbers"><code class="language-php">function getProperties($object): array {
    $refleksi = new ReflectionClass($object);
    return $refleksi->getProperties();
}</code></pre>
<p>get_declared_classes() mengambil semua class yang ada dalam skrip. isSubclassOf() digunakan untuk mengecek apakah suatu class merupakan subclass dari class yang dianalisis.</p>

    <h6>Menampilkan Informasi Lengkap Tentang Object</h6>
    <p>Untuk mengetahui property dalam suatu object, kita bisa menggunakan getProperties() dari ReflectionClass.</p>
    <pre class="line-numbers"><code class="language-php">function printObjectInfo($object) {
    $refleksi = new ReflectionClass($object);
    echo "<h2>Class</h2>";
    echo "<p>{$refleksi->getName()}</p>";

    echo "<h2>Inheritance</h2>";
    echo "<h3>Parent Classes</h3>";
    $lineage = getLineage($object);
    array_pop($lineage);
    echo count($lineage) > 0 ? "<p>" . implode(" -> ", $lineage) . "</p>" : "<i>None</i>";

    echo "<h3>Child Classes</h3>";
    $children = getChildClasses($object);
    echo "<p>" . (count($children) > 0 ? implode(", ", $children) : "<i>None</i>") . "</p>";

    echo "<h2>Methods</h2>";
    $methods = getCallableMethods($object);
    echo count($methods) > 0 ? implode("<br>", array_map(fn($m) => "<b>{$m->getName()}</b>()", $methods)) : "<i>None</i>";

    echo "<h2>Properties</h2>";
    $properties = getProperties($object);
    if (count($properties) > 0) {
        foreach ($properties as $property) {
            $name = $property->getName();
            $value = property_exists($object, $name) ? $object->$name : "Tidak diatur";
            echo "<b>\${$name}</b> = {$value}<br />";
        }
    } else {
        echo "<i>None</i>";
    }
    echo "<hr />";
}</code></pre>


    <h6>Contoh Class dan Object</h6>
    <p>Sekarang, mari kita buat contoh class yang akan dianalisis menggunakan fungsi di atas.</p>
    <pre class="line-numbers"><code class="language-php">class Kendaraan {
    public $merk = "Toyota";
    public $tahun = 2020;

    public function info() {
        return "Kendaraan ini adalah {$this->merk} keluaran tahun {$this->tahun}.";
    }
}

class Mobil extends Kendaraan {
    public $jumlahPintu = 4;

    public function suaraKlakson() {
        return "Beep beep!";
    }
}

class Truk extends Kendaraan {
    public $kapasitasMuat = 10000;

    public function infoTruk() {
        return "Truk ini memiliki kapasitas muat {$this->kapasitasMuat} kg.";
    }
}

$kendaraan = new Kendaraan();
$mobil = new Mobil();
$truk = new Truk();

printObjectInfo($kendaraan);
printObjectInfo($mobil);
printObjectInfo($truk);</code></pre>

    <p><strong>Output yang dihasilkan:</strong></p>
    <pre><strong>
Class
Kendaraan
Inheritance
Parent Classes
None
Child Classes
Mobil, Truk
Methods
info()
Properties
$merk = Toyota
$tahun = 2020
-------------------
Class
Mobil
Inheritance
Parent Classes
Kendaraan
Child Classes
None
Methods
info()
suaraKlakson()
Properties
$merk = Toyota
$tahun = 2020
$jumlahPintu = 4
-------------------
Class
Truk
Inheritance
Parent Classes
Kendaraan
Child Classes
None
Methods
info()
infoTruk()
Properties
$merk = Toyota
$tahun = 2020
$kapasitasMuat = 10000
</strong></pre>
  </div>

  <div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Ayo buktikan pemahamanmu!</p>
    <p>
      Lengkapilah kode program berikut agar dapat mencetak daftar method yang dapat dipanggil dari class <code>Printer</code>, termasuk yang diwarisi dari class induknya.<br>
      Gunakan <code>ReflectionClass</code> untuk mendapatkan informasi tersebut dan pastikan konstruktor class induk dipanggil secara tepat.
    </p>
  </div>

  <div class="kode-box p-3" style="font-size: 16px;">
<pre><code>&lt;?php
class Perangkat {
    public $nama;
    public function __construct($nama) {
        $this->nama = $nama;
    }
    public function hidupkan() {
        return "{$this->nama} dihidupkan.";
    }
}
class Printer extends Perangkat {
    public $warna;
    public function __construct($nama, $warna) {
        <input type="text" class="input-fill auto" id="input1" placeholder="...">::__construct($nama);
        $this->warna = $warna;
    }
    public function cetak() {
        return "Mencetak dokumen berwarna {$this->warna}.";
    }
}

$printer = new Printer("Canon Pixma", "merah");
$refleksi = new <input type="text" class="input-fill auto" id="input2" placeholder="...">($printer);
$methodList = $refleksi-><input type="text" class="input-fill auto" id="input3" placeholder="...">();
foreach ($methodList as $method) {
    echo $method->getName() . "&lt;br&gt;";
}
?&gt;
</code></pre>
  </div>

  <div class="quiz-actions mt-3">
    <button class="btn-next" onclick="cekIsian()">PERIKSA</button>
    <button class="btn-back" onclick="resetIsian()">RESET</button>
  </div>

  <div id="feedbackIsian" class="feedback d-none mt-2"></div>
</div>

<!-- <style>
.input-fill {
  font-family: "Courier New", Courier, monospace !important;
  font-size: 11px;
  padding: 1px 4px;
  border: 1px solid #999;
  border-radius: 4px;
  text-align: center;
  min-width: 40px;
  width: fit-content;
  display: inline-block;
  margin: 0 2px;
}
.input-fill:focus {
  outline: none;
  border-color: #6f42c1;
  box-shadow: 0 0 4px rgba(111, 66, 193, 0.4);
}
.input-fill.auto {
  width: fit-content;
  min-width: 40px;
  max-width: 100%;
}
</style> -->

<script>
function cekIsian() {
  const jawaban = {
    input1: 'parent',
    input2: 'ReflectionClass',
    input3: 'getMethods'
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
    feedback.innerHTML = '🎉 Jawaban kamu benar! Daftar method berhasil diperoleh dari class menggunakan Reflection.';
    kirimProgressHalaman("b43-contohpi");
    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Masih ada yang salah. Periksa kembali jawabanmu. Huruf besar-kecil harus persis ya!';
  }
  feedback.classList.remove('d-none');
}

function resetIsian() {
  ['input1', 'input2', 'input3'].forEach(id => {
    const input = document.getElementById(id);
    input.value = '';
    input.style.borderColor = '#aaa';
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


</div>

<!-- PAGINATION -->
 @php
  $nextPage = './b44-pkuis';

  if (!auth()->check()) {
    $nextPage = './b51-konsepd';
  } else {
    $role = auth()->user()->role ?? null;
    if ($role === 'mahasiswa' || $role === 'dosen') {
      $nextPage = './b44-pkuis';
    }
  }
@endphp

<div class="pagination">
  <a href="./b42-memeriksao" class="prev">&laquo; Sebelumnya</a>
  <a href="{{ $nextPage }}"
   id="btnSelanjutnya"
   class="next"
   style="pointer-events: none; opacity: 0.5;">
  Selanjutnya &raquo;
</a>
</div>

@endsection
