@extends('layout.mainDashboardM')

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
  <h2 class="text-center mb-5" style="color:#8A56DC; font-weight: 700;">🎓 Bantuan Penggunaan Media untuk Mahasiswa 🎓</h2>

  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="accordion" id="bantuanMahasiswa">

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
              📚 Apa itu ObjectPHP?
            </button>
          </h2>
          <div id="collapse1" class="accordion-collapse collapse show">
            <div class="accordion-body">
              <p><b>ObjectPHP</b> adalah media pembelajaran berbasis web yang bertujuan membantu mahasiswa memahami konsep <b>Object-Oriented Programming (OOP)</b> dalam bahasa PHP secara bertahap dan interaktif.</p>
              <p>Mahasiswa dapat membaca materi, mengerjakan latihan, mengikuti kuis interaktif, dan menyelesaikan evaluasi. Setiap progres akan disimpan secara otomatis dan ditampilkan dalam dashboard.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
              🧭 Bagaimana cara menggunakan media ini?
            </button>
          </h2>
          <div id="collapse2" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Kamu bisa mulai belajar dengan membuka menu Materi. Halaman akan terbuka secara berurutan berdasarkan progresmu.</p>
              <ul>
                <li>Setiap halaman berisi penjelasan materi, ilustrasi, dan latihan.</li>
                <li>Tombol <b>"Selanjutnya"</b> akan aktif jika kamu menyelesaikan latihan di halaman tersebut.</li>
                <li>Progress disimpan secara otomatis setelah kamu menyelesaikan halaman.</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
              📈 Bagaimana cara melihat dan menyelesaikan progres belajar?
            </button>
          </h2>
          <div id="collapse3" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Progress belajarmu akan otomatis tercatat saat menyelesaikan halaman materi. Kamu dapat melihat progres ini di sidebar mahasiswa (bagian kiri dalam bentuk persentase dan daftar halaman yang telah dibuka)</p>
              <p>Halaman berikutnya akan terbuka jika halaman sebelumnya sudah selesai dan progresnya tersimpan.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
              🧠 Bagaimana cara menggunakan fitur latihan?
            </button>
          </h2>
          <div id="collapse4" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Latihan muncul di setiap akhir halaman materi. Tujuannya untuk memastikan kamu memahami isi materi sebelum lanjut ke halaman berikutnya.</p>
              <ul>
                <li>Jawabanmu akan diperiksa otomatis.</li>
                <li>Kamu dapat mencoba kembali jika belum benar.</li>
                <li>Tombol <b>Selanjutnya</b> akan aktif jika jawaban benar.</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading5">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
              🧪 Bagaimana cara mengerjakan kuis?
            </button>
          </h2>
          <div id="collapse5" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Terdapat 5 kuis dalam media ini:</p>
              <ul>
                <li><b>Kuis 1:</b> 10 soal pilihan ganda</li>
                <li><b>Kuis 2–5:</b> 5 soal interaktif (isian, drag-and-drop, dan urut kode)</li>
              </ul>
              <p>Gunakan tombol <b>Berikutnya</b> untuk navigasi antar soal. Jawabanmu akan tersimpan otomatis dan <b>nilai akhir akan muncul setelah klik tombol SELESAI</b>.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading6">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6">
              📝 Apa itu Evaluasi Akhir?
            </button>
          </h2>
          <div id="collapse6" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Evaluasi akhir terdiri dari 20 soal pilihan ganda. Evaluasi digunakan untuk mengukur keseluruhan pemahamanmu setelah menyelesaikan semua materi.</p>
              <ul>
                <li>Evaluasi bisa dikerjakan sampai mahasiswa memenuhi KKM, sama seperti sistem kuis.</li>
                <li>Nilai akan langsung tampil ketika mahasiswa menyelesaikan evaluasi, nilai ini juga akan dikirim ke dosen.</li>
              </ul>
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

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading8">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8">
              📞 Masih bingung? Hubungi kami!
            </button>
          </h2>
          <div id="collapse8" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Jika kamu memiliki pertanyaan atau masalah teknis, silakan hubungi kami melalui:</p>
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
