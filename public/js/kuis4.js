// Ambil nilai KKM dari meta
const metaKKM = document.querySelector('meta[name="kkm"]');
const kkm = metaKKM ? parseInt(metaKKM.content) : 70;


const soalData = [
  {
  nomor: 1,
  tipe: "isian-urut",
  instruksi: `Susun potongan kode berikut agar menjadi program PHP yang tepat.<br>
Gunakan <code>class</code> bernama <code>Alat</code> dengan dua method: <code>hidupkan()</code> dan <code>matikan()</code>.<br>
Buat object dengan nama <code>$obj</code>, kemudian gunakan <code>get_class_methods()</code> untuk mencetak semua method yang tersedia pada class Alat.
<p><em><strong>Catatan:</strong> Terdapat dua baris dengan kurung kurawal tutup <code>}</code>. Untuk membantumu menyusun, perhatikan komentar di sampingnya yang menunjukkan penutup blok mana (class atau perulangan).</em></p> `,

  potongan: [
    "$methods = get_class_methods($obj);",            // index 6
    "public function hidupkan() {}",                  // index 2
    "echo $m . \"&lt;br&gt;\";",                      // index 8
    "class Alat {",                                   // index 1
    "foreach ($methods as $m) {",                     // index 7
    "$obj = new Alat();",                             // index 5
    "} // penutup class Alat",                        // index 4
    "} // penutup foreach",                           // index 9
    "public function matikan() {}",                   // index 3
  ],

  jawaban: [
    "class Alat {",                       // 1
    "public function hidupkan() {}",      // 2
    "public function matikan() {}",       // 3
    "} // penutup class Alat",            // 4
    "$obj = new Alat();",                 // 5
    "$methods = get_class_methods($obj);",// 6
    "foreach ($methods as $m) {",         // 7
    "echo $m . \"&lt;br&gt;\";",          // 8
    "} // penutup foreach"                // 9
  ]
},
  {
    nomor: 2,
    tipe: "isian",
    instruksi: "Lengkapilah kode berikut agar program dapat: 1) Mengecek apakah variabel $akun adalah object, 2) Mengecek apakah object tersebut memiliki method masuk(), 3) Jika ya, jalankan method tersebut dan cetak hasilnya.",
    kode: `class Akun {\n    public $username = \"hana\";\n    public function masuk() {\n        return \"Login berhasil.\";\n    }\n}\n$akun = new Akun();\nif (___($akun)) {\n    if (___($akun, \"masuk\")) {\n        echo $akun->___();\n    }\n}`,
    input: ["___", "___", "___"],
    jawaban: ["is_object", "method_exists", "masuk"]
  },
  {
    nomor: 3,
    tipe: "isian-urut",
    instruksi: "Susun potongan kode berikut agar menjadi program PHP yang tepat dan mencetak semua class yang tersedia dalam skrip, satu per baris.",
    potongan: [
      "echo $class . \"&lt;br&gt;\";",
      "$daftar = get_declared_classes();",
      "foreach ($daftar as $class) {",
      "&lt;?php",
      "}",
      "?&gt;"
    ],
    jawaban: ["&lt;?php", "$daftar = get_declared_classes();", "foreach ($daftar as $class) {", "echo $class . \"&lt;br&gt;\";", "}", "?&gt;"]
  },
  {
    nomor: 4,
    tipe: "drag-drop-isian",
    instruksi: "Lengkapilah bagian kosong agar program dapat menampilkan semua property (baik public maupun private) yang dideklarasikan dalam class User.",
    kode: `class User {\n    public $nama;\n    private $email;\n}\n$ref = new ___(\"User\");\n$props = $ref->___();\nforeach ($props as $p) {\n    echo $p->___() . \"&lt;br&gt;\";\n}`,
    drop: ["getProperties", "getName", "User", "ReflectionClass"],
    jawaban: ["ReflectionClass", "getProperties", "getName"]
  },
  {
    nomor: 5,
    tipe: "isian",
    instruksi: "Lengkapilah kode berikut agar program mencetak nama class induk dari object $produk.",
    kode: `class Barang {}\nclass Produk extends Barang {}\n\n$produk = new Produk();\n$induk = ___($produk);\n\necho \"Class induknya: \" . ($induk ? $induk : \"Tidak ada\");` ,
    input: ["___"],
    jawaban: ["get_parent_class"]
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

  if (soal.tipe === "isian-urut") {
    html += `<ol class='list-group'>${soal.potongan.map((p, i) => `<li class='list-group-item'>${i + 1}. ${p}</li>`).join('')}</ol>`;
    html += `<div class='mt-3'><label>Urutan jawaban:</label>
    <input type='text' id='input-urut-${index}' class='form-control' placeholder='Contoh: 1 2 3 4' oninput='simpanJawaban(${index})'></div>`;
  } else if (soal.tipe === "isian") {
    html += `<pre class='kode-box'>${highlightInput(soal.kode, soal.input.length)}</pre>`;
  } else if (soal.tipe === "drag-drop-isian") {
    html += `<pre class='kode-box'>${highlightDrop(soal.kode)}</pre>`;
    html += `<ul id='dragItems' class='list-group'>${soal.drop.map(val => `<li class='drag-item' draggable='true' data-value='${val}'>${val}</li>`).join('')}</ul>`;
  }

  html += '</div>';
  container.innerHTML = html;
  setTimeout(() => {
    if (jawaban[index]) {
      if (soal.tipe === "isian") {
        soal.input.forEach((_, i) => {
          const input = document.getElementById(`isian${i}`);
          if (input) input.value = jawaban[index][i] || "";
        });
      } else if (soal.tipe === "drag-drop-isian") {
        const drops = document.querySelectorAll(".drop-zone");
        drops.forEach((zone, i) => {
          zone.textContent = jawaban[index][i] || "___";
          zone.dataset.value = jawaban[index][i] || "";
        });
      } else if (soal.tipe === "isian-urut") {
        const input = document.getElementById(`input-urut-${index}`);
        if (input) input.value = jawaban[index];
      }
    }
    aktifkanDropZone();
  }, 10);
}

function simpanJawaban(index) {
  const soal = soalData[index];
  if (soal.tipe === "isian") {
    const inputs = document.querySelectorAll(".input-fill");
    jawaban[index] = Array.from(inputs).map(i => i.value.trim());
  } else if (soal.tipe === "drag-drop-isian") {
    const drops = document.querySelectorAll(".drop-zone");
    jawaban[index] = Array.from(drops).map(i => i.textContent.trim());
  } else if (soal.tipe === "isian-urut") {
    const input = document.getElementById(`input-urut-${index}`);
    jawaban[index] = input ? input.value.trim() : "";
  }
  document.getElementById(`nav-${index}`)?.classList.add("dijawab");
  updateProgress();
  cekSelesai();
}

function aktifkanDropZone() {
  let dragged = null;
  document.querySelectorAll('.drag-item').forEach(item => {
    item.addEventListener('dragstart', () => {
      dragged = item;
      item.classList.add('dragging');
    });
    item.addEventListener('dragend', () => item.classList.remove('dragging'));
  });
  document.querySelectorAll('.drop-zone').forEach(zone => {
    zone.addEventListener('dragover', e => e.preventDefault());
    zone.addEventListener('drop', e => {
      e.preventDefault();
      if (dragged) {
        zone.textContent = dragged.dataset.value;
        zone.dataset.value = dragged.dataset.value;
        simpanJawaban(current);
      }
    });
  });
}

function updateProgress() {
  const done = jawaban.filter(j => j !== null).length;
  const percent = (done / soalData.length) * 100;
  document.getElementById("progress-bar").style.width = percent + "%";
  document.getElementById("progress-text").textContent = `${done}/${soalData.length}`;
}

function cekSelesai() {
  const selesai = jawaban.every(j => j !== null);
  document.getElementById("btnSelesai").disabled = !selesai;
}

function cekJawabanBenar() {
  let totalNilai = 0;
  soalData.forEach((soal, i) => {
    const jwb = jawaban[i];
    if (!jwb) return;
    if (soal.tipe === "isian" || soal.tipe === "drag-drop-isian") {
      let benar = 0;
      soal.jawaban.forEach((ans, idx) => {
        if ((jwb[idx] || "").trim() === ans.trim()) benar++;
      });
      totalNilai += benar / soal.jawaban.length;
    } else if (soal.tipe === "isian-urut") {
      const userUrut = jwb.split(/\s+/).map(i => parseInt(i.trim()) - 1);
      const benarUrut = userUrut.every((val, idx) => {
        const dariPotongan = (soal.potongan[val] || "").replace(/\/\/.*$/, "").trim();
        const dariJawaban = (soal.jawaban[idx] || "").replace(/\/\/.*$/, "").trim();
        return dariPotongan === dariJawaban;
      });
      if (benarUrut) totalNilai += 1;
    }
  });
  return totalNilai;
}

function prosesSelesai() {
  const skorBenar = cekJawabanBenar();
  const totalSoal = soalData.length;
  const skorFinal = Math.round((skorBenar / totalSoal) * 100);

  // Simpan ke localStorage
  const hasil = {
    benar: skorBenar.toFixed(2),
    total: totalSoal,
    skor2: skorFinal
  };
  localStorage.setItem("hasilKuis", JSON.stringify(hasil));

  // Kirim ke server via fetch
  fetch('/simpan-nilai-kuis', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
      kuis_ke: 4, // KUIS 4
      skor: skorFinal,
      jawaban_json: {
      benar: skorBenar,
      salah: totalSoal - skorBenar
    }
    })
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'ok' || data.status === 'kkm_met') {
      window.location.href = "/b46-hkuis"; // halaman hasil kuis 4
    } else {
      alert("Gagal menyimpan nilai. Silakan coba lagi.");
    }
  })
  .catch(err => {
    console.error("Gagal:", err);
    alert("Terjadi kesalahan saat menyimpan nilai.");
  });
}


function tampilkanModal() {
  if (jawaban.includes(null)) {
    alert("Masih ada soal yang belum dijawab!");
    return;
  }
  const modal = new bootstrap.Modal(document.getElementById("modalKonfirmasi"));
  modal.show();
}

function buatNavigasi() {
  const nav = document.getElementById("nav-buttons");
  soalData.forEach((s, i) => {
    const btn = document.createElement("button");
    btn.textContent = s.nomor;
    btn.className = "nav-soal";
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


