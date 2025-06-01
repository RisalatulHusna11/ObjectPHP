@extends('layout.mainDashboardD')

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
  <h2 class="text-center mb-5" style="color:#8A56DC; font-weight: 700;">👨‍🏫 Bantuan Penggunaan Media untuk Dosen 👨‍🏫</h2>

  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="accordion" id="bantuanDosen">

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
              📚 Apa itu ObjectPHP?
            </button>
          </h2>
          <div id="collapse1" class="accordion-collapse collapse show">
            <div class="accordion-body">
              <p><b>ObjectPHP</b> adalah media pembelajaran interaktif berbasis web yang dirancang untuk membantu mahasiswa memahami <b>Object-Oriented Programming (OOP)</b> menggunakan bahasa PHP.</p>
              <p>Dosen dapat memantau progres belajar mahasiswa, mengakses seluruh materi, dan melihat data penilaian kuis serta evaluasi.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
              🧑‍🏫 Apa saja fitur yang bisa diakses oleh Dosen?
            </button>
          </h2>
          <div id="collapse2" class="accordion-collapse collapse">
            <div class="accordion-body">
              <ul>
                <li>Membaca seluruh materi tanpa batasan progres</li>
                <li>Melihat data mahasiswa berdasarkan token kelas</li>
                <li>Melihat nilai kuis dan evaluasi setiap mahasiswa</li>
                <li>Mengatur nilai KKM untuk evaluasi</li>
                <li>Mengekspor nilai ke dalam file</li>
                <li>Mengakses kuis dan evaluasi tanpa menyimpan jawaban</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
              👥 Bagaimana melihat data mahasiswa dan progresnya?
            </button>
          </h2>
          <div id="collapse3" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Pada menu <b>Data Mahasiswa</b> di <b>Halaman Dosen</b>, dosen dapat melihat nama, NIM, email, dan progres belajar tiap mahasiswa. Progres ditampilkan dalam bentuk persentase.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
              📊 Bagaimana cara melihat nilai kuis dan evaluasi?
            </button>
          </h2>
          <div id="collapse4" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Masuk ke menu <b>Data Nilai</b> di <b>Halaman Dosen</b>, untuk melihat nilai masing-masing mahasiswa pada kuis 1–5 dan evaluasi akhir. Rata-rata nilai akan dihitung otomatis. Dosen juga bisa menekan tombol <b>Export</b> untuk mengunduh data.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading5">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
              🎯 Bagaimana mengatur nilai KKM kuis & evaluasi?
            </button>
          </h2>
          <div id="collapse5" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Pada menu <b>Pengaturan</b> di <b>Halaman Dosen</b>, dosen bisa mengisi nilai KKM (default 70) untuk menentukan batas minimal kelulusan mahasiswa. Nilai ini akan diterapkan ke seluruh kuis dan evaluasi.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading6">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6">
              🧾 Apakah dosen bisa melihat isi materi dan soal kuis?
            </button>
          </h2>
          <div id="collapse6" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Ya, dosen bisa mengakses seluruh materi dan mencoba latihan, kuis, atau evaluasi tanpa menyimpan jawaban ke sistem.</p>
              <p>Fitur ini berguna untuk meninjau isi soal dan struktur pembelajaran mahasiswa.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading7">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7">
              📞 Masih bingung? Hubungi kami!
            </button>
          </h2>
          <div id="collapse7" class="accordion-collapse collapse">
            <div class="accordion-body">
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
