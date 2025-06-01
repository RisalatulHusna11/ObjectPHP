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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b31-konsepd')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="TIKjudul">
            <h4>C. ANONYMOUS CLASSES</h4>
        </div>

        <div class="TIK">
            <h5>Tujuan Pembelajaran</h5>
            <p>Setelah menyelesaikan materi ini, mahasiswa diharapkan mampu:</p>
            <ol>
                <li>Memahami konsep anonymous class dalam PHP.</li>
                <li>Mengidentifikasi perbedaan antara anonymous class dan named class.</li>
                <li>Menerapkan anonymous class dalam pengembangan aplikasi, terutama untuk kebutuhan pengujian (mock objects).</li>
                <li>Menjelaskan keterbatasan anonymous class, seperti ketidakmampuannya untuk diserialisasi.</li>

            </ol>
        </div>


  <div class="judul-subbab">
      <h5>KONSEP DASAR ANONYMOUS CLASS</h5>
  </div>

  <div class="TIK">
    <p><strong>Anonymous class</strong> adalah class tanpa nama yang dibuat secara langsung saat dibutuhkan. Anonymous class sering digunakan dalam pembuatan mock object untuk pengujian, atau ketika kita memerlukan class sekali pakai yang tidak perlu didefinisikan secara eksplisit. Meskipun cara kerjanya sama seperti class biasa, anonymous class tidak memiliki nama tidak bisa digunakan kembali di tempat lain.</p>

    <p>Anonymous class dapat digambarkan seperti kita membuat alat sekali pakai langsung di tempat—tanpa memberi nama alatnya—dan langsung menggunakannya di situ juga. Misalnya, sebuah class biasanya seperti memesan kartu identitas dengan nama resmi yang bisa dipakai kapan saja. Sementara anonymous class seperti menulis nama di secarik kertas untuk sekali digunakan saja—langsung dibuang setelah selesai.</p>

    <h6>Sintaks Anonymous Class dalam PHP</h6>
    <p>Berikut adalah contoh dasar anonymous class dalam PHP:</p>
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
    <a href="{{ route('ayoPahami.besar35') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Orang {
    public $nama = '';

    function getNama() {
        return $this->nama;
    }
}

// Membuat object dari anonymous class yang mewarisi class Orang
$anonim = new class() extends Orang {
    public function getNama() {
        // Mengembalikan nilai tetap untuk tujuan pengujian
        return "Budi";
    }
};

// Memanggil method dari anonymous class
echo $anonim->getNama(); // Output: Budi
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    <code>Class Orang</code> memiliki properti <code>$nama</code> dan method <code>getNama()</code>. Dalam contoh ini, kita membuat <strong>anonymous class</strong> yang mewarisi <code>Orang</code> menggunakan <code>new class() extends Orang</code>. Method <code>getNama()</code> dioverride untuk selalu mengembalikan string <code>"Budi"</code>. Penting untuk diingat bahwa anonymous class harus diakhiri dengan tanda titik koma <code>;</code> karena dideklarasikan sekaligus dibuat objeknya, berbeda dengan class biasa.
  </p>
</div>


    <h6>Penggunaan Anonymous Class dalam Implementasi Interface</h6>
    <p>Anonymous class juga bisa digunakan untuk mengimplementasikan interface.</p>
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
    <a href="{{ route('ayoPahami.besar36') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
interface Kendaraan {
    public function jalankan();
}

// Membuat object dari anonymous class yang mengimplementasikan interface Kendaraan
$mobil = new class() implements Kendaraan {
    public function jalankan() {
        return "Mobil sedang berjalan...";
    }
};

// Memanggil method dari anonymous class
echo $mobil->jalankan(); // Output: Mobil sedang berjalan...
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Contoh di atas menunjukkan penggunaan <strong>anonymous class</strong> yang <code>mengimplementasikan interface</code> <code>Kendaraan</code>. Interface mendefinisikan method <code>jalankan()</code>, yang kemudian diimplementasikan dalam anonymous class tanpa membuat class terpisah. Pemanggilan <code>$mobil-&gt;jalankan()</code> akan menampilkan <code>"Mobil sedang berjalan..."</code>. Anonymous class sangat berguna untuk pembuatan object sederhana yang hanya digunakan satu kali.
  </p>
</div>



    <h6>Anonymous Class dengan Constructor</h6>
    <p>Anonymous class juga bisa memiliki constructor untuk menerima parameter saat dibuat.</p>
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
    <a href="{{ route('ayoPahami.besar37') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
$pesan = new class("Selamat datang!") {
    private $teks;

    public function __construct($teks) {
        $this->teks = $teks;
    }

    public function tampilkanPesan() {
        return $this->teks;
    }
};

// Memanggil method dari anonymous class
echo $pesan->tampilkanPesan(); // Output: Selamat datang!
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    Contoh di atas menggunakan <strong>anonymous class</strong> dengan <code>constructor</code> yang menerima parameter <code>$teks</code>. Nilai parameter disimpan dalam property <code>$teks</code>, kemudian ditampilkan melalui method <code>tampilkanPesan()</code>. Saat objek <code>$pesan</code> dipanggil, hasil yang ditampilkan adalah <code>"Selamat datang!"</code>. Ini menunjukkan bahwa anonymous class dapat memiliki constructor dan method seperti class biasa.
  </p>
</div>


    

    <h6>Batasan Anonymous Class</h6>
    <p>Namun, meskipun fleksibel dan efisien untuk penggunaan sekali pakai, anonymous class memiliki dua keterbatasan penting yang perlu diperhatikan:</p>
    <div class="teks-kontenpt2">
      <img style="display: block; margin: 0 auto;" class="scrool" src="images/G6.png" alt="Gambar 6 Keterbatasan Anonymous Class dalam PHP">
      <p>Gambar 6 Keterbatasan Anonymous Class dalam PHP</p>
    </div>
    <ul>
      <li><strong>Tidak bisa diserialisasi</strong>: object dari anonymous class tidak bisa disimpan dalam format string menggunakan <code>serialize()</code>, karena PHP tidak mengenali class tersebut setelah program berakhir.</li>
      <li><strong>Tidak bisa digunakan kembali di tempat lain</strong>: karena tidak memiliki nama, anonymous class hanya bisa digunakan di tempat dideklarasikan dan tidak bisa dipanggil ulang di lokasi berbeda dalam kode program.</li>
    </ul>
  </div>

  <div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>
      Untuk menguji pemahaman kamu tentang <strong>penggunaan anonymous class</strong> dalam OOP PHP,
      kerjakan aktivitas berikut ini!
    </p>
    <p>
      Lengkapilah kode program berikut agar dapat mencetak hasil keluaran <strong>"Pengguna sementara: Anon"</strong>
      menggunakan anonymous class yang mewarisi class <code>Pengguna</code>. Pastikan <code>getNama()</code>
      di-override dengan benar di dalam anonymous class.
    </p>
  </div>

  <div class="kode-box">
<pre><code>&lt;?php
class Pengguna {
    public function getNama() {
        return "Nama asli";
    }
}

$anon = new class() extends Pengguna {
    public function <span class="drop-zone" id="drop1">___</span>() {
        return "<span class="drop-zone" id="drop2">___</span>";
    }
};

echo $anon-><span class="drop-zone" id="drop3">___</span>();
?&gt;
</code></pre>
  </div>

  <p class="mt-3"><strong>Seret potongan kode berikut ke tempat yang kosong:</strong></p>
  <ul id="dragItems" class="list-group mb-3">
    <li class="drag-item" draggable="true" data-value="Pengguna">Pengguna</li>
    <li class="drag-item" draggable="true" data-value="getNama">getNama</li>
    <li class="drag-item" draggable="true" data-value="Pengguna sementara: Anon">Pengguna sementara: Anon</li>
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
    drop1 === 'getNama' &&
    drop2 === 'Pengguna sementara: Anon' &&
    drop3 === 'getNama'
  ) {
    feedback.classList.add('correct');
    feedback.innerHTML = '🎉 Jawaban kamu benar! Anonymous class telah diimplementasikan dengan tepat.';
    kirimProgressHalaman("b31-konsepd");

    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Masih ada yang salah. Pastikan kamu override method dengan nama dan output yang tepat.';
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

<!-- PAGINATION -->
 @php
  $nextPage = './b32-pkuis';

  if (!auth()->check()) {
    $nextPage = './b41-memeriksac';
  } else {
    $role = auth()->user()->role ?? null;
    if ($role === 'mahasiswa' || $role === 'dosen') {
      $nextPage = './b32-pkuis';
    }
  }
@endphp

<div class="pagination">
  <a href="{{ $nextPage }}"
   id="btnSelanjutnya"
   class="next"
   style="pointer-events: none; opacity: 0.5;">
  Selanjutnya &raquo;
</a>
</div>


@endsection
