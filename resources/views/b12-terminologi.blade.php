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
  $selesai = ProgressMahasiswa::where('user_id', auth()->id())->where('halaman', 'b12-terminologi')->value('selesai');
@endphp

@section('container')
<div class="materi-subbab1">
  <div class="judul-subbab">
      <h5>2. TERMINOLOGI</h5>
  </div>
 
  <div class="TIK">
    <p>Dalam pemrograman berorientasi objek (OOP), ada beberapa istilah penting yang perlu dipahami. Meskipun konsep OOP berlaku di berbagai bahasa pemrograman, setiap bahasa sering kali memiliki istilah yang sedikit berbeda untuk konsep yang sama. PHP memiliki terminologi tertentu yang perlu dipahami agar dapat menggunakannya secara efektif.</p>

    <p>Ketika kita membuat program berbasis objek, kita perlu mendesain suatu struktur data dan method dalam sebuah class. <strong>Class</strong> adalah sebuah template atau cetak biru untuk membuat <strong>object</strong>. Sebagai contoh, bayangkan kita ingin membuat sistem untuk mengelola data pengguna dalam forum diskusi. Setiap pengguna memiliki informasi yang sama, seperti nama, email, dan status keanggotaan. Selain itu, mereka juga bisa melakukan berbagai aksi seperti mengirim pesan atau memperbarui profil.</p>

    <p>Dalam konsep OOP, kita dapat membuat class <em>Pengguna</em>, yang mendefinisikan atribut (property) seperti nama, email, dan status, serta method seperti <code>kirimPesan()</code> dan <code>perbaruiProfil()</code>. Setiap kali kita membuat pengguna baru, kita sebenarnya menciptakan sebuah object, yaitu sebuah instance dari class <em>Pengguna</em>. Object adalah hasil nyata dari sebuah class yang memiliki data dan fungsionalitas yang sudah ditentukan dalam class tersebut.</p>

    <p>Untuk membantu memvisualisasikan konsep ini, perhatikan ilustrasi berikut yang menunjukkan hubungan antara class dan object.</p>
    <div class="teks-kontenpt2">
      <img style="display: block; margin: 0 auto;" class="scrool" src="images/G2.png" alt="Gambar 2 Relasi antara Class dan Object dalam OOP">
      <p>Gambar 2 Relasi antara Class dan Object dalam OOP</p>
    </div>

    <p>Ilustrasi ini memperkuat pemahaman bahwa class hanya mendefinisikan bentuk dan perilaku umum, sedangkan object merupakan wujud nyata yang dapat digunakan dan dimanipulasi di dalam program. Dengan menggunakan class, kita tidak perlu mendesain ulang struktur data setiap kali ingin membuat object baru—cukup isi nilai-nilai uniknya.</p>

    <p>Untuk lebih memudahkan pemahaman, kita bisa menggunakan analogi dalam kehidupan nyata. Bayangkan class seperti cetak biru mobil di pabrik, yang mendeskripsikan fitur-fitur standar seperti warna, tipe mesin, dan jumlah roda. Dari cetak biru ini, kita bisa membuat berbagai mobil nyata dengan spesifikasi berbeda. Satu mobil bisa berwarna merah dan bertipe sedan, lainnya biru bertipe SUV, dan yang lain lagi kuning bertipe hatchback. Meskipun bentuk dan datanya berbeda, semuanya berasal dari class yang sama.</p>

    <div class="teks-kontenpt2">
      <img style="display: block; margin: 0 auto;" class="scrool" src="images/G3.png" alt="Gambar 3 Ilustrasi Class dan Object pada Konsep OOP">
      <p>Gambar 3 Ilustrasi Class dan Object pada Konsep OOP</p>
    </div>

    <p>Gambar di atas menggambarkan bagaimana satu class dapat menghasilkan banyak object dengan data yang unik. Konsep ini menjadi dasar penting dalam OOP karena memungkinkan kita membangun sistem yang efisien, terstruktur, dan hemat kode.</p>

    <p>Agar lebih terstruktur dan mudah dikelola, OOP menerapkan konsep <strong>enkapsulasi</strong>, di mana sebuah class menyediakan method tertentu sebagai antarmuka untuk mengakses dan mengubah data object, sementara data internal tetap tersembunyi dari kode eksternal. Dengan cara ini, debugging menjadi lebih mudah karena hanya method dalam class yang dapat mengubah data object, dan jika terjadi kesalahan, kita tahu di mana harus memperbaikinya.</p>

    <p>OOP juga mendukung <strong>pewarisan</strong>, yaitu mekanisme untuk membuat class baru berdasarkan class yang sudah ada. Class asli disebut <em>superclass</em> atau class induk, sedangkan class baru disebut <em>subclass</em> atau class turunan. Subclass mewarisi semua property dan method dari superclass, tetapi juga dapat memiliki property dan method tambahan atau mengganti method yang ada. Pewarisan memungkinkan penggunaan kembali kode tanpa perlu menyalin dan menempel kode yang sama ke banyak tempat.</p>

    <p>Dengan menerapkan prinsip OOP seperti enkapsulasi dan pewarisan, pengembangan perangkat lunak menjadi lebih modular, mudah diperbarui, dan lebih terstruktur, sehingga memudahkan pemeliharaan dan pengembangan di masa depan.</p>
  </div>

  <!-- LATIHAN SECTION -->
  <div class="quiz-card mt-5">
    <div class="quiz-header">
      <h1>LATIHAN</h1>
      <p class="quiz-intro">Jawablah pertanyaan berikut untuk menguji pemahamanmu. Kamu dapat mencoba lagi hingga jawabanmu benar!</p>
    </div>
    <div id="quiz-container"></div>
    <div class="d-flex justify-content-between">
      <button id="backBtn" class="btn btn-back d-none">Kembali</button>
      <button id="nextBtn" class="btn btn-next d-none">Lanjut</button>
    </div>
  </div>

  <script>
    const quizData = [
      {
        question: "1. Class dalam OOP berperan sebagai …",
        options: [
          "Cetak biru untuk membuat object.",
          "Sumber data utama yang disimpan dalam variable.",
          "Fungsi independen yang memproses data.",
          "Kumpulan array dan fungsi yang digabung.",
          "Struktur logika prosedural."
        ],
        answer: 0,
        feedback: [
          "🎉 Benar! Class adalah cetak biru untuk membuat object.",
          "Bukan, variable hanya menyimpan data bukan mendefinisikan struktur.",
          "Fungsi hanya logika, tidak menggambarkan object.",
          "Array dan fungsi tidak otomatis membentuk class.",
          "Itu konsep dalam pemrograman prosedural."
        ]
      },
      {
        question: "2. Property dan method sebaiknya dikelompokkan dalam class yang sama agar …",
        options: [
          "Semua fungsi dapat diakses global.",
          "Data tidak memerlukan benarasi tambahan.",
          "Setiap object dapat dibuat tanpa class.",
          "Method dapat dipanggil tanpa membuat object.",
          "Struktur kode menjadi modular dan mudah dipelihara."
        ],
        answer: 4,
        feedback: [
          "Hati-hati! Ini justru melanggar prinsip enkapsulasi.",
          "Belum tepat, ini bukan alasan utama OOP.",
          "Object perlu class sebagai dasar struktur.",
          "Itu berlaku untuk method static, bukan prinsip umum.",
          "🎉 Betul sekali! Modularitas dan pemeliharaan lebih baik dengan struktur ini."
        ]
      },
      {
        question: "3. Ketika sebuah class memiliki banyak object, maka semua object tersebut …",
        options: [
          "Memiliki method yang berbeda-beda.",
          "Tidak bisa mengakses property class.",
          "Mewarisi struktur dan perilaku class yang sama.",
          "Mengubah class utama secara otomatis.",
          "Tidak perlu dibuat melalui keyword tertentu."
        ],
        answer: 2,
        feedback: [
          "Belum tepat, semua object mengikuti method yang sama.",
          "Object justru mengakses property dari class.",
          "🎉 Benar! Object mewarisi struktur dari class.",
          "Object tidak mengubah class induk.",
          "Object dibuat menggunakan keyword tertentu seperti 'new'."
        ]
      }
    ];

    let currentQuestion = 0;

    function renderQuestion() {
      const q = quizData[currentQuestion];
      const container = document.getElementById("quiz-container");
      const nextBtn = document.getElementById("nextBtn");
      const backBtn = document.getElementById("backBtn");
      nextBtn.classList.add("d-none");
      backBtn.classList.toggle("d-none", currentQuestion === 0);

      let html = `<div class='quiz-title'>Pertanyaan ${currentQuestion+1} dari ${quizData.length}</div>`;
      html += `<p>${q.question}</p>`;
      q.options.forEach((opt, index) => {
        html += `<div class="option" onclick="selectOption(this, ${index})">${String.fromCharCode(65+index)}. ${opt}</div>`;
      });
      html += `<div id="feedback"></div>`;
      container.innerHTML = html;
    }

    function selectOption(el, index) {
      const q = quizData[currentQuestion];
      const options = document.querySelectorAll(".option");
      options.forEach(opt => opt.onclick = null);

      if (index === q.answer) {
        el.classList.add("correct");
        document.getElementById("feedback").innerHTML = `<div class='feedback correct'>✔ Selamat! ${q.feedback[index]}</div>`;
        document.getElementById("nextBtn").classList.remove("d-none");
      } else {
        el.classList.add("incorrect");
        document.getElementById("feedback").innerHTML = `<div class='feedback incorrect'>✘ Coba lagi ya! ${q.feedback[index]}</div>`;
        options.forEach((opt, i) => {
          if (!opt.classList.contains("correct") && !opt.classList.contains("incorrect")) {
            opt.onclick = () => selectOption(opt, i);
          }
        });
      }
    }

    document.getElementById("nextBtn").addEventListener("click", () => {
      currentQuestion++;
      if (currentQuestion < quizData.length) {
        renderQuestion();
      } else {
        document.getElementById("quiz-container").innerHTML = `<div class='quiz-title text-success'>🎉 Semua soal telah selesai! Kamu luar biasa!</div>`;
        document.getElementById("nextBtn").classList.add("d-none");
        document.getElementById("backBtn").classList.add("d-none");

        kirimProgressHalaman("b12-terminologi");

        const tombol = document.getElementById("btnSelanjutnya");
        if (tombol) {
          tombol.style.pointerEvents = "auto";
          tombol.style.opacity = 1;
          tombol.removeAttribute("disabled");
        }
      }
    });

    document.getElementById("backBtn").addEventListener("click", () => {
      if (currentQuestion > 0) {
        currentQuestion--;
        renderQuestion();
      }
    });

    renderQuestion();
  // function kirimProgressHalaman(namaHalaman) {
  //     fetch("{{ route('progress.simpan') }}", {
  //       method: 'POST',
  //       headers: {
  //         'Content-Type': 'application/json',
  //         'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
  //       },
  //       body: JSON.stringify({ halaman: namaHalaman })
  //     })
  //     .then(res => res.json())
  //     .then(data => {
  //       console.log('✅ Progress berhasil dikirim:', data);
  //     })
  //     .catch(err => {
  //       console.error('❌ Gagal kirim progress:', err);
  //     });
  //   }

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
  </script>

  <!-- PAGINATION -->
  <div class="pagination">
    <a href="./b11-object" class="prev">&laquo; Sebelumnya</a>
    <a href="./b13-membuatobject" 
       id="btnSelanjutnya" 
       class="next" 
       style="pointer-events: {{ $selesai ? 'auto' : 'none' }}; opacity: {{ $selesai ? '1' : '0.5' }};" 
       {{ $selesai ? '' : 'disabled' }}>
      Selanjutnya &raquo;
    </a>
  </div>
</div>
@endsection