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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b27-abstractm')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>7. ABSTRACT METHODS</h5>
  </div>

  <div class="TIK">
    <p><strong>Abstract Methods</strong> dalam PHP adalah method yang dideklarasikan tanpa implementasi di dalam class induk. Method semacam ini harus diimplementasikan oleh class turunannya. Jika sebuah class memiliki satu atau lebih abstract method, maka class tersebut juga harus dideklarasikan sebagai <code>abstract class</code>. Abstract class tidak dapat langsung diinstansiasi sebagai objek, melainkan hanya dapat diwarisi oleh class lain yang kemudian mengimplementasikan abstract method yang telah didefinisikan.</p>

    <h6>Sintaks Abstract Class dan Abstract Method dalam PHP</h6>
    <p>Deklarasi abstract class dan abstract method dalam PHP menggunakan kata kunci <code>abstract</code>, baik untuk class maupun method-nya:</p>
    <pre class="line-numbers"><code class="language-php">abstract class Komponen {
    abstract function tampilkanOutput();
}</code></pre>
<p>Class yang mewarisi Komponen harus mengimplementasikan method tampilkanOutput():</p>

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
    <a href="{{ route('ayoPahami.besar29') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Komponen {
    public function tampilkanOutput() {
        echo "Menampilkan sesuatu...";
    }
}

class GambarKomponen extends Komponen {
    function tampilkanOutput() {
        echo "Menampilkan gambar yang indah.";
    }
}

// Penggunaan
$obj = new GambarKomponen();
$obj->tampilkanOutput(); 
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Kode di atas mendefinisikan sebuah class bernama <code>GambarKomponen</code> yang merupakan turunan dari class induk <code>Komponen</code> melalui pewarisan (inheritance). Di dalamnya terdapat method <code>tampilkanOutput()</code> yang didefinisikan untuk menampilkan teks <em>"Menampilkan gambar yang indah."</em>. Ini menunjukkan bahwa class turunan dapat memiliki implementasi method sendiri, baik untuk menggantikan atau melengkapi fungsionalitas yang diwarisi dari class induknya.
  </p>
</div>


    <h6>Contoh Implementasi Abstract Class dan Abstract Method</h6>
    <p>Berikut adalah contoh implementasi abstract class dalam skenario kendaraan:</p>
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
    <a href="{{ route('ayoPahami.besar30') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
abstract class Kendaraan {
    protected $merk;
    protected $kecepatanMaksimal;

    public function __construct($merk, $kecepatanMaksimal) {
        $this->merk = $merk;
        $this->kecepatanMaksimal = $kecepatanMaksimal;
    }

    abstract public function deskripsi();
}

class Mobil extends Kendaraan {
    private $jumlahPintu;

    public function __construct($merk, $kecepatanMaksimal, $jumlahPintu) {
        parent::__construct($merk, $kecepatanMaksimal);
        $this->jumlahPintu = $jumlahPintu;
    }

    public function deskripsi() {
        return "Mobil merk {$this->merk} memiliki kecepatan maksimal {$this->kecepatanMaksimal} km/jam dan {$this->jumlahPintu} pintu.";
    }
}

class Motor extends Kendaraan {
    private $jenis;

    public function __construct($merk, $kecepatanMaksimal, $jenis) {
        parent::__construct($merk, $kecepatanMaksimal);
        $this->jenis = $jenis;
    }

    public function deskripsi() {
        return "Motor merk {$this->merk} berjenis {$this->jenis} dengan kecepatan maksimal {$this->kecepatanMaksimal} km/jam.";
    }
}

// Penggunaan
$mobil = new Mobil("Toyota", 200, 4);
$motor = new Motor("Honda", 150, "Sport");

echo $mobil->deskripsi() . PHP_EOL;
echo $motor->deskripsi() . PHP_EOL;
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Kode di atas mendemonstrasikan penggunaan class abstrak <code>Kendaraan</code> yang mendefinisikan struktur dasar dengan properti umum seperti <code>$merk</code> dan <code>$kecepatanMaksimal</code>, serta method abstrak <code>deskripsi()</code> yang wajib diimplementasikan oleh class turunannya. Class <code>Mobil</code> dan <code>Motor</code> merupakan turunan dari <code>Kendaraan</code> yang masing-masing menambahkan properti khusus, yaitu <code>$jumlahPintu</code> pada <code>Mobil</code> dan <code>$jenis</code> pada <code>Motor</code>, serta mengimplementasikan method <code>deskripsi()</code> sesuai karakteristiknya. Penggunaan <code>parent::__construct()</code> dalam konstruktor masing-masing turunan menunjukkan pemanfaatan pewarisan konstruktor dari class induk. Ketika objek <code>Mobil</code> dan <code>Motor</code> dibuat dan method <code>deskripsi()</code> dipanggil, masing-masing akan mengembalikan informasi spesifik sesuai atribut yang dimilikinya.
  </p>
</div>



    <h6>Abstract Method dalam Traits</h6>
    <p>Selain di dalam class, abstract method juga dapat didefinisikan dalam <code>trait</code>. Class yang menggunakan trait yang mengandung abstract method wajib mengimplementasikan method tersebut. Berikut contoh penggunaannya:</p>
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
    <a href="{{ route('ayoPahami.besar31') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
trait BisaDikendarai {
    abstract function getIdentitas();

    public function bandingkanKecepatan($object) {
        return ($object->getIdentitas() < $this->getIdentitas()) ? -1 : 1;
    }
}

class Sepeda {
    use BisaDikendarai;
    private $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function getIdentitas() {
        return "Sepeda-{$this->id}";
    }
}

// Kesalahan: Class tidak mengimplementasikan method abstract
class Bus {
    use BisaDikendarai;
}

$sepeda = new Sepeda(101);
$bus = new Bus(); // Akan menyebabkan error karena `Bus` tidak mengimplementasikan `getIdentitas()`

$hasilPerbandingan = $sepeda->bandingkanKecepatan($bus);
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Trait <code>BisaDikendarai</code> mendeklarasikan <code>abstract method</code> <code>getIdentitas()</code>. Class <code>Sepeda</code> menggunakan trait ini dan mengimplementasikan method <code>getIdentitas()</code> sesuai kontrak. Namun, class <code>Bus</code> juga menggunakan trait tetapi tidak mengimplementasikan <code>getIdentitas()</code>, sehingga akan menyebabkan error. Hal ini menegaskan bahwa setiap class yang menggunakan trait dengan method abstract wajib mendefinisikan method tersebut secara eksplisit.
  </p>
</div>

    <p> Ketika Anda mengimplementasikan metode abstrak dalam kelas turunan, tanda tangan metode harus sesuai—artinya, metode tersebut harus menerima jumlah parameter yang sama. Jika ada petunjuk tipe pada parameter, maka petunjuk tersebut juga harus cocok. Selain itu, metode yang diimplementasikan harus memiliki tingkat visibilitas yang sama atau lebih longgar.
    </p>
  </div>

<!-- LATIHAN: MENYUSUN KODE ABSTRAK METHOD -->
<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Susunlah potongan kode berikut menjadi program PHP yang benar.</p>
    <p>Program ini menggunakan <code>trait</code> bernama <strong>IdentitasKendaraan</strong> yang memiliki <strong>abstract method</strong> <code>getIdentitas()</code>. Method ini diimplementasikan dalam class <code>Sepeda</code>.</p>
    <p><strong>Petunjuk:</strong> Tulis jawabanmu berupa urutan angka, dipisah dengan spasi. Contoh penulisan jawaban: <code>1 2 3 4 5 6</code></p>
    <p><em><strong>Catatan:</strong> Terdapat tiga baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (fungsi, trait, atau class).</em></p>
  </div>

<ul class="list-group mb-3">
  <li class="list-group-item">1. use IdentitasKendaraan;</li>
  <li class="list-group-item">2. return "Sepeda-101";</li>
  <li class="list-group-item">3. class Sepeda {</li>
  <li class="list-group-item">4.     public function getIdentitas() {</li>
  <li class="list-group-item">5. echo $sepeda->getIdentitas();</li>
  <li class="list-group-item">6. trait IdentitasKendaraan {</li>
  <li class="list-group-item">7.     abstract public function getIdentitas();</li>
  <li class="list-group-item">8. $sepeda = new Sepeda();</li>
  <li class="list-group-item">9. } <span style="color: gray;">// penutup getIdentitas()</span></li>
  <li class="list-group-item">10. } <span style="color: gray;">// penutup trait IdentitasKendaraan</span></li>
  <li class="list-group-item">11. } <span style="color: gray;">// penutup class Sepeda</span></li>
</ul>


  <div class="mb-3">
    <label for="input-jawaban-trait" class="form-label">Masukkan jawaban kamu:</label>
    <input type="text" id="input-jawaban-trait" class="form-control" placeholder="Contoh:  4 6 7 10 11 1 2 3 8 5 9">
  </div>

  <div class="quiz-actions">
  <button id="cekJawabanTrait" class="btn-next">Cek Jawaban</button>
  <button id="resetJawabanTrait" class="btn-back">Reset</button>
</div>


  <div id="feedbackTrait" class="feedback d-none mt-2"></div>
</div>

<script>
const jawabanBenarTrait = "6 7 10 3 1 4 2 9 11 8 5";

document.getElementById('cekJawabanTrait').addEventListener('click', () => {
  const input = document.getElementById('input-jawaban-trait').value.trim().replace(/\s+/g, ' ');
  const feedback = document.getElementById('feedbackTrait');
  feedback.className = 'feedback';

  if (input === jawabanBenarTrait) {
    feedback.classList.add('correct');
    feedback.textContent = '🎉 Jawaban kamu benar! Kode sudah tersusun dengan tepat.';
    kirimProgressHalaman("b27-abstractm");

  const tombol = document.getElementById("btnSelanjutnya");
  if (tombol) {
    tombol.style.pointerEvents = "auto";
    tombol.style.opacity = 1;
    tombol.removeAttribute("disabled");
  }
} else {
    feedback.classList.add('incorrect');
    feedback.textContent = '❌ Masih salah, coba periksa kembali urutannya.';
  }

  feedback.classList.remove('d-none');
});

document.getElementById('resetJawabanTrait').addEventListener('click', () => {
  document.getElementById('input-jawaban-trait').value = '';
  const feedback = document.getElementById('feedbackTrait');
  feedback.className = 'feedback d-none';
});

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
  <a href="./b26-traits" class="prev">&laquo; Sebelumnya</a>
  <a href="./b28-constructors"
     id="btnSelanjutnya"
     class="next"
     style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
     {{ $selesai ? '' : 'disabled' }}>
    Selanjutnya &raquo;
  </a>
</div>


@endsection
