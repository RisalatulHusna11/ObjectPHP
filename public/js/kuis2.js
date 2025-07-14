// Ambil nilai KKM dari meta
const metaKKM = document.querySelector('meta[name="kkm"]');
const kkm = metaKKM ? parseInt(metaKKM.content) : 70;


const soalData = [
  {
  nomor: 1,
  tipe: "drag-drop-urutan", // Menandakan tipe soal adalah menyusun potongan kode dengan sistem drag-and-drop
instruksi: "Susunlah potongan-potongan kode berikut agar membentuk program PHP yang lengkap dan benar.<br><br>Program ini menggunakan sebuah <strong>class</strong> bernama <code>Verifikasi</code> yang berisi <strong>konstanta</strong> <code>MINIMUM_UMUR</code> dengan nilai <code>17</code>. Setelah class didefinisikan, program akan menampilkan nilai konstanta tersebut menggunakan <em>scope resolution operator</em> (<code>::</code>).<br><br><em>Cara menjawab:</em> Klik dua kali pada potongan kode, lalu <strong>seret ke posisi yang sesuai</strong> menggunakan fitur <em>drag-and-drop</em>. Susun hingga urutan kode membentuk struktur program PHP yang benar.",

  potongan: [
    "const MINIMUM_UMUR = 17;",           // Potongan kode yang akan diacak di UI
    "class Verifikasi {",                 // Semua potongan ini akan ditampilkan acak untuk disusun ulang
    "echo Verifikasi::MINIMUM_UMUR;",
    "}",
  ],

  jawaban: [
    "class Verifikasi {",                 // Urutan jawaban benar yang akan digunakan untuk pengecekan
    "const MINIMUM_UMUR = 17;",
    "}",
    "echo Verifikasi::MINIMUM_UMUR;"
  ]
},
  {
    nomor: 2,
    tipe: "drag-drop-isian",
    instruksi: "Lengkapilah bagian-bagian kosong pada kode program berikut agar dapat berjalan dengan benar.<br><br>Program ini terdiri dari sebuah <strong>interface</strong> bernama <code>Cetak</code> dan sebuah <strong>class</strong> bernama <code>Dokumen</code> yang mengimplementasikan interface tersebut. Lengkapi bagian kosong dengan <strong>kata kunci</strong> atau <strong>nama method</strong> yang tepat agar program dapat mencetak teks <code>Dokumen dicetak.</code><br><br><em>Cara menjawab:</em> Klik dua kali pada potongan kata di bawah, lalu <strong>seret ke dalam kotak kosong</strong> yang sesuai.",
    kode: `interface Cetak {
    public function tampil();
}
class Dokumen ___ Cetak {
    public function ___() {
        echo "Dokumen dicetak.";
    }
}
$laporan = new Dokumen();
$laporan->___();`,
    drop: ["implements", "Dokumen", "tampil"],
    jawaban: ["implements", "tampil", "tampil"]
  },
  {
    nomor: 3,
    tipe: "isian",
    instruksi: "Lengkapilah bagian-bagian kosong pada class berikut agar program dapat menghitung berapa banyak object yang telah dibuat.<br><br>Class <code>Penghitung</code> memiliki <strong>static property</strong> bernama <code>$jumlah</code>. Setiap kali object baru dibuat, nilai <code>$jumlah</code> akan bertambah 1. Nilai ini kemudian ditampilkan melalui method <code>tampilkan()</code>.<br><br><em>Cara menjawab:</em> Isilah bagian kosong yang tersedia dengan <strong>kata kunci</strong> atau <strong>nama class</strong> yang sesuai agar program dapat berjalan dengan benar.",
    kode: `class Penghitung {
    public static $jumlah = 0;
    public function __construct() {
        ___::$jumlah++;
    }
    public static function tampilkan() {
        echo "Jumlah saat ini: " . ___::$jumlah;
    }
}`,
    input: ["self", "self"],
    jawaban: ["self", "self"]
  },
  {
  nomor: 4,
  tipe: "isian-urut",
  instruksi: `
Susunlah potongan-potongan kode berikut agar menjadi program PHP yang benar dan dapat dijalankan.<br><br>
Kamu akan membuat sebuah <strong>class</strong> bernama <code>Hewan</code> dengan <strong>properti</strong> <code>$jenis</code> bernilai <code>"Kucing"</code>, serta sebuah <strong>method</strong> <code>info()</code> yang mengembalikan informasi jenis hewan tersebut.<br><br>

<em><strong>Petunjuk:</strong> Terdapat tiga baris dengan kurung kurawal tutup <code>}</code>. Perhatikan komentar yang menyertainya untuk mengetahui penutup blok mana (<code>method</code> atau <code>class</code>). Susun urutannya secara logis agar program dapat berjalan tanpa error.</em><br><br>

<em><strong>Cara menjawab:</strong> Ketik urutan angka dari baris-baris kode sesuai susunan program PHP yang benar. Gunakan spasi sebagai pemisah. Contoh penulisan: <code>1 3 2 4 5</code>.</em>
`
,
  potongan: [
    "echo (new Hewan())->info();",
    "public $jenis = \"Kucing\";",
    "public function info() {",
    "class Hewan {",
    "return \"Jenis hewan: \" . $this->jenis;",
    "} // penutup method info()",
    "} // penutup class Hewan",
    "?>",
    "&lt;?php"
  ],
  jawaban: [
    "&lt;?php",
    "class Hewan {",
    "public $jenis = \"Kucing\";",
    "public function info() {",
    "return \"Jenis hewan: \" . $this->jenis;",
    "} // penutup method info()",
    "} // penutup class Hewan",
    "echo (new Hewan())->info();",
    "?>"
  ]
},
  {
  nomor: 5,
  tipe: "isian-urut",
  instruksi: `
Susun potongan-potongan kode berikut agar menjadi program PHP yang benar.<br><br>
Kamu akan membuat sebuah <strong>class</strong> bernama <code>Rekening</code> yang memiliki <strong>properti</strong> <code>$saldo</code> dengan nilai <code>5000</code>, serta sebuah <strong>method</strong> <code>lihatSaldo()</code> yang mengembalikan teks saldo.<br><br>

<em><strong>Catatan:</strong> Terdapat tiga baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (<code>function</code> atau <code>class</code>).</em><br><br>

<em><strong>Cara menjawab:</strong> Ketik urutan angka dari baris-baris kode sesuai susunan program PHP yang benar. Gunakan spasi sebagai pemisah. Contoh penulisan: <code>1 3 2 4 5</code>.</em>
`,
  potongan: [
    "echo $akun->lihatSaldo();",
    "class Rekening {",
    "public $saldo = 5000;",
    "public function lihatSaldo() {",
    "return \"Saldo: Rp. \" . $this->saldo;",
    "} // penutup function lihatSaldo()",
    "} // penutup class Rekening",
    "$akun = new Rekening();",
    "&lt;?php",
    "?&gt;"
  ],
  jawaban: [
    "&lt;?php",
    "class Rekening {",
    "public $saldo = 5000;",
    "public function lihatSaldo() {",
    "return \"Saldo: Rp. \" . $this->saldo;",
    "} // penutup function lihatSaldo()",
    "} // penutup class Rekening",
    "$akun = new Rekening();",
    "echo $akun->lihatSaldo();",
    "?&gt;"
  ]
}

];

let jawaban = Array(soalData.length).fill(null);
let current = 0;

function highlightDrop(code) {
  let count = 0;
  return code.replace(/___/g, () => `<span class='drop-zone' id='drop${count}' data-value=''>___</span>`);
}

function highlightInput(code, jumlah) {
  let count = 0;
  return code.replace(/___/g, () => {
    return `<input type='text' class='input-fill small' id='isian${count++}' placeholder='...' oninput='simpanJawaban(${current}, true)'>`;
  });
}

function tampilkanSoal(index) {
  const soal = soalData[index];
  const container = document.getElementById('soal-container');

  let html = `<div class="soal-box">
    <h5>SOAL ${soal.nomor}</h5>
    <p>${soal.instruksi}</p>`;

  if (soal.tipe === "drag-drop-urutan") {
    html += '<ul class="list-group" id="urutan-soal">';
    const acak = [...soal.potongan].sort(() => Math.random() - 0.5);
    acak.forEach((isi, i) => {
      html += `<li class="list-group-item" draggable="true" data-index="${i}">${isi}</li>`;
    });
    html += '</ul>';
  } else if (soal.tipe === "drag-drop-isian") {
    html += `<pre class="kode-box">${highlightDrop(soal.kode)}</pre>`;
    html += `<ul id="dragItems" class="list-group">${soal.drop.map(val => `<li class="drag-item" draggable="true" data-value="${val}">${val}</li>`).join('')}</ul>`;
  } else if (soal.tipe === "isian") {
    html += `<pre class="kode-box">${highlightInput(soal.kode, soal.input.length)}</pre>`;
  } else if (soal.tipe === "isian-urut") {
    html += `<ol class="list-group">${soal.potongan.map((isi, i) => `<li class="list-group-item">${i + 1}. ${isi}</li>`).join('')}</ol>`;
    html += `<div class="mt-3"><label>Urutan jawaban:</label>
      <input type="text" id="input-urut-${index}" class="form-control" placeholder="Contoh: 1 2 3 4" oninput="simpanJawaban(${index}, true)">
    </div>`;
  }

  html += '</div>';
  container.innerHTML = html;

  setTimeout(() => {
    if (jawaban[index]) {
      if (soal.tipe === "isian") {
        soal.input.forEach((_, idx) => {
          const input = document.getElementById(`isian${idx}`);
          if (input) input.value = jawaban[index][idx] || "";
        });
      } else if (soal.tipe === "drag-drop-isian") {
        const drops = document.querySelectorAll(".drop-zone");
        drops.forEach((zone, idx) => {
          zone.textContent = jawaban[index][idx] || "___";
          zone.dataset.value = jawaban[index][idx] || "";
        });
      } else if (soal.tipe === "drag-drop-urutan") {
        const ul = document.getElementById("urutan-soal");
        ul.innerHTML = "";
        jawaban[index].forEach((isi, i) => {
          const li = document.createElement("li");
          li.className = "list-group-item";
          li.textContent = isi;
          li.setAttribute("draggable", "true");
          li.setAttribute("data-index", i);
          ul.appendChild(li);
        });
        aktifkanDragDrop();
      } else if (soal.tipe === "isian-urut") {
        const input = document.getElementById(`input-urut-${index}`);
        if (input) input.value = jawaban[index];
      }
    }
    aktifkanDragDrop();
    aktifkanDropZone();
  }, 10);
}

function aktifkanDragDrop() {
  const items = document.querySelectorAll('#urutan-soal .list-group-item');
  let dragged;
  items.forEach(item => {
    item.addEventListener('dragstart', () => {
      dragged = item;
      item.classList.add('dragging');
    });
    item.addEventListener('dragend', () => {
      item.classList.remove('dragging');
    });
    item.addEventListener('dragover', e => e.preventDefault());
    item.addEventListener('drop', e => {
      e.preventDefault();
      if (dragged && dragged !== item) {
        const parent = item.parentNode;
        const siblings = Array.from(parent.children);
        const from = siblings.indexOf(dragged);
        const to = siblings.indexOf(item);
        if (from < to) {
          parent.insertBefore(dragged, item.nextSibling);
        } else {
          parent.insertBefore(dragged, item);
        }
        simpanJawaban(current, true);
      }
    });
  });
}

function aktifkanDropZone() {
  let draggedItem = null;
  document.querySelectorAll('.drag-item').forEach(item => {
    item.addEventListener('dragstart', () => {
      draggedItem = item;
      item.classList.add('dragging');
    });
    item.addEventListener('dragend', () => item.classList.remove('dragging'));
  });

  document.querySelectorAll('.drop-zone').forEach(zone => {
    zone.addEventListener('dragover', e => e.preventDefault());
    zone.addEventListener('drop', e => {
      e.preventDefault();
      if (draggedItem) {
        zone.textContent = draggedItem.dataset.value;
        zone.dataset.value = draggedItem.dataset.value;
        simpanJawaban(current, true);
      }
    });
  });
}

function simpanJawaban(index) {
  const soal = soalData[index];
  if (soal.tipe === "isian") {
  const inputs = document.querySelectorAll(".input-fill");
  const arr = Array.from(inputs).map(i => i.value.trim());
  jawaban[index] = arr.length > 0 ? arr : null; // pastikan array bukan null
} else if (soal.tipe === "drag-drop-isian") {
    const drops = document.querySelectorAll(".drop-zone");
    jawaban[index] = Array.from(drops).map(i => i.textContent.trim());
  } else if (soal.tipe === "drag-drop-urutan") {
    const urutan = document.querySelectorAll("#urutan-soal .list-group-item");
    jawaban[index] = Array.from(urutan).map(i => i.textContent.trim());
  } else if (soal.tipe === "isian-urut") {
    const urut = document.getElementById(`input-urut-${index}`);
    jawaban[index] = urut ? urut.value.trim() : "";
  }

  document.querySelector(`#nav-${index}`)?.classList.add('dijawab');
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

function cekJawabanBenar() {
  let totalNilai = 0;

  soalData.forEach((soal, i) => {
    const jwb = jawaban[i];
    if (!jwb) return;

    // Mengecek apakah tipe soal adalah drag and drop dengan urutan
    if (soal.tipe === "drag-drop-urutan") {

      // Memastikan panjang jawaban sama dengan kunci, 
      // dan setiap elemen jawaban sesuai urutan dengan kunci jawaban
      const benarUrutan = jwb.length === soal.jawaban.length &&
        jwb.every((val, idx) => val.trim() === soal.jawaban[idx].trim());

      // Jika urutan benar, tambahkan 1 poin ke total nilai
      if (benarUrutan) totalNilai += 1;
    }

    
    // Mengecek apakah tipe soal adalah "drag-drop-isian" atau "isian"
    else if (soal.tipe === "drag-drop-isian" || soal.tipe === "isian") {

      // Memastikan bahwa baik jawaban pengguna (jwb) maupun kunci jawaban (soal.jawaban) berupa array
      if (Array.isArray(jwb) && Array.isArray(soal.jawaban)) {
        let benar = 0; // Variabel penghitung jawaban yang benar

        // Melakukan perulangan untuk membandingkan setiap elemen jawaban
        for (let k = 0; k < soal.jawaban.length; k++) {
          // Jika jawaban pengguna pada indeks ke-k sama (setelah di-trim) dengan kunci jawaban, tambahkan ke jumlah benar
          if ((jwb[k] || '').trim() === soal.jawaban[k].trim()) {
            benar++;
          }
        }

        // Menambahkan skor parsial ke total nilai (proporsional terhadap jumlah jawaban yang benar)
        totalNilai += benar / soal.jawaban.length;
      }
    }


    // Mengecek apakah tipe soal adalah isian-urut (jawaban berupa urutan angka)
    else if (soal.tipe === "isian-urut") {

      // Mengubah input pengguna menjadi array indeks (misalnya: input "3 1 2" menjadi [2, 0, 1])
      const userUrut = jwb.split(/\s+/).map(i => parseInt(i.trim()) - 1);

      // Mengecek apakah urutan potongan sesuai dengan kunci jawaban
      const benarUrut = userUrut.every((val, idx) => soal.potongan[val]?.trim() === soal.jawaban[idx]?.trim());

      // Jika benar, tambahkan skor
      if (benarUrut) totalNilai += 1;
    }

  });

  return totalNilai;
}



window.prosesSelesai = function () {
  const skorBenar = cekJawabanBenar(); // pastikan ini fungsi yang sudah kamu buat
  const totalSoal = soalData.length;
  const skor2 = Math.round((skorBenar / totalSoal) * 100);

  // Simpan ke localStorage (untuk ditampilkan di halaman hasil)
  const hasil = {
    benar: skorBenar.toFixed(2),
    total: totalSoal,
    skor2,
    jawaban_json: {
      benar: skorBenar,
      salah: totalSoal - skorBenar
    }
  };
  localStorage.setItem('hasilKuis', JSON.stringify(hasil));

  let refleksi = [];

soalData.forEach((soal, i) => {
  const jwb = jawaban[i];
  let benar = false;

  if (soal.tipe === "isian" || soal.tipe === "drag-drop-isian") {
    if (Array.isArray(jwb) && Array.isArray(soal.jawaban)) {
      benar = soal.jawaban.every((val, idx) => (jwb[idx] || '').trim() === val.trim());
    }
  } else if (soal.tipe === "drag-drop-urutan") {
    benar = Array.isArray(jwb) &&
            jwb.length === soal.jawaban.length &&
            jwb.every((val, idx) => val.trim() === soal.jawaban[idx].trim());
  } else if (soal.tipe === "isian-urut") {
    const userUrut = jwb.split(/\s+/).map(i => parseInt(i.trim()) - 1);
    benar = userUrut.every((val, idx) => soal.potongan[val]?.trim() === soal.jawaban[idx]?.trim());
  }

  refleksi.push({
    tipe: soal.tipe,
    jawaban: jwb,
    benar: benar
  });
});

if (!jawaban || jawaban.length === 0) {
  alert("Jawaban tidak ditemukan, mohon pastikan semua soal telah dijawab.");
  return;
}

  // Kirim ke server via fetch
  fetch('/simpan-nilai-kuis', { 
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
      kuis_ke: 2, // GANTI sesuai nomor kuisnya (1–5)
      skor: skor2,
      jawaban_json: {
      benar: skorBenar,
      salah: totalSoal - skorBenar,
      tipe: 'kuis_2',
      jawaban: jawaban,
      refleksi: refleksi
    }
    })
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'ok') {
      window.location.href = "/b212-hkuis"; // GANTI sesuai halaman hasil kuis
    } else {
      alert("Gagal menyimpan nilai. Silakan coba lagi.");
    }
  })
  .catch(err => {
    console.error("Gagal:", err);
    alert("Gagal menyimpan nilai. Silakan coba lagi.");
  });
};

function tampilkanModal() {
  if (jawaban.includes(null)) {
    alert("Masih ada soal yang belum dijawab!");
    return;
  }
  const modal = new bootstrap.Modal(document.getElementById('modalKonfirmasi'));
  modal.show();
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

document.addEventListener('DOMContentLoaded', () => {
  buatNavigasi();
  tampilkanSoal(current);
  updateProgress();
  mulaiTimer(); // ⏱️ mulai hitung waktu
});




