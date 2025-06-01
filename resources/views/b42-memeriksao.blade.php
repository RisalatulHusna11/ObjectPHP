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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b42-memeriksao')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>2. MEMERIKSA OBJECT</h5>
  </div>

  <div class="TIK">
    <p>PHP menyediakan beberapa fungsi untuk menganalisis object, seperti mengetahui class yang digunakan object, mengecek keberadaan method dalam object, serta mendapatkan daftar property dalam object.</p>

    <h6>Mengecek Apakah Variabel Merupakan Object</h6>
    <p>Sebelum bekerja dengan object, kita bisa mengecek apakah suatu variabel merupakan object menggunakan <code>is_object()</code>.</p>
    
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
    <a href="{{ route('ayoPahami.besar49') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
$variabel = new stdClass();

if (is_object($variabel)) {
    echo "Variabel ini adalah object.";
} else {
    echo "Variabel ini bukan object.";
}
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Fungsi <code>is_object()</code> digunakan untuk memeriksa apakah suatu variabel merupakan object. Dalam contoh ini, <code>new stdClass()</code> digunakan untuk membuat object kosong, dan hasil dari <code>is_object()</code> akan menampilkan bahwa variabel tersebut adalah object.
  </p>
</div>




    <h6>Mengetahui Class dari Suatu Object</h6>
    <p>Gunakan <code>get_class()</code> untuk mengetahui class dari object yang diberikan.</p>
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
    <a href="{{ route('ayoPahami.besar44') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Kendaraan {}

$mobil = new Kendaraan();
echo "Object ini berasal dari class: " . get_class($mobil);
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Fungsi <code>get_class()</code> digunakan untuk mengetahui nama class dari sebuah object. Dalam contoh ini, object <code>$mobil</code> dibuat dari class <code>Kendaraan</code>, sehingga <code>get_class($mobil)</code> akan menghasilkan string <code>"Kendaraan"</code>.
  </p>
</div>




    <h6>Mengecek Apakah Object Memiliki Method Tertentu</h6>
    <p>Sebelum memanggil method dalam object, kita bisa mengecek apakah method tersebut ada menggunakan <code>method_exists()</code>.</p>
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
    <a href="{{ route('ayoPahami.besar45') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Hewan {
    public function bersuara() {
        return "Suara hewan";
    }
}

$kucing = new Hewan();

if (method_exists($kucing, "bersuara")) {
    echo $kucing->bersuara();
} else {
    echo "Method tidak ditemukan.";
}
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Fungsi <code>method_exists()</code> digunakan untuk memeriksa apakah suatu object memiliki method tertentu. Jika method ditemukan, maka akan dijalankan; jika tidak, program akan menampilkan pesan bahwa method tidak tersedia. Ini berguna untuk validasi sebelum memanggil method secara dinamis.
  </p>
</div>
<p>Jika kita mencoba memanggil method yang tidak ada, PHP akan menghasilkan error.</p>
    



<h6>Mendapatkan Property yang Dimiliki oleh Object</h6>
    <p>PHP menyediakan fungsi <code>get_object_vars()</code> untuk mendapatkan daftar property yang telah diatur dalam suatu object.</p>
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
    <a href="{{ route('ayoPahami.besar46') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Manusia {
    public $nama;
    public $umur;
}

$orang = new Manusia();
$orang->nama = "Budi";
$orang->umur = 25;

$propertyObject = get_object_vars($orang);
print_r($propertyObject);
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Fungsi <code>get_object_vars()</code> digunakan untuk mengambil semua properti yang dapat diakses secara publik dari sebuah object. Hasilnya akan dikembalikan dalam bentuk array asosiatif yang berisi nama dan nilai dari masing-masing properti.
  </p>
</div>
   <p><strong>Catatan:</strong> <code>get_object_vars()</code> hanya mengembalikan property yang sudah diatur dalam object. Property yang belum diberi nilai akan tetap muncul dengan nilai <code>NULL</code>.</p>



    <h6>Mengetahui Class Induk dari Object</h6>
    <p>Jika suatu object merupakan turunan dari class lain, kita bisa mengetahui class induknya menggunakan <code>get_parent_class()</code>.</p>
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
    <a href="{{ route('ayoPahami.besar47') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Hewan {}
class Kucing extends Hewan {}

$kucing = new Kucing();

echo "Class induknya adalah: " . get_parent_class($kucing);
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Fungsi <code>get_parent_class()</code> digunakan untuk mengetahui class induk dari suatu object atau nama class. Jika object tersebut tidak memiliki class induk, maka fungsi ini akan mengembalikan nilai <code>false</code>.
  </p>
</div>
  


    <h6>Menampilkan Informasi Object</h6>
    <p>Berikut adalah contoh program yang menampilkan informasi tentang class dan property dari suatu object menggunakan berbagai fungsi introspeksi PHP:</p>
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
    <a href="{{ route('ayoPahami.besar48') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Produk {
    public $nama = "Laptop";
    private $harga = 10000000;

    public function tampilkanNama() {
        return "Nama Produk: " . $this->nama;
    }
}

$barang = new Produk();

echo "Apakah ini object? " . (is_object($barang) ? "Ya" : "Tidak") . "&lt;br&gt;";
echo "Class dari object ini: " . get_class($barang) . "&lt;br&gt;";

if (method_exists($barang, "tampilkanNama")) {
    echo "Method tampilkanNama tersedia.&lt;br&gt;";
} else {
    echo "Method tampilkanNama tidak ditemukan.&lt;br&gt;";
}

$propertyBarang = get_object_vars($barang);
echo "Property dalam object:&lt;br&gt;";
print_r($propertyBarang);
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Pada contoh ini, kita menggunakan beberapa fungsi bawaan PHP:
    <code>is_object()</code> untuk memeriksa apakah sebuah variabel adalah object,
    <code>get_class()</code> untuk mengetahui nama class dari object,
    <code>method_exists()</code> untuk mengecek apakah suatu method tersedia dalam object,
    dan <code>get_object_vars()</code> untuk menampilkan daftar properti public yang dimiliki object.
  </p>
</div>


  </div>

<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Ayo buktikan pemahamanmu!</p>
    <p>
      Lengkapilah kode program berikut agar dapat menampilkan informasi tentang class dari sebuah object, 
      mengecek apakah object memiliki method tertentu, serta menampilkan semua properti yang dimiliki object tersebut.
    </p>
  </div>

  <div class="row">
    <!-- Kode Program -->
    <div class="col-md-8">
      <div class="kode-box p-3">
<pre style="font-size: 13px; line-height: 1.4;"><code>&lt;?php
class Pengirim {
    public $nama = "JNE";
    private $layanan = "Reguler";

    public function kirimPaket() {
        return "Paket sedang dikirim...";
    }
}

$ekspedisi = new Pengirim();

// Tampilkan nama class dari object
echo "Object ini berasal dari class: " . <span class="drop-zone" id="drop1">___</span>($ekspedisi) . "&lt;br&gt;";

// Cek apakah object memiliki method kirimPaket
if (<span class="drop-zone" id="drop2">___</span>($ekspedisi, "kirimPaket")) {
    echo $ekspedisi->kirimPaket() . "&lt;br&gt;";
} else {
    echo "Method tidak tersedia.&lt;br&gt;";
}

// Tampilkan daftar property yang telah diatur
$infoProperti = <span class="drop-zone" id="drop3">___</span>($ekspedisi);
echo "Property object:&lt;br&gt;";
print_r($infoProperti);
?&gt;
</code></pre>
      </div>
    </div>

    <!-- Pilihan Drag -->
    <div class="col-md-4">
      <ul id="dragItems" class="list-group">
        <li class="drag-item" draggable="true" data-value="get_object_vars">get_object_vars</li>
        <li class="drag-item" draggable="true" data-value="get_class">get_class</li>
        <li class="drag-item" draggable="true" data-value="get_parent_class">get_parent_class</li>
        <li class="drag-item" draggable="true" data-value="method_exists">method_exists</li>
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
  const drop1 = document.getElementById('drop1').dataset.value || '';
  const drop2 = document.getElementById('drop2').dataset.value || '';
  const drop3 = document.getElementById('drop3').dataset.value || '';
  const feedback = document.getElementById('feedbackDrag');
  feedback.className = 'feedback';

  if (
    drop1 === 'get_class' &&
    drop2 === 'method_exists' &&
    drop3 === 'get_object_vars'
  ) {
    feedback.classList.add('correct');
    feedback.innerHTML = '🎉 Jawaban kamu benar! Semua fungsi inspeksi objek ditulis dengan tepat.';
    kirimProgressHalaman("b42-memeriksao");

    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Masih ada yang salah. Periksa kembali fungsi yang digunakan.';
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
<div class="pagination">
  <a href="./b41-memeriksac" class="prev">&laquo; Sebelumnya</a>
  <a href="./b43-contohpi"
     id="btnSelanjutnya"
     class="next"
     style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
     {{ $selesai ? '' : 'disabled' }}>
    Selanjutnya &raquo;
  </a>
</div>


@endsection
