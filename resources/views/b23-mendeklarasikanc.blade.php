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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b23-mendeklarasikanc')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>3. MENDEKLARASIKAN KONSTANTA</h5>
  </div>

  <div class="TIK">
    <p>Dalam PHP, kita bisa mendeklarasikan konstanta di dalam class menggunakan kata kunci <code>const</code>. Seperti halnya properti statis, konstanta dapat diakses langsung melalui class atau dalam method objek menggunakan notasi <code>self</code>. Setelah sebuah konstanta didefinisikan, nilainya tidak bisa diubah lagi.</p>

    <h6>Menetapkan Konstanta di Dalam Class</h6>
    <p>Untuk menetapkan konstanta dalam class, kita menggunakan <code>const</code> di dalam class dan memberikan nilai tetap yang tidak dapat diubah. Sebagai praktik umum, kita menulis nama konstanta dalam huruf kapital untuk membedakannya dari property atau method lainnya.</p>
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
    <a href="{{ route('ayoPahami.besar13') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class MetodePembayaran {
    public const TIPE_KARTUKREDIT = 0; // Konstanta untuk kartu kredit
    public const TIPE_TUNAI = 1;      // Konstanta untuk pembayaran tunai
}

// Mengakses konstanta dari luar class
echo MetodePembayaran::TIPE_KARTUKREDIT;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Pada contoh di atas, kita mendeklarasikan dua konstanta dalam class <code>MetodePembayaran</code> yang dapat diakses secara langsung menggunakan tanda <code>::</code>. Nilai konstanta ini tidak dapat diubah setelah didefinisikan.
  </p>
</div>


    <p>Mengakses konstanta dari luar class:</p>
    <pre class="line-numbers"><code class="language-php">echo MetodePembayaran::TIPE_KARTUKREDIT; <strong>// Output: 0</strong></code></pre>

    <p>Pada contoh di atas, kita mendeklarasikan dua konstanta dalam class <code>MetodePembayaran</code> yang dapat diakses secara langsung menggunakan tanda <code>::</code>. Nilai konstanta ini tidak dapat diubah setelah didefinisikan.</p>

    <h6>Penggunaan Aksesibilitas Konstanta</h6>
    <p>Seperti halnya property, kita juga bisa mengatur aksesibilitas dari konstanta menggunakan access modifier seperti <code>public</code>, <code>protected</code>, atau <code>private</code>.</p>
    <ul>
      <li><strong>Public</strong>: Konstanta dapat diakses dari luar class.</li>
      <li><strong>Protected</strong>: Konstanta hanya dapat diakses di dalam class itu sendiri dan class yang mewarisi.</li>
      <li><strong>Private</strong>: Konstanta hanya dapat diakses di dalam class itu sendiri.</li>
    </ul>

    <p>Contoh berikut menunjukkan bagaimana mengatur aksesibilitas konstanta:</p>
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
    <a href="{{ route('ayoPahami.besar14') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Orang {
    protected const KONSTANTA_PROTECTED = false;
    public const USERNAME_DEFAULT = "&lt;unknown&gt;";
    private const KODE_INTERNAL = "ABC1234";
}

// Mengakses konstanta publik
echo Orang::USERNAME_DEFAULT; 

// Akses konstanta protected atau private akan menghasilkan error
// echo Orang::KONSTANTA_PROTECTED; // Error</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Pada contoh ini, konstanta <code>USERNAME_DEFAULT</code> dapat diakses dari luar class karena dideklarasikan sebagai <code>public</code>, sedangkan <code>KONSTANTA_PROTECTED</code> hanya bisa diakses di dalam class atau class yang mewarisinya. <code>KODE_INTERNAL</code> hanya bisa diakses di dalam class yang mendeklarasikannya.
  </p>
</div>

    <h6>Contoh Penggunaan Konstanta dengan Metode Static</h6>
    <p>Kita bisa menggunakan konstanta dalam method statis dengan cara yang sama, yaitu menggunakan kata kunci <code>self</code> untuk merujuk konstanta tersebut.</p>
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
    <a href="{{ route('ayoPahami.besar15') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Translate {
    const INDONESIA = 0;
    const KOREA = 1;
    const JEPANG = 2;
    const MALAYSIA = 3;

    public static function lookup() {
        echo self::KOREA;
    }
}

Translate::lookup();</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Pada contoh di atas, kita mendeklarasikan beberapa konstanta dalam class <code>Translate</code> dan menggunakan <code>self::KOREA</code> di dalam method statis <code>lookup</code> untuk menampilkan nilai konstanta <code>KOREA</code>. Konstanta ini diakses langsung tanpa perlu membuat object terlebih dahulu.
  </p>
</div>
    

<h6>Menetapkan Konstanta Secara Global dengan Fungsi define()</h6>
    <p>Kita juga bisa membuat konstanta global menggunakan fungsi <code>define()</code>. Konstanta ini dapat diakses di mana saja dalam skrip PHP, tidak terbatas pada class tertentu.</p>
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
    <a href="{{ route('ayoPahami.besar16') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
define('NAMA_PERUSAHAAN', 'PT. Teknologi Maju');

// Mengakses konstanta global
echo NAMA_PERUSAHAAN;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Pada contoh ini, kita mendefinisikan konstanta <code>NAMA_PERUSAHAAN</code> menggunakan <code>define()</code> dan mengaksesnya tanpa perlu menggunakan class atau object.
  </p>
</div>
</div>


<!-- LATIHAN: SUSUN KODE KONSTANTA -->
  <div class="quiz-card">
    <div class="quiz-header">
      <h1>LATIHAN</h1>
      <p>Untuk menguji sejauh mana kamu memahami cara mendefinisikan konstanta dalam class PHP, susunlah potongan-potongan kode berikut menjadi urutan kode PHP yang benar!</p>
    </div>

    <ul id="list-kode-konstanta" class="list-group mb-3"></ul>

    <div class="quiz-actions">
      <button id="cekJawaban-konstanta" class="btn-next">Cek Jawaban</button>
      <button id="resetJawaban-konstanta" class="btn-back">Ulang</button>
    </div>

    <div id="feedback-konstanta" class="feedback d-none"></div>
  </div>
</div>

<script>
const barisKodeKonstanta = [
  { nomor: 1, isi: 'const MINIMUM_UMUR = 17;' },
  { nomor: 2, isi: 'class Verifikasi {' },
  { nomor: 3, isi: 'echo Verifikasi::MINIMUM_UMUR;' },
  { nomor: 4, isi: '<?php' },
  { nomor: 5, isi: '}' },
  { nomor: 6, isi: '?>' }
];

const jawabanBenarKonstanta = [4, 2, 1, 5, 3, 6];

function tampilkanAcakKonstanta() {
  const list = document.getElementById('list-kode-konstanta');
  if (!list) return;
  list.innerHTML = '';
  const acak = [...barisKodeKonstanta].sort(() => Math.random() - 0.5);
  acak.forEach(baris => {
    const item = document.createElement('li');
    item.className = 'list-group-item';
    item.textContent = `${baris.nomor}. ${baris.isi}`;
    item.setAttribute('data-nomor', baris.nomor);
    item.setAttribute('draggable', true);
    list.appendChild(item);
  });
  aktifkanDragDropKonstanta();
  document.getElementById('cekJawaban-konstanta').textContent = 'Cek Jawaban';
  document.getElementById('cekJawaban-konstanta').className = 'btn-next';
  document.getElementById('resetJawaban-konstanta').classList.remove('btn-ulang-aktif');
}

function aktifkanDragDropKonstanta() {
  const list = document.getElementById('list-kode-konstanta');
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

const cekBtnKonstanta = document.getElementById('cekJawaban-konstanta');
const resetBtnKonstanta = document.getElementById('resetJawaban-konstanta');
const feedbackKonstanta = document.getElementById('feedback-konstanta');

cekBtnKonstanta.addEventListener('click', () => {
  const urutan = [...document.querySelectorAll('#list-kode-konstanta li')].map(li => parseInt(li.dataset.nomor));
  const benar = JSON.stringify(urutan) === JSON.stringify(jawabanBenarKonstanta);
  feedbackKonstanta.className = 'feedback';
  if (benar) {
    feedbackKonstanta.classList.add('correct');
    feedbackKonstanta.innerHTML = '🎉 Jawaban kamu benar! Konstanta dideklarasikan dengan tepat.';
    cekBtnKonstanta.textContent = 'Jawaban Benar';
    cekBtnKonstanta.className = 'btn-next';
    resetBtnKonstanta.classList.add('btn-ulang-aktif');
    kirimProgressHalaman("b23-mendeklarasikanc"); // ✅ SIMPAN PROGRES
    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedbackKonstanta.classList.add('incorrect');
    feedbackKonstanta.innerHTML = '❌ Masih salah, coba periksa urutannya ya.';
  }
  feedbackKonstanta.classList.remove('d-none');
});


resetBtnKonstanta.addEventListener('click', () => {
  if (feedbackKonstanta.classList.contains('correct')) {
    tampilkanAcakKonstanta();
    feedbackKonstanta.className = 'feedback d-none';
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

document.addEventListener('DOMContentLoaded', tampilkanAcakKonstanta);
</script>


</div>

<div class="pagination">
  <a href="./b22-mendeklarasikanp" class="prev">&laquo; Sebelumnya</a>
  <a href="./b24-inheritance"
     id="btnSelanjutnya"
     class="next"
     style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
     {{ $selesai ? '' : 'disabled' }}>
    Selanjutnya &raquo;
  </a>
</div>


@endsection
