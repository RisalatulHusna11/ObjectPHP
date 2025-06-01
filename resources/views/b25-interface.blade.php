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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b25-interface')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>5. INTERFACES</h5>
  </div>

  <div class="TIK">
    <p><strong>Interfaces</strong> memungkinkan kita mendefinisikan kontrak yang harus diikuti oleh sebuah class. Interface hanya berisi deklarasi method dan konstanta, tanpa implementasi. Setiap class yang mengimplementasikan sebuah interface wajib menyediakan implementasi untuk semua method yang telah didefinisikan dalam interface tersebut.</p>

    <h6>Sintaks Interface dalam PHP</h6>
    <pre class="line-numbers"><code class="language-php">interface NamaInterface {
    public function namaMethod();
}</code></pre>

    <p>Untuk mengimplementasikan interface dalam class, gunakan kata kunci <code>implements</code>. Jika ada lebih dari satu interface, pisahkan dengan koma. Contoh implementasi interface:</p>

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
    <a href="{{ route('ayoPahami.besar22') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
interface Printable {
    public function printOutput();
}

class ImageComponent implements Printable {
    public function printOutput() {
        echo "Mencetak gambar...";
    }
}

// Penggunaan
$obj = new ImageComponent();
$obj->printOutput();
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Kode di atas menunjukkan cara mengimplementasikan interface <code>Printable</code> dalam class <code>ImageComponent</code> menggunakan kata kunci <code>implements</code>. Interface mendefinisikan method <code>printOutput()</code> yang wajib diimplementasikan oleh class mana pun yang menggunakannya. Dalam class <code>ImageComponent</code>, method tersebut diisi dengan perintah <code>echo "Mencetak gambar..."</code>. Ketika objek dari class ini dibuat dan method <code>printOutput()</code> dipanggil, maka akan ditampilkan teks <em>"Mencetak gambar..."</em>. Ini mencerminkan prinsip dasar OOP, yaitu kontrak melalui interface untuk menjamin konsistensi implementasi.
  </p>
</div>


    <h6>Pewarisan Interface</h6>
    <p>Sebuah interface dapat mewarisi satu atau lebih interface lainnya selama tidak ada method dengan nama yang sama.</p>
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
    <a href="{{ route('ayoPahami.besar23') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
interface A {
    public function methodA();
}

interface B {
    public function methodB();
}

interface C extends A, B {
    public function methodC();
}

class MyClass implements C {
    public function methodA() {
        echo "Method A dipanggil";
    }
    
    public function methodB() {
        echo "Method B dipanggil";
    }
    
    public function methodC() {
        echo "Method C dipanggil";
    }
}

// Penggunaan
$obj = new MyClass();
$obj->methodA(); 
$obj->methodB(); 
$obj->methodC(); 
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Kode ini menunjukkan bagaimana <strong>interface dapat saling diturunkan</strong> (inheritance antarmuka) dan kemudian diimplementasikan oleh sebuah class. Interface <code>C</code> mewarisi <code>A</code> dan <code>B</code>, sehingga interface <code>C</code> mewajibkan semua class yang mengimplementasikannya untuk menyediakan implementasi method <code>methodA()</code>, <code>methodB()</code>, dan <code>methodC()</code>. Class <code>MyClass</code> mengimplementasikan interface <code>C</code>, sehingga harus mendefinisikan ketiga method tersebut. Saat objek <code>$obj</code> dibuat dari <code>MyClass</code> dan masing-masing method dipanggil, akan ditampilkan output yang sesuai. Ini menegaskan bahwa PHP mendukung pewarisan interface ganda dan implementasi kontrak secara menyeluruh.
  </p>
</div>

    <p>Kita bisa membuat interface untuk kendaraan yang memiliki method start() dan stop().</p>
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
    <a href="{{ route('ayoPahami.besar24') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
interface Kendaraan {
    public function hidupkanMesin();
}

interface KendaraanDarat extends Kendaraan {
    public function jumlahRoda();
}

class Mobil implements KendaraanDarat {
    public function hidupkanMesin() {
        echo "Mesin mobil dihidupkan.";
    }
    
    public function jumlahRoda() {
        return 4;
    }
}

// Penggunaan
$myCar = new Mobil();
$myCar->hidupkanMesin(); 
echo $myCar->jumlahRoda(); 
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Kode di atas menunjukkan bagaimana kita bisa menggunakan <code>interface</code> untuk memastikan bahwa semua kendaraan memiliki method <code>hidupkanMesin()</code> dan <code>jumlahRoda()</code>, sehingga memudahkan pengembangan dan pemeliharaan kode dalam skala besar. Interface <code>KendaraanDarat</code> mewarisi <code>Kendaraan</code>, dan class <code>Mobil</code> mengimplementasikan semua kontrak method yang diperlukan.
  </p>
</div>
  </div>

  <div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Untuk menguji pemahaman kamu tentang konsep <strong>interface</strong> dan <strong>implementasinya</strong> dalam PHP,</p>
    <p>
      Isilah bagian yang kosong pada kode berikut ini agar program dapat mencetak jenis output dari file!
    </p>
  </div>

  <div class="kode-box">
<pre><code>&lt;?php
interface Output {
    public function generate();
}

class FileOutput <span class="drop-zone" id="drop1">___</span> Output {
    public function <span class="drop-zone" id="drop2">___</span>() {
        echo "Output berupa file disimpan.";
    }
}

$printer = new FileOutput();
$printer-><span class="drop-zone" id="drop3">___</span>();
?&gt;
</code></pre>
  </div>

  <p class="mt-3"><strong>Seret potongan kode berikut ke tempat yang kosong:</strong></p>
  <ul id="dragItems" class="list-group mb-3">
    <li class="drag-item" draggable="true" data-value="output">output</li>
    <li class="drag-item" draggable="true" data-value="implements">implements</li>
    <li class="drag-item" draggable="true" data-value="generate">generate</li>
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
    drop1 === 'implements' &&
    drop2 === 'generate' &&
    drop3 === 'generate'
  ) {
    feedback.classList.add('correct');
    feedback.innerHTML = '🎉 Jawaban kamu benar! Interface telah diimplementasikan dengan tepat.';
    kirimProgressHalaman('b25-interface'); // SIMPAN PROGRESS
    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Masih salah, coba cek kembali keyword pewarisan dan pemanggilan method.';
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
  <a href="./b24-inheritance" class="prev">&laquo; Sebelumnya</a>
  <a href="./b26-traits"
     id="btnSelanjutnya"
     class="next"
     style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
     {{ $selesai ? '' : 'disabled' }}>
    Selanjutnya &raquo;
  </a>
</div>


@endsection
