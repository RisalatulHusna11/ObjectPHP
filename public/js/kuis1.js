
// Ambil nilai KKM dari meta
const metaKKM = document.querySelector('meta[name="kkm"]');
const kkm = metaKKM ? parseInt(metaKKM.content) : 70;


const soalData = [
  {
    nomor: 1,
    pertanyaan: "Istilah yang digunakan untuk mendeskripsikan cetak biru dari sebuah object dalam OOP adalah …",
    opsi: ["Object", "Method", "Property", "Class", "Trait"]
  },
  {
    nomor: 2,
    pertanyaan: `Perhatikan potongan kode berikut!\nclass Buku {\n    public $judul;\n}\n\n$novel = new Buku;\n$novel->judul = \"Laskar Pelangi\";\nCara menampilkan nilai property judul yaitu dengan …`,
    opsi: ["echo $judul;", "echo $Buku->judul;", "echo $novel->$judul;", "echo $novel->judul;", "echo Buku::judul;"]
  },
  {
    nomor: 3,
    pertanyaan: "Pilihan berikut yang bukan keuntungan utama dari pendekatan OOP adalah …",
    opsi: ["Pemeliharaan kode menjadi lebih mudah", "Kemampuan menggunakan kembali kode", "Penggunaan fungsi yang lebih cepat", "Struktur program lebih modular", "Enkapsulasi data"]
  },
  {
    nomor: 4,
    pertanyaan: "Seorang mahasiswa membuat program perpustakaan dengan object Anggota, Buku, dan Peminjaman. Dalam proses debugging, ia menyadari bahwa fungsinya terlalu tersebar dan sulit dilacak. Evaluasi terbaik dari masalah tersebut, yaitu …",
    opsi: ["Mahasiswa tidak cukup menguasai PHP", "Program menggunakan array dan bukan object", "Mahasiswa perlu lebih banyak menggunakan variabel global", "Program belum sepenuhnya menerapkan prinsip OOP", "Program terlalu banyak class"]
  },
  {
    nomor: 5,
    pertanyaan: "Cara yang benar untuk membuat object dari sebuah class bernama Mobil adalah …",
    opsi: ["Mobil mobil = new();", "$mobil = new \"Mobil\";", "$mobil = Mobil();", "new Mobil = $mobil;", "$mobil = new Mobil;"]
  },
  {
    nomor: 6,
    pertanyaan: "Perhatikan dua pendekatan berikut:\nPendekatan A: fungsi dan data disimpan terpisah.\nPendekatan B: fungsi dan data digabung dalam satu unit.\nPendekatan yang sesuai dengan prinsip OOP adalah …",
    opsi: ["A, karena fungsi lebih mudah dipanggil", "B, karena data lebih aman dan terorganisir", "A, karena pemanggilan lebih cepat", "B, karena menghindari penggunaan object", "A, karena sesuai dengan OOP"]
  },
  {
    nomor: 7,
    pertanyaan: "Seorang pengembang membandingkan dua program: satu berbasis OOP dan satu prosedural. Keduanya bekerja dengan baik, tetapi dia memilih OOP untuk proyek jangka panjang. Alasan paling kuat untuk pilihan tersebut adalah …",
    opsi: ["Membutuhkan lebih sedikit kode", "OOP tidak memerlukan testing", "OOP mempercepat runtime program", "OOP lebih cocok untuk program pendek", "OOP lebih mudah dipelihara dan dikembangkan"]
  },
  {
    nomor: 8,
    pertanyaan: "Jika kamu diminta merancang object Dosen, property dan method yang sebaiknya dimiliki agar sesuai prinsip OOP adalah …",
    opsi: ["idDosen, mataKuliah, inputAbsen()", "nilai, sks, hitungUmur()", "warna, ukuran, cetakStruk()", "jurusan, kodePos, loginAdmin()", "namaDosen, jumlahMahasiswa, cekStatusServer()"]
  },
  {
    nomor: 9,
    pertanyaan: "Yang membedakan pendekatan OOP dengan pemrograman procedural adalah …",
    opsi: ["OOP tidak memerlukan struktur data", "OOP menyimpan semua kode dalam satu file", "OOP menggabungkan data dan fungsi dalam satu entitas", "OOP tidak menggunakan fungsi sama sekali", "OOP lebih cocok untuk perhitungan numerik"]
  },
  {
    nomor: 10,
    pertanyaan: "Jika kamu diminta membuat sistem data mahasiswa berbasis object, atribut dan method yang paling tepat untuk class Mahasiswa adalah …",
    opsi: ["nama, email; method: hitungGaji()", "nama, nilai, method: tampilkanProfil()", "jenisKelamin, mataKuliah; method: hapusFile()", "username, password; method: printKartuUjian()", "alamat, usia; method: inputNilai()"]
  }
];

let jawaban = Array(soalData.length).fill(null);
let current = 0;
let waktu = 30 * 60;
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
  // const kunci = [3, 3, 2];
  const kunci = [3, 3, 2, 3, 4, 1, 4, 0, 2, 1];
  let skorBenar = 0;

  jawaban = jawaban.map(j => j === null ? -1 : j);

  for (let i = 0; i < kunci.length; i++) {
    if (jawaban[i] === kunci[i]) skorBenar++;
  }

  const totalSoal = kunci.length;
  const skorFinal = Math.round((skorBenar / totalSoal) * 100);
  const waktu = document.getElementById('timer-kuis')?.textContent || "-";

  const hasil = {
    benar: skorBenar,
    salah: totalSoal - skorBenar,
    nilai: skorFinal,
    total: totalSoal,
    waktu: waktu + " (otomatis)"
  };

  localStorage.setItem('hasilKuis', JSON.stringify(hasil));

  // Kirim ke database
  fetch('/simpan-nilai-kuis', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
    kuis_ke: 1, 
    skor: skorFinal,
    jawaban_json: {
      benar: skorBenar,
      salah: totalSoal - skorBenar
    }
  })
  })
  .then(res => res.json())
  .then(data => {
    window.location.href = "/b17-hkuis"; // ke halaman hasil
  })
  .catch(err => {
    console.error("Gagal:", err);
    alert("Gagal menyimpan nilai. Silakan coba lagi.");
  });
}


function tampilkanModal() {
  if (jawaban.includes(null)) {
    alert("Masih ada soal yang belum dijawab!");
    return;
  }
  const modal = new bootstrap.Modal(document.getElementById('modalKonfirmasi'));
  modal.show();
}


document.addEventListener('DOMContentLoaded', () => {
  buatNavigasi();
  tampilkanSoal(current);
  mulaiTimer();
  updateProgress();
});