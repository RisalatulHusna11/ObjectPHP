// Ambil nilai KKM dari meta
const metaKKM = document.querySelector('meta[name="kkm"]');
const kkm = metaKKM ? parseInt(metaKKM.content) : 70;

const soalData = [
  {
    nomor: 1,
    pertanyaan: "Alasan utama penggunaan object dalam OOP dibandingkan sekadar menyimpan data dalam array adalah …",
    opsi: ["Object lebih cepat dieksekusi", "Array tidak mendukung method", "Object menyatukan data dan perilaku dalam satu entitas", "Object tidak bisa diubah setelah dibuat", "Array membutuhkan lebih banyak resource"]
  },
  {
    nomor: 2,
    pertanyaan: "Jika kamu membuat object dari class Siswa, maka hasil dari get_class($obj) akan mengembalikan...",
    opsi: ["Nama method aktif", "Tipe data object", "String \"Object\"", "Nama class: \"Siswa”", "NULL"]
  },
  {
    nomor: 3,
    pertanyaan: "Dalam paradigma OOP, alasan penting untuk menghindari variabel global dan lebih memilih property dalam object yaitu …",
    opsi: ["Variabel global tidak efisien dalam OOP", "Untuk menjaga struktur kode tetap procedural", "Untuk meningkatkan fleksibilitas inheritance", "Karena property hanya bisa dibuat di dalam object", "Untuk menjaga enkapsulasi dan modularitas program"]
  },
  {
    nomor: 4,
    pertanyaan: `<pre><code>class Kalkulator {
    public static function tambah($a, $b) {
        return $a + $b;
    }
}
echo Kalkulator::tambah(3, 5);</code></pre>
Fungsi penggunaan static pada method di atas adalah …`,
    opsi: ["Agar method hanya bisa dipanggil dalam class turunan", "Agar method dapat diakses tanpa membuat object", "Agar method bersifat private secara default", "Agar method tidak bisa diubah", "Agar method dijalankan otomatis saat class dibuat"]
  },
  {
  nomor: 5,
  pertanyaan: `Perhatikan kode program di bawah ini!<br><pre><code>class Kendaraan {
    final public function nyalakan() {
        return "Mesin menyala";
    }
}

class Mobil extends Kendaraan {
    public function nyalakan() {
        return "Mobil dinyalakan";
    }
}

$toyota = new Mobil();
echo $toyota->nyalakan();</code></pre>Yang akan terjadi jika kode di atas dijalankan adalah ...`,
  opsi: [
    "Kode berhasil dijalankan dan mencetak \\\"Mobil dinyalakan\\\"",
    "Method nyalakan pada Mobil menimpa method final",
    "Akan terjadi error karena method final tidak bisa ditimpa",
    "PHP mengabaikan method final",
    "Outputnya tetap \\\"Mesin menyala\\\""
  ]
},
  {
    nomor: 6,
    pertanyaan: "Yang akan terjadi jika method __construct() tidak dipanggil menggunakan parent::__construct() di class turunan adalah …",
    opsi: ["Program tetap berjalan seperti biasa", "Property dari induk akan diakses secara otomatis", "Konstruktor induk tidak dijalankan, sehingga property bisa tidak terisi", "Konstruktor induk akan tertimpa", "Property subclass akan mewarisi semua method induk"]
  },
  {
    nomor: 7,
    pertanyaan: "Keunggulan utama anonymous class dalam pengujian unit (unit testing) yaitu …",
    opsi: ["Lebih cepat dieksekusi", "Dapat digunakan untuk membuat object tanpa definisi class baru", "Bisa digunakan untuk menulis ulang interface", "Digunakan untuk serialisasi", "Bisa diakses dari luar file"]
  },
  {
    nomor: 8,
    pertanyaan: `<pre><code>$obj = new class {
    public $nilai = 100;
    public function tampil() {
        return $this->nilai;
    }
};
echo $obj->tampil();</code></pre>
Output dari kode di atas adalah …`,
    opsi: ["0", "NULL", "Error", "100", "tampil"]
  },
  {
    nomor: 9,
    pertanyaan: "Alasan anonymous class tidak cocok untuk digunakan berulang kali di banyak file yaitu …",
    opsi: ["Karena tidak bisa memiliki property", "Karena terlalu berat", "Karena tidak bisa di-serialize dan tidak memiliki nama", "Karena tidak mendukung inheritance", "Karena tidak dapat digunakan dalam loop"]
  },
  {
    nomor: 10,
    pertanyaan: "Fungsi get_object_vars() dalam introspeksi digunakan untuk...",
    opsi: ["Menampilkan semua class aktif", "Menampilkan properti yang telah diisi dalam object", "Menampilkan seluruh method", "Menampilkan subclass", "Menampilkan konstanta class"]
  },
  {
    nomor: 11,
    pertanyaan: `<pre><code>class User {
    public $nama = "Ayu";
    private $email = "a@example.com";
}

$user = new User();
print_r(get_object_vars($user));</code></pre>
Output dari kode di atas adalah …`,
    opsi: [
      "Menampilkan semua property termasuk private",
      "Menampilkan hanya public property nama",
      "Menampilkan isi method",
      "Menampilkan string kosong",
      "Menampilkan class User"
    ]
  },
  {
    nomor: 12,
    pertanyaan: "Fungsi introspeksi method_exists() dapat digunakan untuk...",
    opsi: [
      "Membuat method baru saat runtime",
      "Menentukan visibilitas property",
      "Mengecek apakah object memiliki method tertentu",
      "Menyalin class dari object",
      "Membuat anonymous class baru"
    ]
  },
  {
    nomor: 13,
    pertanyaan: `<pre><code>class Sesi {
    public $status = "aktif";
    public function __sleep() {
        return ['status'];
    }
}
$s = new Sesi();
echo serialize($s);</code></pre>
Hasil dari kode di atas adalah …`,
    opsi: [
      "\"aktif\"",
      "Objek kosong",
      "String representasi object hanya berisi properti status",
      "Error karena method __sleep() tidak mengembalikan array",
      "NULL"
    ]
  },
  {
    nomor: 14,
    pertanyaan: `<pre><code>class Data {
    public $pesan;
    public function __construct($p) {
        $this->pesan = $p;
    }
}

$d = new Data("Selamat datang!");
$s = serialize($d);
$o = unserialize($s);
echo $o->pesan;</code></pre>
Output dari program tersebut adalah …`,
    opsi: [
      "Menampilkan hanya public property nama",
      "NULL",
      "Error karena property tidak dikenali",
      "\"Selamat datang!\"",
      "\"Data\""
    ]
  },
  {
    nomor: 15,
    pertanyaan: `<pre><code>class Log {
    private $file;
    public function __wakeup() {
        $this->file = fopen("log.txt", "a");
    }
}
$log = unserialize(serialize(new Log()));</code></pre>
Yang dilakukan oleh program tersebut adalah …`,
    opsi: [
      "Menulis log ke file",
      "Membuka file setelah deserialisasi",
      "Menampilkan isi file",
      "Menutup koneksi database",
      "Error karena file tidak ditentukan"
    ]
  },
  {
    nomor: 16,
    pertanyaan: `<pre><code>1) return $a * $b;
2) echo $hasil->kali(3, 4);
3) $hasil = new class {
4) public function kali($a, $b) {
5) };</code></pre>
Urutan penyusunan yang benar adalah …`,
    opsi: [
      "3 - 4 - 1 - 5 - 2",
      "3 - 4 - 5 - 1 - 2",
      "3 - 1 - 4 - 5 - 2",
      "2 - 3 - 4 - 1 - 5",
      "1 - 4 - 3 - 5 - 2"
    ]
  },
  {
    nomor: 17,
    pertanyaan: `<pre><code>interface Operasi {
    public function jalankan();
}

$obj = new class ___ Operasi {
    public function ___() {
        return "Berhasil!";
    }
};

echo $obj->___();</code></pre>
Isi yang tepat untuk bagian kosong tersebut adalah …`,
    opsi: [
      "extends, jalankan, jalankan",
      "implements, jalankan, jalankan",
      "implements, run, run",
      "extends, run, run",
      "class, function, echo"
    ]
  },
  {
    nomor: 18,
    pertanyaan: `<pre><code>1) $hasil = new class { echo count($props);
2) $ref = new ReflectionClass("Tes");
3) $props = $ref->getProperties();
4) class Tes { private $x = 1; }</code></pre>
Urutan penyusunan yang benar adalah …`,
    opsi: [
      "4 - 2 - 3 - 1",
      "1 - 2 - 3 - 4",
      "2 - 3 - 4 - 1",
      "2 - 4 - 3 - 1",
      "4 - 3 - 2 - 1"
    ]
  },
  {
    nomor: 19,
    pertanyaan: `<pre><code>class Uji {
    public $nilai = 90;
}
$obj = new Uji();

if (___($obj, 'nilai')) {
    echo "Ada";
} else {
    echo "Tidak Ada";
}</code></pre>
Isi yang tepat untuk bagian kosong tersebut adalah …`,
    opsi: [
      "isset",
      "method_exists",
      "property_exists",
      "get_class_vars",
      "array_key_exists"
    ]
  },
  {
  nomor: 20,
  pertanyaan: `Lengkapilah kode berikut agar mencetak seluruh konstanta yang didefinisikan dalam class!<br><pre><code>class Matematika {
    const PI = 3.14;
    const E = 2.71;
}

print_r(___('Matematika'));</code></pre>Fungsi PHP yang tepat untuk melengkapi kode di atas adalah …`,
  opsi: [
    "get_class_constants",
    "get_constants",
    "class_constants",
    "get_class_vars",
    "get_defined_constants"
  ]
}
];


const kunci = [
  2, 3, 4, 1, 2, 2, 1, 3, 2, 1,
  1, 2, 2, 2, 1, 0, 1, 0, 2, 0
];


let jawaban = Array(soalData.length).fill(null);
let current = 0;
let waktu = 60 * 60;
let timerInterval;

function tampilkanSoal(index) {
  const soal = soalData[index];
  const container = document.getElementById('soal-container');
  container.innerHTML = `
    <div class="soal-box">
      <h5>SOAL ${soal.nomor}</h5>
      <p>${soal.pertanyaan.replace(/\n/g, '<br>')}</p>
      ${soal.opsi.map((o, i) => `
        <label class="opsi-item">
          <input type="radio" name="soal-${soal.nomor}" value="${i}" onchange="simpanJawaban(${index}, ${i})" ${jawaban[index] === i ? 'checked' : ''}>
          ${o}
        </label>`).join('')}
    </div>`;
}

function simpanJawaban(index, val) {
  jawaban[index] = val;
  document.querySelector(`#nav-${index}`).classList.add('dijawab');
  updateProgress();
  cekSelesai();
}

function updateProgress() {
  const terjawab = jawaban.filter(j => j !== null).length;
  const persen = (terjawab / soalData.length) * 100;
  document.getElementById('progress-bar').style.width = persen + '%';
  document.getElementById('progress-text').textContent = `${terjawab}/${soalData.length}`;
}

function cekSelesai() {
  const selesai = jawaban.every(j => j !== null);
  document.getElementById('btnSelesai').disabled = !selesai;
}

function buatNavigasi() {
  const nav = document.getElementById('nav-buttons');
  soalData.forEach((s, i) => {
    const btn = document.createElement('button');
    btn.textContent = s.nomor;
    btn.className = 'nav-soal';
    btn.id = `nav-${i}`;
    btn.onclick = () => {
      current = i;
      tampilkanSoal(i);
    };
    nav.appendChild(btn);
  });
}

function nextSoal() {
  if (current < soalData.length - 1) {
    current++;
    tampilkanSoal(current);
  }
}

function prevSoal() {
  if (current > 0) {
    current--;
    tampilkanSoal(current);
  }
}



function selesaiKuis() {
  const kunci = [2, 3, 4, 1, 3, 2, 1, 3, 2, 1, 1, 2, 2, 3, 1, 0, 1, 0, 2, 2];
  let skor = 0;

  jawaban = jawaban.map(j => j === null ? -1 : j);

  for (let i = 0; i < jawaban.length; i++) {
    if (jawaban[i] === kunci[i]) skor++;
  }

  const hasil = {
    total: soalData.length,
    benar: skor,
    waktu: document.getElementById('timer-kuis').textContent + " (otomatis)"
  };
  localStorage.setItem('hasilKuis', JSON.stringify(hasil));
  window.location.href = "/b63-heval";
}

function tampilkanModal() {
  const modal = new bootstrap.Modal(document.getElementById('modalKonfirmasi'));
  modal.show();
}

function prosesSelesai() {
  const kunci = [
  2, 3, 4, 1, 2, 2, 1, 3, 2, 1,
  1, 2, 2, 2, 1, 0, 1, 0, 2, 0
];
  let skorBenar = 0;

  for (let i = 0; i < jawaban.length; i++) {
    if (jawaban[i] === kunci[i]) skorBenar++;
  }

  const totalSoal = soalData.length;
  const skorFinal = Math.round((skorBenar / totalSoal) * 100);

  const hasil = {
    total: totalSoal,
    benar: skorBenar,
    waktu: document.getElementById('timer-kuis').textContent,
    skor2: skorFinal
  };
  localStorage.setItem('hasilKuis', JSON.stringify(hasil));

  fetch('/simpan-nilai-kuis', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
  },
  body: JSON.stringify({
    kuis_ke: 'evaluasi',
    skor: skorFinal,
    jawaban_json: {
      evaluasi: {
        benar: skorBenar,
        salah: totalSoal - skorBenar
      }
    }
  })
})

  .then(res => res.json())
  .then(data => {
    if (data.status === 'ok' || data.status === 'kkm_met') {
      window.location.href = "/b63-heval";
    } else {
      alert("Gagal menyimpan nilai. Silakan coba lagi.");
    }
  })
  .catch(err => {
    console.error("Gagal:", err);
    alert("Gagal menyimpan nilai. Silakan coba lagi.");
  });
}



document.addEventListener('DOMContentLoaded', () => {
  buatNavigasi();
  tampilkanSoal(current);
  mulaiTimer();
  updateProgress();
});
