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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b13-membuatobject')->value('selesai');
@endphp

@section('container')
<div class="materi-subbab1"> 
  <div class="judul-subbab">
    <h5>3. MEMBUAT OBJECT</h5>
  </div>

  <div class="TIK">
    <p>Untuk membuat sebuah object dari suatu class, kita menggunakan kata kunci <code>new</code>. Proses ini disebut instansiasi. Misalnya, jika kita memiliki class <code>Hewan</code>, kita dapat membuat object baru dari class tersebut dengan cara berikut:</p>
    <pre class="line-numbers"><code class="language-php">$anjing = new Hewan;</code></pre>

    <p>Perlu diperhatikan bahwa nama class tidak boleh dikutip, karena hal ini akan menyebabkan kesalahan kompilasi.</p>
    <pre class="line-numbers"><code class="language-php">$anjing = new "Hewan"; // Tidak akan berfungsi</code></pre>

    <p>Beberapa class memungkinkan kita mengirimkan argumen saat membuat object:</p>
    <pre class="line-numbers"><code class="language-php">$peliharaan = new Hewan("Anjing", "Golden Retriever");</code></pre>

    <p>Kita juga dapat menggunakan variabel untuk menyimpan nama class:</p>
    <pre class="line-numbers"><code class="language-php">$class = "Hewan";
$peliharaan = new $class;</code></pre>

    <p>Jika kita mencoba menggunakan class yang tidak ada, akan terjadi kesalahan saat runtime. Kita juga bisa mengakses method object secara dinamis menggunakan variabel variabel:</p>
    <pre class="line-numbers"><code class="language-php">$kendaraan = new Mobil;
$object = "kendaraan";
${$object}->mulaiMesin();</code></pre>

    <p>Dengan memahami cara membuat object, kita bisa mulai membangun program berorientasi object secara lebih fleksibel dan dinamis.</p>
  </div>

{{-- LATIHAN --}}
<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p class="quiz-intro">
  Seret dan susun baris-baris kode PHP di bawah ini hingga membentuk program yang benar untuk membuat sebuah <em>object</em> dari class.<br>
  Klik dan tahan setiap baris, lalu pindahkan ke posisi yang menurutmu tepat.<br>
  Setelah semua baris tersusun sesuai urutan yang benar, klik tombol <strong>Cek Jawaban</strong> untuk melihat hasilnya.<br>
  Jika urutan masih salah, kamu dapat memperbaikinya dan mencoba kembali. Jika jawaban benar, kamu dapat melanjutkan ke materi berikutnya.
</p>

  </div>

  <ul id="list-kode" class="list-group mb-3"></ul>

  <div class="quiz-actions">
    <button id="cekJawaban" class="btn-next">Cek Jawaban</button>
    <button id="resetJawaban" class="btn-back">Ulang</button>
  </div>

  <div id="feedback" class="feedback d-none"></div>
</div>

<script>
const barisKode = [
  { nomor: 1, isi: '$televisi = new Elektronik("Samsung", "55 inci");' },
  { nomor: 2, isi: 'class Elektronik {' },
  { nomor: 3, isi: '}' },
  { nomor: 4, isi: '?>' },
  { nomor: 5, isi: '<?php' }
];

const jawabanBenar = [5, 2, 3, 1, 4];

function tampilkanAcak() {
  const list = document.getElementById('list-kode');
  list.innerHTML = '';
  const acak = [...barisKode].sort(() => Math.random() - 0.5);
  acak.forEach(baris => {
    const item = document.createElement('li');
    item.className = 'list-group-item';
    item.textContent = `${baris.nomor}. ${baris.isi}`;
    item.setAttribute('data-nomor', baris.nomor);
    item.setAttribute('draggable', true);
    list.appendChild(item);
  });
  aktifkanDragDrop();
  document.getElementById('cekJawaban').textContent = 'Cek Jawaban';
  document.getElementById('cekJawaban').className = 'btn-next';
  document.getElementById('resetJawaban').classList.remove('btn-ulang-aktif'); // reset tombol ulang
}

function aktifkanDragDrop() {
  const list = document.getElementById('list-kode');
  let draggedItem = null;

  list.querySelectorAll('li').forEach(item => {
    item.addEventListener('dragstart', () => {
      draggedItem = item;
      item.classList.add('dragging');
    });

    item.addEventListener('dragend', () => {
      item.classList.remove('dragging');
      draggedItem = null;
    });

    item.addEventListener('dragover', e => e.preventDefault());

    item.addEventListener('drop', e => {
      e.preventDefault();
      if (draggedItem && draggedItem !== item) {
        const siblings = [...list.children];
        const draggedIndex = siblings.indexOf(draggedItem);
        const targetIndex = siblings.indexOf(item);
        if (draggedIndex < targetIndex) {
          list.insertBefore(draggedItem, item.nextSibling);
        } else {
          list.insertBefore(draggedItem, item);
        }
      }
    });
  });
}

const cekBtn = document.getElementById('cekJawaban');
const resetBtn = document.getElementById('resetJawaban');
const feedback = document.getElementById('feedback');

cekBtn.addEventListener('click', () => {
  // Ambil urutan baris kode hasil drag and drop
  const urutan = [...document.querySelectorAll('#list-kode li')].map(li => parseInt(li.dataset.nomor));

  // Bandingkan dengan jawaban benar
  const benar = JSON.stringify(urutan) === JSON.stringify(jawabanBenar);

  feedback.className = 'feedback';

  if (benar) {
    // Tampilkan umpan balik benar dan simpan progres
    feedback.classList.add('correct');
    feedback.innerHTML = '🎉 Jawaban kamu benar! Kode sudah tersusun dengan tepat.';
    cekBtn.textContent = 'Jawaban Benar';
    resetBtn.classList.add('btn-ulang-aktif'); // aktifkan tombol ulang
    kirimProgressHalaman("b13-membuatobject");
  } else {
    // Tampilkan umpan balik salah
    feedback.classList.add('incorrect');
    feedback.innerHTML = '❌ Masih salah, coba cek kembali urutannya ya!';
  }

  // Tampilkan area feedback
  feedback.classList.remove('d-none');
});


resetBtn.addEventListener('click', () => {
  if (feedback.classList.contains('correct')) {
    // Mengacak ulang urutan baris kode untuk percobaan baru
    tampilkanAcak();
    // Menyembunyikan umpan balik sebelumnya
    feedback.className = 'feedback d-none';
  }
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

    document.addEventListener('DOMContentLoaded', tampilkanAcak);
  </script>

  <!-- PAGINATION -->
  <div class="pagination">
    <a href="./b12-terminologi" class="prev">&laquo; Sebelumnya</a>
    <a href="./b14-mengaksesp&m"
       id="btnSelanjutnya"
       class="next"
       style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
       {{ $selesai ? '' : 'disabled' }}>
      Selanjutnya &raquo;
    </a>
  </div>
</div>
@endsection