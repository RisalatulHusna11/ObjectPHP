// Ambil nilai KKM dari meta
const metaKKM = document.querySelector('meta[name="kkm"]');
const kkm = metaKKM ? parseInt(metaKKM.content) : 70;


const soalData = [
  {
    nomor: 1,
    tipe: "isian-urut",
    instruksi: `Susunlah potongan kode berikut agar menjadi program PHP yang benar. Gunakan variabel bernama <code>$objek</code>, yang merupakan object dari anonymous class. Class tersebut memiliki method <code>sapa()</code> yang mengembalikan teks <code>"Halo dari anonymous class!"</code>.`,
    potongan: [
      "echo $objek->sapa();",
      "public function sapa() {",
      "return \"Halo dari anonymous class!\";",
      "$objek = new class() {",
      "}",
      "};"
    ],
    jawaban: [
      "$objek = new class() {",
      "public function sapa() {",
      "return \"Halo dari anonymous class!\";",
      "}",
      "};",
      "echo $objek->sapa();"
    ]
  },
  {
    nomor: 2,
    tipe: "isian",
    instruksi: `Lengkapilah bagian kosong pada kode berikut agar program mencetak <code>"Barang spesial dikemas."</code>. Gunakan <code>class Barang</code> sebagai induk dan buat anonymous class yang mewarisi serta meng-override method <code>kemas()</code>.`,
    kode: ` class Barang {
    public function kemas() {
        return "Barang dikemas.";
    }
}

$produk = new class() ___ Barang {
    public function ___() {
        return "Barang spesial dikemas.";
    }
};

echo $produk->___();`,
    input: ["extends", "kemas", "kemas"],
    jawaban: ["extends", "kemas", "kemas"]
  },
  {
    nomor: 3,
    tipe: "drag-drop-urutan",
    instruksi: `Susunlah potongan kode berikut menjadi program PHP yang benar. Gunakan variabel <code>$obj</code> sebagai object dari anonymous class yang memiliki property <code>$angka = 10</code> dan method <code>ambilNilai()</code> yang mengembalikan "Nilai: 10", kemudian cetak hasilnya.`,
    potongan: [
      "return \"Nilai: \" . $this->angka;",
      "public $angka = 10;",
      "$obj = new class() {",
      "echo $obj->ambilNilai();",
      "public function ambilNilai() {",
      "};",
      "}"
    ],
    jawaban: [
      "$obj = new class() {",
      "public $angka = 10;",
      "public function ambilNilai() {",
      "return \"Nilai: \" . $this->angka;",
      "}",
      "};",
      "echo $obj->ambilNilai();"
    ]
  },
  {
    nomor: 4,
    tipe: "drag-drop-isian",
    instruksi: `Lengkapilah kode berikut agar anonymous class berhasil mengimplementasikan interface <code>View</code> dan mencetak <code>"Menampilkan halaman..."</code>.`,
    kode: `interface View {
    public function render();
}
$page = new class() ___ View {
    public function ___() {
        echo "Menampilkan halaman...";
    }
};
$page->___();`,
    drop: ["View","implements", "render"],
    jawaban: ["implements", "render", "render"]
  },
  {
    nomor: 5,
    tipe: "isian-urut",
    instruksi: `Susunlah potongan kode berikut agar menjadi program PHP yang benar. Buat anonymous class dengan constructor yang menerima parameter <code>$nama</code>. Gunakan object <code>$ucapan</code> untuk mencetak <code>"Selamat datang, Hana!"</code> menggunakan method <code>tampil()</code>.`,
    potongan: [
      "private $nama;",
      "return \"Selamat datang, \" . $this->nama . \"!\";",
      "public function __construct($nama) {",
      "echo $ucapan->tampil();",
      "public function tampil() {",
      "$ucapan = new class(\"Hana\") {",
      "}",
      "$this->nama = $nama;"
    ],
    jawaban: [
      "$ucapan = new class(\"Hana\") {",
      "private $nama;",
      "public function __construct($nama) {",
      "$this->nama = $nama;",
      "public function tampil() {",
      "return \"Selamat datang, \" . $this->nama . \"!\";",
      "}",
      "echo $ucapan->tampil();"
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
    jawaban[index] = arr.length > 0 ? arr : null;
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

// Tambahkan prosesSelesai untuk Kuis 3 agar menyimpan nilai ke database dan arahkan ke hasil kuis 3

window.prosesSelesai = function () {
  const skorBenar = cekJawabanBenar();
  const totalSoal = soalData.length;
  const skorFinal = Math.round((skorBenar / totalSoal) * 100);

  const hasil = {
    benar: skorBenar.toFixed(2),
    total: totalSoal,
    skor2: skorFinal
  };
  localStorage.setItem('hasilKuis', JSON.stringify(hasil));

  // ✅ Buat refleksi
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
      const urutanUser = jwb.split(/\s+/).map(x => parseInt(x) - 1);
      const benarUrut = urutanUser.every((val, idx) => {
        const dariPotongan = (soal.potongan[val] || "").replace(/\s+/g, "").replace(/;$/, "");
        const dariJawaban = (soal.jawaban[idx] || "").replace(/\s+/g, "").replace(/;$/, "");
        return dariPotongan === dariJawaban;
      });
      benar = benarUrut;
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

  // ✅ Kirim ke server
  fetch('/simpan-nilai-kuis', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
      kuis_ke: 3,
      skor: skorFinal,
      jawaban_json: {
        benar: skorBenar,
        salah: totalSoal - skorBenar,
        tipe: 'kuis_3',
        jawaban: jawaban,
        refleksi: refleksi  // <== tambahkan ini!
      }
    })
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'ok' || data.status === 'kkm_met') {
      window.location.href = "/b34-hkuis";
    } else {
      alert("Gagal menyimpan nilai. Silakan coba lagi.");
    }
  })
  .catch(err => {
    console.error("Gagal:", err);
    alert("Gagal menyimpan nilai. Silakan coba lagi.");
  });
};


function cekJawabanBenar() {
  let totalNilai = 0;

  soalData.forEach((soal, i) => {
    const jwb = jawaban[i];
    if (!jwb) return;
      if (soal.tipe === "drag-drop-urutan") {
        if (Array.isArray(jwb)) {
          const benarUrut = jwb.every((item, idx) => {
            const a = item.replace(/\s+/g, "").replace(/;$/, "");
            const b = (soal.jawaban[idx] || "").replace(/\s+/g, "").replace(/;$/, "");
            return a === b;
          });
          if (benarUrut) totalNilai += 1;
        }
  } else if (soal.tipe === "isian-urut") {
  if (typeof jwb === "string" && jwb.match(/^\d+(\s+\d+)*$/)) {
    const urutanUser = jwb.split(/\s+/).map(x => parseInt(x) - 1);
    const benarUrut = urutanUser.every((val, idx) => {
      const dariPotongan = (soal.potongan[val] || "").replace(/\s+/g, "").replace(/;$/, "");
      const dariJawaban = (soal.jawaban[idx] || "").replace(/\s+/g, "").replace(/;$/, "");
      return dariPotongan === dariJawaban;
    });
    if (benarUrut) totalNilai += 1;
  }
}


     else if (soal.tipe === "drag-drop-isian" || soal.tipe === "isian") {
      if (Array.isArray(jwb) && Array.isArray(soal.jawaban)) {
        let benar = 0;
        for (let k = 0; k < soal.jawaban.length; k++) {
          if ((jwb[k] || '').trim() === soal.jawaban[k].trim()) {
            benar++;
          }
        }
        totalNilai += benar / soal.jawaban.length;
      }
    }
  });

  return totalNilai;
}




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
