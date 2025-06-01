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
$selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b21-mendeklarasikanm')->value('selesai');
@endphp

@section('container')

<div class="materi-subbab1">
  <div class="TIKjudul">
            <h4>B. MENDEKLARASIKAN CLASS</h4>
        </div>

        <div class="TIK">
            <h5>Tujuan Pembelajaran</h5>
            <p>Setelah menyelesaikan materi ini, mahasiswa diharapkan mampu:</p>
            <ol>
                <li>Memahami konsep dasar dalam mendeklarasikan class pada PHP.</li>
                <li>Mendeklarasikan method, property, dan constant dalam sebuah class.</li>
                <li>Menerapkan konsep inheritance, interface, dan trait dalam pemrograman berbasis objek.</li>
                <li>Menggunakan abstract method, constructor, dan destructor untuk mengelola perilaku object.</li>

            </ol>
        </div>

        <div class="judul-subbab">
            <h5>1. MENDEKLARASIKAN METHOD</h5>
        </div>

  <div class="TIK">
    <p>Metode adalah fungsi yang didefinisikan di dalam sebuah kelas. Meskipun PHP tidak memberlakukan batasan khusus, sebagian besar metode hanya beroperasi pada data dalam objek tempat metode tersebut berada. </p>

```
<h6>Aturan Penamaan Methods</h6>
<p>Method yang diawali dengan dua garis bawah (<code>__</code>) mungkin akan digunakan oleh PHP di masa depan. Saat ini, beberapa method dengan awalan tersebut sudah digunakan dalam proses serialisasi objek, seperti <code>__sleep()</code> dan <code>__wakeup()</code>. Oleh karena itu, disarankan untuk tidak menggunakan awalan <code>__</code> pada method buatan sendiri, kecuali untuk method bawaan PHP.</p>

<h6>Menggunakan <code>$this</code> dalam Method</h6>
<p>Di dalam sebuah method, variabel <code>$this</code> mengacu pada objek yang memanggil method tersebut. Misalnya, jika kita memanggil $mobil->nyalakanMesin(), maka di dalam method nyalakanMesin(), $this merujuk pada objek $mobil. Method menggunakan $this untuk mengakses properti dari objek saat ini dan untuk memanggil method lain dalam objek yang sama. Berikut adalah contoh class Mobil yang menunjukkan bagaimana $this digunakan:</p>
        

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
    <a href="{{ route('ayoPahami.besar2') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public $merk = '';

    function getMerk() {
        return $this->merk;
    }

    function setMerk($merkBaru) {
        $this->merk = $merkBaru;
    }
}

$mobil = new Mobil();
$mobil->setMerk('Toyota');
echo $mobil->getMerk();</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Pada contoh di atas, method <code>getMerk()</code> dan <code>setMerk()</code> menggunakan <code>$this</code> untuk mengakses dan mengubah properti <code>$merk</code> pada objek yang sedang digunakan.
  </p>
</div>


  
<h6>Method Statis</h6>
<p>Untuk mendeklarasikan method sebagai method statis, gunakan kata kunci <code>static</code>. Di dalam method statis, variabel <code>$this</code> tidak dapat digunakan karena method ini tidak terkait dengan instance tertentu dari sebuah class.</p>
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
    <a href="{{ route('ayoPahami.besar3') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class PembantuMatematika {
    static function kuadrat($angka) {
        return $angka * $angka;
    }

    static function kubus($angka) {
        return $angka * $angka * $angka;
    }
}

// Memanggil method statis tanpa membuat objek
echo PembantuMatematika::kuadrat(4); 
echo PembantuMatematika::kubus(3);</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Method <code>kuadrat()</code> dan <code>kubus()</code> dideklarasikan sebagai method statis dan dapat langsung dipanggil dengan <code>PembantuMatematika::kuadrat(4)</code> tanpa perlu membuat objek terlebih dahulu.
  </p>
</div>



<h6>Method Final</h6>
<p>Jika sebuah method dideklarasikan dengan kata kunci <code>final</code>, maka method tersebut tidak dapat ditimpa (override) oleh class turunannya.</p>
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
    <a href="{{ route('ayoPahami.besar4') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Hewan {
    public $nama;

    final function getNama() {
        return $this->nama;
    }
}

class Anjing extends Hewan {
    function getNama() {
        return "Ini adalah anjing bernama " . $this->nama;
    }
}</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Dalam contoh ini, method <code>getNama()</code> di dalam class <code>Hewan</code> dideklarasikan sebagai <code>final</code>, sehingga class <code>Anjing</code> tidak diperbolehkan untuk menggantinya (override).
  </p>
</div>


```
<h6>Modifier Akses (Public, Private, Protected)</h6>
<p>Dalam pemrograman berorientasi objek, penting untuk mengontrol akses terhadap properti dan method dalam class. Untuk itulah PHP menyediakan modifier akses: <code>public</code>, <code>protected</code>, dan <code>private</code> yang digunakan untuk menentukan sejauh mana anggota class (property dan method) bisa diakses dari luar:</p>
<ul>
  <li><strong>Public</strong>: Dapat diakses dari mana saja, baik dari dalam class maupun luar.</li>
  <li><strong>Protected</strong>: Hanya dapat diakses oleh class itu sendiri dan class turunannya.</li>
  <li><strong>Private</strong>: Hanya dapat diakses oleh class itu sendiri, tidak dapat diakses dari luar atau subclass.</li>
</ul>
<p>Agar lebih mudah dipahami, perhatikan ilustrasi berikut yang menggambarkan perbedaan ketiga jenis akses tersebut.</p>
<div class="teks-kontenpt2">
      <img style="display: block; margin: 0 auto;" class="scrool" src="images/G4.png" alt="Gambar 4 Ilustrasi Akses Modifier: Public, Protected, dan Private">
      <p>Gambar 4 Ilustrasi Akses Modifier: Public, Protected, dan Private</p>
  </div>
<p>Gambar tersebut menunjukkan analogi akses modifier sebagai jenis “pintu akses” dalam sistem OOP:</p>
<ul>
  <li><strong>Public</strong> diibaratkan sebagai pintu terbuka yang bisa dilalui siapa saja.</li>
  <li><strong>Protected</strong> digambarkan sebagai akses terbatas, hanya bisa dilalui oleh "keluarga" (class induk dan turunannya).</li>
  <li><strong>Private</strong> digambarkan seperti ruang pribadi yang hanya bisa diakses oleh pemiliknya sendiri, yaitu class tempat property atau method itu didefinisikan.</li>
</ul>
<p>Dengan memahami gambar ini, kita dapat menyadari bahwa pemilihan akses modifier sangat penting dalam menjaga keamanan data dan struktur kode yang rapi. Contoh penggunaan modifier akses:</p>
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
    <a href="{{ route('ayoPahami.besar5') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class RekeningBank {
    public $saldo = 0;

    public function setor($jumlah) {
        $this->saldo += $jumlah;
        $this->catatTransaksi();
    }

    protected function tarik($jumlah) {
        if ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            $this->catatTransaksi();
        } else {
            echo "Saldo tidak cukup!";
        }
    }

    private function catatTransaksi() {
        echo "Transaksi berhasil. Saldo saat ini: {$this->saldo}\n";
    }
}

$rekening = new RekeningBank();
$rekening->setor(1000);
// $rekening->tarik(500); // Tidak dapat dipanggil karena bersifat protected
// $rekening->catatTransaksi(); // Tidak dapat dipanggil karena bersifat private</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <div class="mt-3">
    <p>Pada contoh di atas:</p>
    <ul>
      <li><strong><code>setor()</code> bersifat public</strong> sehingga dapat diakses di luar class.</li>
      <li><strong><code>tarik()</code> bersifat protected</strong> hanya bisa dipanggil dari dalam class atau subclass.</li>
      <li><strong><code>catatTransaksi()</code> bersifat private</strong> sehingga hanya bisa dipanggil di dalam class RekeningBank.</li>
    </ul>
  </div>
</div>



```
<h6>Type Hinting dalam Parameter Method</h6>
<p>PHP mendukung type hinting untuk memastikan parameter yang diterima oleh sebuah method sesuai dengan tipe data yang diharapkan. Contoh:</p>
      <div class="code-salinan mb-3">
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
    <a href="{{ route('ayoPahami.besar6') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Karyawan {
    function berikanTugas(Tugas $tugas) {
        echo "Tugas diberikan: {$tugas->deskripsi}\n";
    }
}

class Tugas {
    public $deskripsi;
    
    function __construct($deskripsi) {
        $this->deskripsi = $deskripsi;
    }
}

$tugas = new Tugas("Menganalisis data keuangan");
$karyawan = new Karyawan();
$karyawan->berikanTugas($tugas);</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Dalam contoh ini, method <code>berikanTugas()</code> hanya menerima objek dari class <code>Tugas</code>, sehingga pemanggilan dengan tipe data lain akan menyebabkan error.
  </p>
</div>
```



<h6>Type Hinting dalam Return Type Method</h6>
<p>Kita juga dapat menentukan tipe data yang akan dikembalikan oleh suatu method dengan menambahkan tanda : diikuti tipe data setelah deklarasi parameter.
Contoh:
</p>
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
    <a href="{{ route('ayoPahami.besar7') }}" class="btn-besar">🔎 LIHAT VERSI LEBIH BESAR</a>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Perpustakaan {
    function ambilBuku(): Buku {
        return new Buku("Pemrograman PHP");
    }
}

class Buku {
    public $judul;

    function __construct($judul) {
        $this->judul = $judul;
    }
}

$perpustakaan = new Perpustakaan();
$buku = $perpustakaan->ambilBuku();
echo "Buku yang diperoleh: " . $buku->judul;</code></pre>
      </div>
    </div>

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div>

  <p class="mt-3">
    Di sini, method <code>ambilBuku()</code> harus mengembalikan objek dari class <code>Buku</code>. Jika method ini mengembalikan tipe data lain, PHP akan menghasilkan error.
  </p>
</div>
  </div>

  
<!--  LATIHAN -->
  <div class="quiz-card">
  <div class="quiz-header">
    <h1>LATIHAN</h1>
    <p>Untuk menguji pemahamanmu tentang mendeklarasikan methods dalam PHP, susunlah baris-baris kode berikut agar menjadi program PHP yang benar!</p>
    <p><strong>Petunjuk:</strong> Perhatikan posisi tanda <code>}</code>. Soal ini memiliki dua tanda penutup kurung kurawal: satu untuk <code>method</code> dan satu untuk <code>class</code>. Perhatikan komentar di samping baris <code>}</code> agar kamu bisa menyusunnya dengan tepat.</p>
  </div>

  <ul id="list-kode-b21" class="list-group-b21 mb-3"></ul>

  <div class="quiz-actions">
    <button id="cekJawaban-b21" class="btn-next">Cek Jawaban</button>
    <button id="resetJawaban-b21" class="btn-back">Ulang</button>
  </div>

  <div id="feedback-b21" class="feedback d-none"></div>
</div>

<script>
const barisKodeB21 = [
  { nomor: 1, isi: '} // penutup class Produk' },
  { nomor: 2, isi: 'public function getNama() {' },
  { nomor: 3, isi: 'class Produk {' },
  { nomor: 4, isi: '<?php' },
  { nomor: 5, isi: '} // penutup method getNama()' },
  { nomor: 6, isi: 'return $this->nama;' },
  { nomor: 7, isi: 'public $nama = "Buku Tulis";' },
  { nomor: 8, isi: '?>' }
];


const jawabanBenarB21 = [4, 3, 7, 2, 6, 5, 1, 8];

function tampilkanAcakB21() {
  const list = document.getElementById('list-kode-b21');
  list.innerHTML = '';
  const acak = [...barisKodeB21].sort(() => Math.random() - 0.5);
  acak.forEach(baris => {
    const item = document.createElement('li');
    item.className = 'list-group-item-b21';
    item.textContent = `${baris.nomor}. ${baris.isi}`;
    item.setAttribute('data-nomor', baris.nomor);
    item.setAttribute('draggable', true);
    list.appendChild(item);
  });
  aktifkanDragDropB21();
  document.getElementById('cekJawaban-b21').textContent = 'Cek Jawaban';
  document.getElementById('cekJawaban-b21').className = 'btn-next';
}

function aktifkanDragDropB21() {
  const list = document.getElementById('list-kode-b21');
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

const cekBtnB21 = document.getElementById('cekJawaban-b21');
const resetBtnB21 = document.getElementById('resetJawaban-b21');
const feedbackB21 = document.getElementById('feedback-b21');

cekBtnB21.addEventListener('click', () => {
  const urutan = [...document.querySelectorAll('#list-kode-b21 li')].map(li => parseInt(li.dataset.nomor));
  const benar = JSON.stringify(urutan) === JSON.stringify(jawabanBenarB21);
  feedbackB21.className = 'feedback';
  if (benar) {
    feedbackB21.classList.add('correct');
    feedbackB21.innerHTML = '🎉 Jawaban kamu benar! Program PHP-nya sudah tersusun dengan tepat.';
    cekBtnB21.textContent = 'Jawaban Benar';
    cekBtnB21.className = 'btn-next';
    kirimProgressHalaman("b21-mendeklarasikanm");
    const tombol = document.getElementById("btnSelanjutnya");
    if (tombol) {
      tombol.style.pointerEvents = "auto";
      tombol.style.opacity = 1;
      tombol.removeAttribute("disabled");
    }
  } else {
    feedbackB21.classList.add('incorrect');
    feedbackB21.innerHTML = '❌ Masih salah, coba urutkan ulang dengan cermat.';
  }
  feedbackB21.classList.remove('d-none');
});

resetBtnB21.addEventListener('click', () => {
  if (feedbackB21.classList.contains('correct')) {
    tampilkanAcakB21();
    feedbackB21.className = 'feedback d-none';
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

document.addEventListener('DOMContentLoaded', tampilkanAcakB21);
</script>


```

  </div>
</div>

<div class="pagination">
  <a href="./b22-mendeklarasikanp"
     id="btnSelanjutnya"
     class="next"
     style="pointer-events: none; opacity: 0.5;">
    Selanjutnya &raquo;
  </a>
</div>



@endsection