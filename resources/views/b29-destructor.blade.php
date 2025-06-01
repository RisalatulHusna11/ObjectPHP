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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b29-destructor')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>9. DESTRUCTORS</h5>
  </div>

  <div class="TIK">
    <p><strong>Destructor</strong> adalah method khusus dalam class yang dipanggil secara otomatis ketika sebuah object dihapus atau keluar dari cakupan (<em>scope</em>). Destructor digunakan untuk membersihkan sumber daya (<em>resource</em>) yang telah digunakan oleh object, seperti menutup koneksi database atau menghapus file sementara. Dalam PHP, destructor dideklarasikan dengan nama <code>__destruct()</code>, mirip dengan constructor, tetapi tanpa parameter.</p>

    <h6>Sintaks Destructor dalam PHP</h6>
    <p>Berikut adalah contoh sederhana penggunaan destructor dalam PHP:</p>
    <pre class="line-numbers"><code class="language-php">class Pengguna {
    function __destruct() {
        // Kode destructor ditulis di sini
    }
}</code></pre>

    <h6>Contoh Penggunaan Destructor</h6>
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
    <a href="{{ route('ayoPahami.besar34') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Bangunan {
    function __destruct() {
        echo "Sebuah bangunan sedang dihancurkan!";
    }
}

// Membuat object
$rumah = new Bangunan();

// Saat script selesai atau object dihapus, destructor akan dipanggil otomatis.
unset($rumah);
</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="explanation mt-3">
    <code>Class Bangunan</code> memiliki method khusus <code>__destruct()</code> yang akan dipanggil secara otomatis saat object <code>$rumah</code> dihancurkan, baik karena script selesai dieksekusi atau menggunakan <code>unset()</code>. Method ini berguna untuk menjalankan proses akhir seperti menutup koneksi atau menampilkan pesan. Dalam contoh ini, pemanggilan <code>unset($rumah)</code> secara eksplisit menghapus object, sehingga muncul pesan dari destructor.
  </p>
</div>
</div>

<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Ayo buktikan pemahamanmu!</p>
    <p>Lengkapilah kode program berikut agar dapat mencetak informasi bahwa file sementara telah dihapus dari sistem!</p>
  </div>

  <div class="row">
    <!-- Kode Program -->
    <div class="col-md-8">
      <div class="kode-box p-3">
<pre style="font-size: 13px;"><code>&lt;?php
class FileSementara {
    private $namaFile;

    public function <span class="drop-zone" id="drop1">___</span>($namaFile) {
        $this-><span class="drop-zone" id="drop2">___</span> = $namaFile;
    }

    public function <span class="drop-zone" id="drop3">___</span>() {
        echo "File {$this->namaFile} telah dihapus dari sistem.";
    }
}

$file = new FileSementara("data_tmp.txt");
<span class="drop-zone" id="drop4">___</span>($file);
?&gt;
</code></pre>
      </div>
    </div>

    <!-- Pilihan Drag -->
    <div class="col-md-4">
      <div class="ps-md-2">
        <p><strong>Seret ke tempat kosong:</strong></p>
        <ul id="dragItems" class="list-group">
          <li class="drag-item" draggable="true" data-value="$file">$file</li>
          <li class="drag-item" draggable="true" data-value="__construct">__construct</li>
          <li class="drag-item" draggable="true" data-value="__destruct">__destruct</li>
          <li class="drag-item" draggable="true" data-value="unset">unset</li>
          <li class="drag-item" draggable="true" data-value="namaFile">namaFile</li>
        </ul>
      </div>
    </div>
  </div>

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
  const d1 = document.getElementById('drop1').dataset.value || '';
  const d2 = document.getElementById('drop2').dataset.value || '';
  const d3 = document.getElementById('drop3').dataset.value || '';
  const d4 = document.getElementById('drop4').dataset.value || '';
  const feedback = document.getElementById('feedbackDrag');
  feedback.className = 'feedback';

  if (d1 === '__construct' && d2 === 'namaFile' && d3 === '__destruct' && d4 === 'unset') {
    feedback.classList.add('correct');
    feedback.innerHTML = '🎉 Jawaban kamu benar! Destructor sudah dipanggil dengan benar.';
    kirimProgressHalaman("b29-destructor");

    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Masih salah, periksa lagi isianmu ya.';
  }

  feedback.classList.remove('d-none');
}

function resetDragJawaban() {
  ['drop1', 'drop2', 'drop3', 'drop4'].forEach(id => {
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



<!-- PAGINATION -->
 @php
  $nextPage = './b210-pkuis';

  if (!auth()->check()) {
    $nextPage = './b31-konsepd';
  } else {
    $role = auth()->user()->role ?? null;
    if ($role === 'mahasiswa' || $role === 'dosen') {
      $nextPage = './b210-pkuis';
    }
  }
@endphp

<div class="pagination">
  <a href="./b28-constructors" class="prev">&laquo; Sebelumnya</a>
  <a href="{{ $nextPage }}"
   id="btnSelanjutnya"
   class="next"
   style="pointer-events: none; opacity: 0.5;">
  Selanjutnya &raquo;
</a>
</div>


@endsection
