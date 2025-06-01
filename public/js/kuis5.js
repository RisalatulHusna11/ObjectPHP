// Ambil nilai KKM dari meta
const metaKKM = document.querySelector('meta[name="kkm"]');
const kkm = metaKKM ? parseInt(metaKKM.content) : 70;


const soalData = [
  {
    nomor: 1,
    tipe: "isian",
    instruksi: "Lengkapilah kode program berikut agar object dari class Catatan dapat disimpan di dalam sesi menggunakan serialisasi. Pastikan object tetap dapat digunakan meskipun halaman di-refresh.",
    kode: `session_start();\nclass Catatan {\n    private $pesan;\n    public function __construct($pesan) {\n        $this->___ = $pesan;\n    }\n    public function tampil() {\n        return \"Catatan: \" . $this->pesan;\n    }\n}\nif (!isset($_SESSION['catatan'])) {\n    $objek = new Catatan(\"Belajar PHP Serialization\");\n    $_SESSION['catatan'] = ___($objek);\n    echo \"Object dibuat dan disimpan dalam sesi.<br>\";\n} else {\n    $objek = ___($_SESSION['catatan']);\n    echo \"Object diambil dari sesi:<br>\";\n    echo $objek->___();\n}`,
    input: ["___", "___", "___", "___"],
    jawaban: ["pesan", "serialize", "unserialize", "tampil"]
  },
  {
  nomor: 2,
  tipe: "drag-drop-urutan",
  instruksi: `Susunlah potongan kode berikut agar menjadi program PHP yang benar.<br>
Program ini mendefinisikan <code>class Data</code>, kemudian membuat object darinya, menyimpannya dengan <code>serialize()</code>, dan mengembalikannya dengan <code>unserialize()</code>.<br>
Terakhir, program mencetak hasil dari method <code>tampil()</code>.
<p><em><strong>Catatan:</strong> Terdapat dua baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (method atau class).</em></p>`,

  potongan: [
    "echo \"Hasil: \" . $dataBaru->tampil();",
    "$dataBaru = unserialize($hasilSerial);",
    "$hasilSerial = serialize($data);",
    "class Data {",
    "$data = new Data();",
    "return \"Data berhasil diproses.\";",
    "public function tampil() {",
    "} // penutup method tampil()",
    "} // penutup class Data"
  ],

  jawaban: [
    "class Data {",
    "public function tampil() {",
    "return \"Data berhasil diproses.\";",
    "} // penutup method tampil()",
    "} // penutup class Data",
    "$data = new Data();",
    "$hasilSerial = serialize($data);",
    "$dataBaru = unserialize($hasilSerial);",
    "echo \"Hasil: \" . $dataBaru->tampil();"
  ]
},
  {
  nomor: 3,
  tipe: "isian-urut",
  instruksi: `Susun potongan kode agar menjadi program PHP yang benar.<br>
Program ini membuat <code>class Arsip</code> dengan dua properti.<br>
Saat object diserialisasi, hanya property <code>judul</code> yang disimpan dengan bantuan method <code>__sleep()</code>.<br>
<p><em><strong>Catatan:</strong> Terdapat tiga baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (fungsi atau class).</em></p>`,

  potongan: [
    "class Arsip {",
    "public $judul = \"Catatan Rahasia\";",
    "private $file;",
    "public function __sleep() {",
    "return ['judul'];",
    "} // penutup function __sleep()",
    "echo serialize(new Arsip());",
    "} // penutup class Arsip",
    "} // penutup akhir program"
  ],

  jawaban: [
    "class Arsip {",
    "public $judul = \"Catatan Rahasia\";",
    "private $file;",
    "public function __sleep() {",
    "return ['judul'];",
    "} // penutup function __sleep()",
    "} // penutup class Arsip",
    "} // penutup akhir program",
    "echo serialize(new Arsip());"
  ]
},
  {
    nomor: 4,
    tipe: "isian",
    instruksi: "Lengkapilah kode agar saat object dari class RiwayatLogin diserialisasi, hanya properti tertentu yang disimpan. Gunakan magic method __sleep() dan __wakeup() untuk mengelola file log login pengguna.",
    kode: `class RiwayatLogin {\n    private $___;\n    public function __sleep() {\n        return ['___'];\n    }\n    public function __wakeup() {\n        $this->___();\n    }\n    private function ___() {\n        echo \"File log dibuka kembali.\";\n    }\n}`,
    input: ["___", "___", "___", "___"],
    jawaban: ["handle", "bukaFile", "file", "bukaFile"]
  },
  {
  nomor: 5,
  tipe: "isian-urut",
  instruksi: `Susunlah kode berikut agar program membuat object dari <code>class Log</code>, lalu diserialisasi dan di-unserialize.<br>
Saat deserialisasi, method <code>__wakeup()</code> dipanggil otomatis untuk membuka kembali file atau resource.<br>
<p><em><strong>Catatan:</strong> Terdapat tiga baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (fungsi atau class).</em></p>`,

  potongan: [
    "private function aktifkan() {",
    "echo \"Log aktif kembali.\\n\";",
    "public function __wakeup() {",
    "class Log {",
    "$logBaru = unserialize(serialize(new Log()));",
    "} // penutup function aktifkan()",
    "return $this->aktifkan();",
    "} // penutup function __wakeup()",
    "} // penutup class Log"
  ],

  jawaban: [
    "class Log {",
    "private function aktifkan() {",
    "echo \"Log aktif kembali.\\n\";",
    "} // penutup function aktifkan()",
    "public function __wakeup() {",
    "return $this->aktifkan();",
    "} // penutup function __wakeup()",
    "} // penutup class Log",
    "$logBaru = unserialize(serialize(new Log()));"
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
  html += `<ol class="list-group">`;
  soal.potongan.forEach((isi, i) => {
    html += `<li class="list-group-item">${i + 1}. ${isi}</li>`;
  });
  html += `</ol>`;
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
    item.addEventListener('dragend', () => item.classList.remove('dragging'));
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
        simpanJawaban(current);
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
        simpanJawaban(current);
      }
    });
  });
}

function simpanJawaban(index) {
  const soal = soalData[index];
  if (soal.tipe === "isian") {
    const inputs = document.querySelectorAll(".input-fill");
    jawaban[index] = Array.from(inputs).map(i => i.value.trim());
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
  document.getElementById(`nav-${index}`)?.classList.add('dijawab');
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
    if (soal.tipe === "drag-drop-urutan") {
  if (Array.isArray(jwb)) {
    const benarUrutan = jwb.every((item, idx) => {
      const dariPotongan = (soal.potongan.find(p => p === item) || "").replace(/\/\/.*$/, "").trim();
      const dariJawaban = (soal.jawaban[idx] || "").replace(/\/\/.*$/, "").trim();
      return dariPotongan === dariJawaban;
    });
    if (benarUrutan) totalNilai += 1;
  }
} else if (soal.tipe === "drag-drop-isian" || soal.tipe === "isian") {
      if (Array.isArray(jwb) && Array.isArray(soal.jawaban)) {
        let benar = 0;
        for (let k = 0; k < soal.jawaban.length; k++) {
          if ((jwb[k] || '').trim() === soal.jawaban[k].trim()) {
            benar++;
          }
        }
        totalNilai += benar / soal.jawaban.length;
      }
    } else if (soal.tipe === "isian-urut") {
      const userUrut = jwb.split(/\s+/).map(i => parseInt(i.trim()) - 1);
      const benarUrut = userUrut.every((val, idx) => soal.potongan[val]?.trim() === soal.jawaban[idx]?.trim());
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
    skor2
  };
  localStorage.setItem('hasilKuis', JSON.stringify(hasil));

  // Kirim ke server via fetch
  fetch('/simpan-nilai-kuis', { 
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
      kuis_ke: 5, // GANTI sesuai nomor kuisnya (1–5)
      skor: skor2,
      jawaban_json: {
      benar: skorBenar,
      salah: totalSoal - skorBenar
    }
    })
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'ok') {
      window.location.href = "/b54-hkuis"; // GANTI sesuai halaman hasil kuis
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
  mulaiTimer();
});


