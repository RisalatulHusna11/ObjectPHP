@extends('layout.mainLandingPage')

@section('title', 'Bantuan')

@section('container')
<style>
    .accordion-button {
        font-weight: 600;
        font-size: 1rem;
        background-color: #F4F0FA;
        color: #4B297A;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .accordion-button:not(.collapsed) {
        background-color: #E0D1F5;
        color: #3E1F64;
        box-shadow: none;
    }

    .accordion-body {
        background-color: #ffffff;
        border: 1px solid #e6e6e6;
        border-top: none;
        border-radius: 0 0 8px 8px;
        padding: 1.2rem 1.5rem;
        line-height: 1.7;
        font-size: 0.98rem;
    }

    .accordion-item {
        border: none;
        margin-bottom: 15px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(170, 146, 200, 0.15);
    }

    .accordion-button::after {
        filter: brightness(0.5);
    }
</style>

<div class="container py-5" style="font-family: 'Quicksand', sans-serif; margin-left: 20px;">
  <h2 class="text-center mb-5" style="color:#8A56DC; font-weight: 700;">📘 Bantuan Penggunaan Media untuk Tamu (Guest) 📘</h2>

  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="accordion" id="bantuanGuest">
        
        <!-- 1. Apa itu ObjectPHP -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
              🔎 Apa itu i-ObjectPHP?
            </button>
          </h2>
          <div id="collapse1" class="accordion-collapse collapse show">
            <div class="accordion-body">
              <p><b>i-ObjectPHP</b> adalah media pembelajaran interaktif berbasis web yang dirancang untuk membantu pengguna memahami konsep dasar <b>Object-Oriented Programming (OOP)</b> dengan bahasa PHP.</p>
              <p>Media ini menyajikan materi lengkap dari pengenalan OOP hingga topik lanjutan seperti introspection dan serialization.</p>
              <p>Sebagai tamu (guest), kamu dapat <b>melihat seluruh materi</b> dan <b>mengerjakan latihan</b> yang tersedia di setiap akhir pembelajaran.</p>
            </div>
          </div>
        </div>

        <!-- 2. Cara Menggunakan Media -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
              🗺️ Bagaimana cara menggunakan media ini?
            </button>
          </h2>
          <div id="collapse2" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Kamu bisa mulai belajar langsung tanpa login dengan cara:</p>
              <ul>
                <li>Membuka <b>menu Materi</b> untuk membaca topik seperti Object, Class, Properties, dan lainnya.</li>
                <li>Scroll halaman untuk memahami penjelasan dan melihat ilustrasi visual.</li>
                <li>Mengerjakan <b>latihan</b> di bagian bawah setiap halaman materi untuk menguji pemahamanmu.</li>
              </ul>
              <p>Latihan ini tidak terbatas jumlah percobaan, jadi kamu bisa mengulang sampai menemukan jawaban yang benar.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading7">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7">
              💻 Bagaimana cara menggunakan editor kode?
            </button>
          </h2>
          <div id="collapse7" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Di bagian <b>Ayo Pahami!</b>, kamu bisa menuliskan kode PHP langsung ke dalam editor dan menekan tombol <b>RUN</b> untuk melihat hasilnya.</p>
              <p>Tips:</p>
              <ul>
                <li>Pastikan penulisan sintaks benar, gunakan tanda titik koma ";" di akhir baris</li>
                <li>Gunakan <code>echo</code> atau <code>print_r()</code> untuk menampilkan data</li>
                <li>Perhatikan huruf kapital dan kurung yang sesuai</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- 3. Tentang Latihan -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
              🧠 Apakah saya bisa mengerjakan latihan?
            </button>
          </h2>
          <div id="collapse3" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Tentu bisa! Latihan tersedia untuk semua pengguna, termasuk tamu. Fitur ini dirancang untuk membantumu memahami materi tanpa tekanan.</p>
              <p>Jawabanmu akan langsung diperiksa saat memilih opsi, dan kamu bebas mencoba sebanyak yang kamu mau sampai benar.</p>
              <p><b>Latihan ini tidak memiliki skor atau penilaian akhir</b>, karena fokusnya adalah pemahaman, bukan evaluasi.</p>
            </div>
          </div>
        </div>

        <!-- 4. Kuis dan Evaluasi Tidak Tersedia -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
              ❌ Mengapa fitur Kuis & Evaluasi tidak tersedia?
            </button>
          </h2>
          <div id="collapse4" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Kuis dan Evaluasi adalah bagian dari sistem penilaian yang hanya tersedia bagi pengguna yang <b>sudah mendaftar dan masuk sebagai Mahasiswa</b>.</p>
              <p>Jika kamu ingin mengakses soal-soal kuis dan evaluasi, serta menyimpan progres belajar, kamu bisa <a href="/register">mendaftar terlebih dahulu</a>.</p>
            </div>
          </div>
        </div>

        <!-- 5. Cara Mendaftar -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading5">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
              📝 Bagaimana cara mendaftar akun?
            </button>
          </h2>
          <div id="collapse5" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Kamu bisa mendaftar akun baru dengan mengunjungi halaman <a href="/register">Daftar</a> di menu atas. Isi nama, email, password, dan pilih peran sebagai <b>Mahasiswa</b> atau <b>Dosen</b>.</p>
              <p>Jangan lupa minta token kelas ke dosenmu jika ingin mendaftar menjadi mahasiswa. Dengan mendaftar sebagai Mahasiswa, kamu akan mendapatkan fitur tambahan seperti:</p>
              <ul>
                <li>Akses ke kuis dan evaluasi</li>
                <li>Penyimpanan progres belajar dan nilai</li>
                <li>Fitur dashboard interaktif</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- 6. Kontak & Bantuan -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading6">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6">
              📞 Masih bingung? Hubungi kami!
            </button>
          </h2>
          <div id="collapse6" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Kami siap membantu! Jika kamu memiliki pertanyaan atau menemukan masalah, hubungi kami melalui:</p>
              <ul>
                <li>📧 Email: <a href="mailto:objectphp11@gmail.com">objectphp11@gmail.com</a></li>
                <li>📱 WhatsApp: <a href="https://wa.me/082154073215">ObjectPHP</a></li>
                <li>💬 Telegram: <a href="https://t.me/ObjectPHP">@ObjectPHP</a></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
