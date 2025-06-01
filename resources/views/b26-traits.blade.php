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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b26-traits')->value('selesai');
@endphp


@section('container')

<div class="materi-subbab1">
  <div class="judul-subbab">
    <h5>6. TRAITS</h5>
  </div>

  <div class="TIK">
    <p><strong>Traits</strong> dalam PHP adalah mekanisme yang memungkinkan kita untuk menggunakan kembali kode di luar hierarki class. Dengan traits, kita bisa berbagi method antar berbagai class tanpa harus menggunakan pewarisan (<em>inheritance</em>). Hal ini sangat berguna jika beberapa class membutuhkan fungsionalitas yang sama tetapi tidak memiliki hubungan secara langsung.</p>

    <h6>Sintaks Traits dalam PHP</h6>
    <p>Untuk mendeklarasikan sebuah trait, kita menggunakan kata kunci <code>trait</code>, diikuti dengan method-method yang ingin digunakan oleh class lain.</p>
    <pre class="line-numbers"><code class="language-php">trait NamaTrait {
    public function namaMethod() {
        // Implementasi kode
    }
}</code></pre>

    <p>Agar suatu class dapat menggunakan trait, kita perlu menyertakan kata kunci <code>use</code>, diikuti dengan nama trait tersebut.</p>

    <h6>Contoh Implementasi Trait</h6>
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
    <a href="{{ route('ayoPahami.besar25') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
trait Logger {
    public function catatLog($pesan) {
        $className = __CLASS__;
        echo date("Y-m-d H:i:s") . " [{$className}] {$pesan}\n";
    }
}

class Pengguna {
    use Logger;
    
    public $nama;
    
    public function __construct($nama) {
        $this->nama = $nama;
        $this->catatLog("Pengguna '{$this->nama}' telah dibuat.");
    }
}

class KelompokPengguna {
    use Logger;
    
    public $daftarPengguna = [];
    
    public function tambahPengguna(Pengguna $pengguna) {
        $this->daftarPengguna[] = $pengguna;
        $this->catatLog("Pengguna '{$pengguna->nama}' ditambahkan ke kelompok.");
    }
}

// Penggunaan
$kelompok = new KelompokPengguna();
$kelompok->tambahPengguna(new Pengguna("Aldo"));
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Pada contoh di atas, <code>trait</code> <code>Logger</code> digunakan oleh class <code>Pengguna</code> dan <code>KelompokPengguna</code>, sehingga kedua class bisa menggunakan method <code>catatLog()</code> tanpa harus menulis ulang kode tersebut. Ini memudahkan pemeliharaan kode dan mendukung reuse logika yang umum digunakan di berbagai class.
  </p>
</div>



<h6>Menggunakan Beberapa Traits dalam Satu Class</h6>
    <p>PHP memungkinkan kita menggunakan lebih dari satu trait dalam satu class dengan memisahkan nama trait menggunakan koma.</p>
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
    <a href="{{ route('ayoPahami.besar26') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
trait Satu {
    public function aksiSatu() {
        echo "Melakukan aksi pertama.\n";
    }
}

trait Dua {
    public function aksiDua() {
        echo "Melakukan aksi kedua.\n";
    }
}

trait Gabungan {
    use Satu, Dua;
    
    public function semuaAksi() {
        $this->aksiSatu();
        $this->aksiDua();
    }
}

class Kombinasi {
    use Gabungan;
}

$object = new Kombinasi();
$object->semuaAksi();
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Dalam contoh ini, <code>trait Gabungan</code> menggunakan <code>Satu</code> dan <code>Dua</code>, sehingga class <code>Kombinasi</code> dapat menggunakan semua method dari kedua trait tersebut. Ini menunjukkan bahwa trait bisa menggunakan trait lain untuk menyusun kembali logika yang modular dan reusable.
  </p>
</div>



<h6>Mengatasi Konflik Method pada Traits</h6>
    <p>Jika dua trait memiliki method dengan nama yang sama, PHP akan menampilkan error. Untuk mengatasinya, kita bisa menggunakan kata kunci <code>insteadof</code> untuk memilih method mana yang akan digunakan.</p>
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
    <a href="{{ route('ayoPahami.besar27') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
trait Perintah {
    public function jalankan() {
        echo "Menjalankan perintah.\n";
    }
}

trait Lari {
    public function jalankan() {
        echo "Berlari cepat.\n";
    }
}

class Manusia {
    use Perintah, Lari {
        Lari::jalankan insteadof Perintah;
    }
}

$manusia = new Manusia();
$manusia->jalankan();
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Dalam contoh ini, <code>Lari::jalankan</code> dipilih sebagai method utama, sehingga method <code>jalankan()</code> dari trait <code>Perintah</code> tidak digunakan. Ini dilakukan dengan menggunakan <code>insteadof</code> untuk menyelesaikan konflik method yang memiliki nama sama pada dua trait.
  </p>
</div>


    <h6>Menggunakan Alias Method pada Traits</h6>
    <p>Selain memilih satu method, kita juga bisa memberikan alias pada method trait menggunakan kata kunci <code>as</code>, sehingga kedua method tetap bisa digunakan dalam class yang sama.</p>
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
    <a href="{{ route('ayoPahami.besar28') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
trait Perintah {
    public function jalankan() {
        echo "Menjalankan perintah.\n";
    }
}

trait Lari {
    public function jalankan() {
        echo "Berlari cepat.\n";
    }
}

class Manusia {
    use Perintah, Lari {
        Perintah::jalankan as jalankanPerintah;
        Lari::jalankan insteadof Perintah;
    }
}

$manusia = new Manusia();
$manusia->jalankan(); 
$manusia->jalankanPerintah(); 
?&gt;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Kode di atas memperlihatkan cara menyelesaikan konflik <code>method</code> yang memiliki nama sama dalam dua <code>trait</code> di PHP, yaitu <code>Perintah</code> dan <code>Lari</code>, yang keduanya memiliki method <code>jalankan()</code>. Pada class <code>Manusia</code>, digunakan <code>use</code> dengan resolusi konflik melalui <code>insteadof</code> untuk menetapkan bahwa method <code>jalankan()</code> dari trait <code>Lari</code> yang akan digunakan, sementara method dari trait <code>Perintah</code> tetap dapat diakses dengan memberikan alias <code>jalankanPerintah</code> menggunakan kata kunci <code>as</code>. Akibatnya, pemanggilan <code>$manusia-&gt;jalankan()</code> akan menampilkan <em>"Berlari cepat."</em> dan <code>$manusia-&gt;jalankanPerintah()</code> akan menampilkan <em>"Menjalankan perintah."</em>.
  </p>
</div>


</div>

<!-- lATIHAN: SUSUN KODE TRAIT -->
<div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Susunlah potongan kode berikut menjadi program PHP yang benar. Program ini menggunakan <code>trait</code> bernama <strong>CetakNama</strong> yang berisi method <code>cetak()</code>. Method ini hanya mencetak nama.</p>
    <p><em><strong>Catatan:</strong> Terdapat tiga baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (fungsi, trait, atau class).</em></p>
  </div>

  <ul id="list-kode-trait" class="list-group mb-3"></ul>

  <div class="quiz-actions">
    <button id="cekJawaban-trait" class="btn-next">Cek Jawaban</button>
    <button id="resetJawaban-trait" class="btn-back">Ulang</button>
  </div>

  <div id="feedback-trait" class="feedback d-none"></div>
</div>

<script>
const barisKodeTrait = [
  { nomor: 1, isi: '<?php' },
  { nomor: 2, isi: '$obj->cetak();' },
  { nomor: 3, isi: '?>' },
  { nomor: 4, isi: 'use CetakNama;' },
  { nomor: 5, isi: 'trait CetakNama {' },
  { nomor: 6, isi: 'public function cetak() {' },
  { nomor: 7, isi: 'echo "Halo, saya PHP!";' },
  { nomor: 8, isi: '} // penutup function cetak' },
  { nomor: 9, isi: '} // penutup trait CetakNama' },
  { nomor: 10, isi: '$obj = new Sapa();' },
  { nomor: 11, isi: '} // penutup class Sapa' }
];

const jawabanBenarTrait = [1, 5, 6, 7, 8, 9, 4, 11, 10, 2, 3];

function tampilkanAcakTrait() {
  const list = document.getElementById('list-kode-trait');
  if (!list) return;
  list.innerHTML = '';
  const acak = [...barisKodeTrait].sort(() => Math.random() - 0.5);
  acak.forEach(baris => {
    const item = document.createElement('li');
    item.className = 'list-group-item';
    item.textContent = `${baris.nomor}. ${baris.isi}`;
    item.setAttribute('data-nomor', baris.nomor);
    item.setAttribute('draggable', true);
    list.appendChild(item);
  });
  aktifkanDragDropTrait();
  document.getElementById('cekJawaban-trait').textContent = 'Cek Jawaban';
  document.getElementById('cekJawaban-trait').className = 'btn-next';
  document.getElementById('resetJawaban-trait').classList.remove('btn-ulang-aktif');
}

function aktifkanDragDropTrait() {
  const list = document.getElementById('list-kode-trait');
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

const cekBtnTrait = document.getElementById('cekJawaban-trait');
const resetBtnTrait = document.getElementById('resetJawaban-trait');
const feedbackTrait = document.getElementById('feedback-trait');

cekBtnTrait.addEventListener('click', () => {
  const urutan = [...document.querySelectorAll('#list-kode-trait li')].map(li => parseInt(li.dataset.nomor));
  const benar = JSON.stringify(urutan) === JSON.stringify(jawabanBenarTrait);
  feedbackTrait.className = 'feedback';
  if (benar) {
    feedbackTrait.classList.add('correct');
    feedbackTrait.innerHTML = '🎉 Jawaban kamu benar! Kode sudah tersusun dengan tepat.';
    cekBtnTrait.textContent = 'Jawaban Benar';
    cekBtnTrait.className = 'btn-next';
    resetBtnTrait.classList.add('btn-ulang-aktif');
    kirimProgressHalaman("b26-traits"); // SIMPAN PROGRESS
    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedbackTrait.classList.add('incorrect');
    feedbackTrait.innerHTML = '❌ Masih salah, coba urutkan kembali.';
  }
  feedbackTrait.classList.remove('d-none');
});

resetBtnTrait.addEventListener('click', () => {
  if (feedbackTrait.classList.contains('correct')) {
    tampilkanAcakTrait();
    feedbackTrait.className = 'feedback d-none';
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

document.addEventListener('DOMContentLoaded', tampilkanAcakTrait);
</script>


</div>

<div class="pagination">
  <a href="./b25-interface" class="prev">&laquo; Sebelumnya</a>
  <a href="./b27-abstractm"
     id="btnSelanjutnya"
     class="next"
     style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};"
     {{ $selesai ? '' : 'disabled' }}>
    Selanjutnya &raquo;
  </a>
</div>


@endsection
