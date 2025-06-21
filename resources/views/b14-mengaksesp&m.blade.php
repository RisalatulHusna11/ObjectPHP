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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b14-mengaksesp&m')->value('selesai');
@endphp

@section('container')
<div class="materi-subbab1">
  <div class="judul-subbab">
    <h5>4. MENGAKSES PROPERTIES DAN METHODS</h5>
  </div>

  <div class="TIK">
    <p>Setelah sebuah object dibuat, kita dapat mengakses <strong>property</strong> dan <strong>method</strong> menggunakan tanda <code>-></code>. Sintaks dasarnya adalah sebagai berikut:</p>

    <pre class="line-numbers"><code class="language-php">$object->propertyname;
$object->methodname([arg, ...]);</code></pre>

    <p>Sebagai contoh, jika kita memiliki object dari class <code>Hewan</code>, kita bisa mengakses property dan method seperti ini:</p>

    <pre class="line-numbers"><code class="language-php">echo "Hewan ini berumur {$anjing->umur} tahun."; // Mengakses property
$anjing->menggonggong(); // Memanggil method
$anjing->setUmur(5); // Memanggil method dengan argumen</code></pre>

    <p><strong>Method</strong> dalam object berfungsi seperti fungsi biasa, tetapi hanya berlaku dalam lingkup object tersebut. Method juga dapat mengembalikan nilai:</p>

    <pre class="line-numbers"><code class="language-php">$tipe = $anjing->getTipe();</code></pre>

    <p>Dalam definisi class, kita dapat menentukan apakah suatu property dan method bisa diakses dari luar kelas menggunakan modifier <code>public</code> dan <code>private</code> untuk enkapsulasi.</p>

    <p><strong>Menggunakan Variabel sebagai Nama Property</strong></p>
    <p>Kita juga bisa menggunakan variable variables untuk mengakses property secara dinamis:</p>

    <pre class="line-numbers"><code class="language-php">$prop = 'umur';
echo $anjing->$prop; // Sama dengan echo $anjing->umur;</code></pre>

    <p><strong>Method Statis</strong></p>
    <p>Method statis adalah method yang dipanggil pada class, bukan pada object. Method ini tidak dapat mengakses property dari object. Sintaks pemanggilannya menggunakan <code>::</code> :</p>

    <pre class="line-numbers"><code class="language-php">Formatter::formatText("Hello, world");</code></pre>

    <p>Saat mendeklarasikan class, kita bisa menandai method atau property sebagai statis menggunakan kata kunci <code>static</code>.</p>

    <p><strong>Object Diteruskan sebagai Referensi</strong></p>
    <p>Ketika kita menetapkan suatu object ke variabel lain, variabel baru tersebut tidak membuat salinan object, tetapi hanya mengacu pada object yang sama.</p>

    <pre class="line-numbers"><code class="language-php">$hewan1 = new Hewan("Harimau", 10);
$hewan2 = $hewan1; // Kedua variabel mengacu ke objek yang sama
$hewan2->setTipe("Singa");

echo $hewan1->getTipe(); // Output: Singa</code></pre>

    <p>Karena <code>$hewan1</code> dan <code>$hewan2</code> menunjuk ke object yang sama, perubahan pada salah satu variabel akan berdampak pada variabel lainnya.</p>

    <p><strong>Membuat Salinan Object</strong></p>
    <p>Jika kita ingin membuat salinan independen dari suatu object, gunakan operator <code>clone</code>:</p>

    <pre class="line-numbers"><code class="language-php">$hewan1 = new Hewan("Harimau", 10);
$hewan2 = clone $hewan1; // Membuat salinan objek

$hewan2->setTipe("Singa");

echo $hewan1->getTipe(); // Output: Harimau
echo $hewan2->getTipe(); // Output: Singa</code></pre>

    <p>Jika class memiliki method <code>__clone()</code>, method ini akan otomatis dipanggil setelah object dikloning. Method ini berguna jika object memiliki sumber daya eksternal (seperti koneksi database atau file) yang perlu dibuat ulang, bukan hanya disalin.</p>




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
<!-- 
  <div class="text-start mb-3">
    <a href="{{ route('ayoPahami.besar') }}" class="btn-besar">🔎 MODE LAYAR PENUH</a>
  </div> -->

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pengguna {
  public $nama, $password;

  function simpanPengguna() {
    echo "Data pengguna telah disimpan.";
  }
}

$pengguna = new Pengguna;
print_r($pengguna);
echo "&lt;br&gt;";

$pengguna->nama = "Alice";
$pengguna->password = "secret123";
print_r($pengguna);
echo "&lt;br&gt;";

$pengguna->simpanPengguna();</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <div class="mt-4">
    <label for="outputMahasiswa" class="form-label">Masukkan output yang kamu lihat dari program di atas:</label>
    <small class="text-muted d-block mb-2" style="font-style: italic;">
    *Jika output menunjukkan pesan error, cukup tulis <strong>"Error"</strong> saja di kolom ini.
  </small>
    <textarea id="outputMahasiswa" class="form-control" rows="4" placeholder="Tulis output di sini (tulis sama persis seperti yang kamu lihat di bagian [Output] diatas)..."></textarea>

    <button onclick="cekOutputAyoPahami()" class="btn-next">Periksa Output</button>

    <div id="feedbackAyoPahami" class="mt-3"></div>
  </div>
</div>
  </div>
  </div>



<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Ayo buktikan pemahamanmu!</p>
    <p>
      Lengkapilah potongan kode berikut ini untuk mengakses dan memanggil <strong>property</strong> serta <strong>method</strong> dari sebuah object! <br>
      Isilah bagian kosong (___) dengan <strong>potongan kode yang sesuai</strong> agar program menampilkan merk kendaraan dan menjalankan method <code>nyalakanMesin()</code>.
    </p>
  </div>

  <div class="kode-box">
<pre><code>&lt;?php
class Kendaraan {
    public $merk = "Toyota";

    public function nyalakanMesin() {
        echo "Mesin dinyalakan.";
    }
}

$mobil = new Kendaraan;
echo <span class="drop-zone" id="drop1">___</span> . PHP_EOL;
$mobil-><span class="drop-zone" id="drop2">___</span>();
?&gt;
</code></pre>
  </div>

  <p class="mt-3"><strong>Seret potongan kode berikut ke tempat yang kosong:</strong></p>
  <ul id="dragItems" class="list-group mb-3">
    <li class="drag-item" draggable="true" data-value="nyalakanMesin">nyalakanMesin</li>
    <li class="drag-item" draggable="true" data-value="$this->merk">$this-&gt;merk</li>
    <li class="drag-item" draggable="true" data-value="$mobil->merk">$mobil-&gt;merk</li>
  </ul>

  <div class="quiz-actions">
    <button class="btn-next" onclick="cekDragJawaban()">PERIKSA</button>
    <button class="btn-back" onclick="resetDragJawaban()">RESET</button>
  </div>

  <div id="feedbackDrag" class="feedback d-none mt-2"></div>
</div>




<script>

let sudahAyoPahami = false;
let sudahLatihan = false;
let progressTerkirim = false;

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
  const feedback = document.getElementById('feedbackDrag');
  feedback.className = 'feedback';

  if (drop1 === '$mobil->merk' && drop2 === 'nyalakanMesin') {
    feedback.classList.add('correct');
    feedback.innerHTML = '🎉 Jawaban kamu benar! Kode sudah lengkap dan sesuai.';
    sudahLatihan = true;
    cekKelayakanAksesGabungan();
  } else {
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Masih salah. Coba lagi!';
  }

  feedback.classList.remove('d-none');
}



function resetDragJawaban() {
  document.getElementById('drop1').textContent = '___';
  document.getElementById('drop1').dataset.value = '';
  document.getElementById('drop2').textContent = '___';
  document.getElementById('drop2').dataset.value = '';
  document.getElementById('feedbackDrag').className = 'feedback d-none';
}


function cekOutputAyoPahami() {
  const jawaban = document.getElementById('outputMahasiswa').value.trim();
  const feedback = document.getElementById('feedbackAyoPahami');

  const jawabanBenar = `Pengguna Object
(
    [nama] => 
    [password] => 
)
<br>Pengguna Object
(
    [nama] => Alice
    [password] => secret123
)
<br>Data pengguna telah disimpan.`;

  const benar = jawaban === jawabanBenar;

  if (benar) {
  feedback.innerHTML = `
  <div class="alert alert-success">
    ✅ <strong>Selamat!</strong> Output kamu sudah sesuai.<br>
    Kamu berhasil memahami cara mendefinisikan class, membuat object, mengakses properti, serta menjalankan method dalam OOP PHP.<br>
    Perhatikan juga bagaimana <code>print_r()</code> digunakan untuk menampilkan isi objek.<br>
    Silakan lanjutkan ke latihan berikutnya!
  </div>

  <div class="mt-3 p-3 rounded" style="background-color: #f0faff; border-left: 6px solid #3ac4f1;">
    <h5 class="fw-bold mb-2 text-primary">🔍 Penjelasan Kode Program</h5>
    <ul style="padding-left: 20px;">
      <li><strong>Baris 2</strong>: Mendefinisikan sebuah class bernama <code>Pengguna</code>.</li>
      <li><strong>Baris 3</strong>: Menambahkan dua properti publik: <code>$nama</code> dan <code>$password</code>.</li>
      <li><strong>Baris 5–7</strong>: Membuat method <code>simpanPengguna()</code> yang menampilkan pesan "Data pengguna telah disimpan."</li>
      <li><strong>Baris 10</strong>: Membuat objek baru dari class <code>Pengguna</code> dan menyimpannya dalam variabel <code>$pengguna</code>.</li>
      <li><strong>Baris 11</strong>: Menampilkan isi awal object <code>$pengguna</code> dengan <code>print_r()</code> (semua properti masih kosong).</li>
      <li><strong>Baris 12</strong>: Menambahkan baris baru pada output.</li>
      <li><strong>Baris 14–15</strong>: Mengisi properti <code>nama</code> dengan nilai "Alice" dan <code>password</code> dengan "secret123".</li>
      <li><strong>Baris 16</strong>: Menampilkan kembali isi object yang kini sudah memiliki nilai di propertinya.</li>
      <li><strong>Baris 17</strong>: Menambahkan baris baru lagi di output.</li>
      <li><strong>Baris 19</strong>: Memanggil method <code>simpanPengguna()</code> untuk mencetak pesan dari dalam class.</li>
    </ul>
    <p class="mt-3 mb-0">
      💡 <strong>Kesimpulan:</strong> Dari contoh di atas, kita bisa melihat bagaimana property dari sebuah object dapat diakses dan diubah, serta bagaimana method dalam class dijalankan untuk menampilkan suatu proses. Fungsi <code>print_r()</code> membantu menampilkan isi object dan memudahkan proses debugging.
    </p>
  </div>
`;
sudahAyoPahami = true;
cekKelayakanAksesGabungan();
} else {
  feedback.innerHTML = `<div class="alert alert-warning">
    ⚠️ <strong>Jawaban belum tepat.</strong><br>
    Coba periksa kembali:
    <ul style="margin-top:5px;">
      <li>Apakah <strong>kode program</strong> yang kamu ketik sudah benar, tanpa salah huruf, tanda baca, atau spasi yang keliru?</li>
      <li>Apakah <strong>output</strong> yang kamu salin sudah persis sama seperti hasil yang muncul, termasuk urutan baris dan formatnya?</li>
    </ul>
    Pastikan untuk menyalin dengan teliti. Kamu bisa tekan tombol <code>RUN</code> lagi dan salin ulang outputnya jika perlu.
  </div>`;
}
}



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

function cekKelayakanAkses() {
  fetch("{{ url('/progress/cek') }}", {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
    },
    body: JSON.stringify({ halaman: ['b14-mengaksesp&m', 'b14-latihan'] })
  })
  .then(res => res.json())
  .then(data => {
    const selesai = data.selesai || [];

    const sudahDariServerAyoPahami = selesai.includes('b14-mengaksesp&m');
    const sudahDariServerLatihan = selesai.includes('b14-latihan');

    const tombol = document.getElementById("btnSelanjutnya");

    if (sudahDariServerAyoPahami && sudahDariServerLatihan && tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }

    // Sinkronkan variabel lokal jika progress sudah ada sebelumnya
    if (sudahDariServerAyoPahami) sudahAyoPahami = true;
    if (sudahDariServerLatihan) sudahLatihan = true;
  })
  .catch(err => {
    console.error("❌ Gagal cek kelayakan akses:", err);
  });
}


document.addEventListener('DOMContentLoaded', cekKelayakanAkses);

function cekKelayakanAksesGabungan() {
  if (sudahAyoPahami && sudahLatihan && !progressTerkirim) {
    kirimProgressHalaman('b14-mengaksesp&m'); // kirim hanya sekali
    progressTerkirim = true;

    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  }
}

</script>

<!-- PAGINATION -->
 @php
  $nextPage = './b15-pkuis';

  if (!auth()->check()) {
    $nextPage = './b21-mendeklarasikanm';
  } else {
    $role = auth()->user()->role ?? null;
    if ($role === 'mahasiswa' || $role === 'dosen') {
      $nextPage = './b15-pkuis';
    }
  }
@endphp


<div class="pagination">
  <a href="./b13-membuatobject" class="prev">&laquo; Sebelumnya</a>
  <a href="{{ $nextPage }}"
   id="btnSelanjutnya"
   class="next"
   style="pointer-events: none; opacity: 0.5;">
  Selanjutnya &raquo;
</a>
</div>
@endsection















