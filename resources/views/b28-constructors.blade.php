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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b28-constructors')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>8. CONSTRUCTORS</h5>
  </div>

  <div class="TIK">
    <p><strong>Constructor</strong> adalah method khusus dalam class yang otomatis dipanggil saat sebuah object dibuat. Method ini digunakan untuk menginisialisasi property dalam class. Dalam PHP, constructor dideklarasikan dengan nama <code>__construct()</code>, yang diawali dengan dua garis bawah (__). Constructor memungkinkan kita memberikan nilai awal pada property saat object diinstansiasi.</p>

    <h6>Sintaks Constructor dalam PHP</h6>
    <p>Berikut adalah contoh dasar pembuatan constructor dalam PHP:</p>
    <pre class="line-numbers"><code class="language-php">class Pengguna {
    function __construct($parameter1, $parameter2) {
        // Pernyataan constructor ditulis di sini
    }
}</code></pre>

    <h6>Pemanggilan Constructor dalam Pewarisan Class</h6>
    <p>Dalam PHP, jika sebuah class merupakan turunan dari class lain, maka constructor class induk tidak dipanggil secara otomatis. Untuk memanggil constructor dari class induk, kita harus menggunakan <code>parent::__construct()</code>.</p>
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
    <a href="{{ route('ayoPahami.besar32') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Kendaraan {
    public $merk;
    public $tahunProduksi;

    function __construct($merk, $tahunProduksi) {
        $this->merk = $merk;
        $this->tahunProduksi = $tahunProduksi;
    }

    function infoKendaraan() {
        return "Merk: {$this->merk}, Tahun: {$this->tahunProduksi}";
    }
}

class Mobil extends Kendaraan {
    public $jumlahPintu;

    function __construct($merk, $tahunProduksi, $jumlahPintu) {
        parent::__construct($merk, $tahunProduksi); // Memanggil constructor class induk
        $this->jumlahPintu = $jumlahPintu;
    }

    function infoMobil() {
        return parent::infoKendaraan() . ", Pintu: {$this->jumlahPintu}";
    }
}

// Membuat object dari class Mobil
$mobil1 = new Mobil("Toyota", 2022, 4);
echo $mobil1->infoMobil();
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Class <code>Kendaraan</code> memiliki constructor yang menerima <code>$merk</code> dan <code>$tahunProduksi</code>. 
    Class <code>Mobil</code> merupakan turunan dari <code>Kendaraan</code> dan memiliki constructor sendiri yang 
    menerima tambahan parameter <code>$jumlahPintu</code>. Constructor di <code>Mobil</code> menggunakan 
    <code>parent::__construct($merk, $tahunProduksi)</code> untuk memanggil constructor dari <code>Kendaraan</code>. 
    Method <code>infoMobil()</code> menampilkan informasi kendaraan dengan tambahan jumlah pintu.
  </p>
</div>


    <h6>Constructor dalam Class dengan Parameter Opsional</h6>
    <p>Constructor juga dapat memiliki parameter dengan nilai default. Jika parameter tidak diberikan saat object dibuat, maka nilai default akan digunakan.</p>
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
    <a href="{{ route('ayoPahami.besar33') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Produk {
    public $nama;
    public $harga;

    function __construct($nama = "Produk Tidak Diketahui", $harga = 0) {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    function infoProduk() {
        return "Nama: {$this->nama}, Harga: Rp. {$this->harga}";
    }
}

// Object dengan parameter
$produk1 = new Produk("Laptop", 8000000);
echo $produk1->infoProduk();

// Object tanpa parameter (menggunakan nilai default)
$produk2 = new Produk();
echo $produk2->infoProduk();
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Jika objek <code>Produk</code> dibuat tanpa parameter, maka constructor akan memberikan nilai default yaitu <code>"Produk Tidak Diketahui"</code> untuk <code>$nama</code> dan <code>0</code> untuk <code>$harga</code>. Namun jika parameter diberikan saat pembuatan objek, maka nilai tersebut akan menggantikan nilai default yang sudah ditetapkan.
  </p>
</div>

</div>

<!-- LATIHAN -->
<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Ayo buktikan pemahamanmu!</p>
    <p>
      Lengkapilah kode program berikut agar dapat mencetak informasi lengkap dari sebuah produk elektronik.<br>
      Pastikan <strong>constructor dari class induk</strong> dipanggil dengan benar di dalam class turunan.
    </p>
  </div>

  <div class="kode-box p-3" style="font-size: 16px;">
<pre><code>&lt;?php
class Produk {
    public $nama;
    public $merek;

    public function __construct($nama, $merek) {
        $this->nama = $nama;
        $this->merek = $merek;
    }

    public function infoProduk() {
        return "Nama: {$this->nama}, Merek: {$this->merek}";
    }
}

class Laptop extends Produk {
    public $ram;

    public function __construct($nama, $merek, <input type="text" class="input-fill auto" id="input1" placeholder="...">) {
        <input type="text" class="input-fill auto" id="input2" placeholder="...">::__construct($nama, $merek);
        $this->ram = $ram;
    }

    public function infoLengkap() {
        return $this->infoProduk() . ", RAM: {$this->ram} GB";
    }
}

$laptopBaru = new Laptop("VivoBook", "ASUS", 16);
echo $laptopBaru-><input type="text" class="input-fill auto" id="input3" placeholder="...">();
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
  // Kunci jawaban untuk masing-masing input
  const jawaban = {
    input1: 'ram',
    input2: 'parent',
    input3: 'infoLengkap'
  };

  let benar = true;

  // Periksa setiap input apakah sesuai dengan kunci
  for (const id in jawaban) {
    const input = document.getElementById(id);
    const nilai = input.value.trim();
    if (nilai === jawaban[id]) {
      // Tandai input benar dengan warna hijau
      input.style.borderColor = 'green';
    } else {
      // Tandai input salah dengan warna merah
      input.style.borderColor = 'red';
      benar = false;
    }
  }

  const feedback = document.getElementById('feedbackIsian');
  feedback.className = 'feedback';

  if (benar) {
    // Jika semua jawaban benar, tampilkan feedback positif
    feedback.classList.add('correct');
    feedback.innerHTML = '🎉 Jawaban kamu benar! Constructor dan method sudah digunakan dengan tepat.';

    kirimProgressHalaman("b28-constructors");

    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    // Jika ada jawaban salah, tampilkan feedback korektif
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Masih ada jawaban yang salah. Silakan periksa kembali inputmu.';
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

<div class="pagination">
  <a href="./b27-abstractm" class="prev">&laquo; Sebelumnya</a>
  <a href="./b29-destructor"
     id="btnSelanjutnya"
     class="next"
     style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
     {{ $selesai ? '' : 'disabled' }}>
    Selanjutnya &raquo;
  </a>
</div>


@endsection
