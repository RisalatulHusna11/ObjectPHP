@php use Illuminate\Support\Facades\Auth; @endphp

@extends(
  Auth::check()
    ? (Auth::user()->role === 'mahasiswa'
        ? 'layout.mainMateriM'
        : (Auth::user()->role === 'dosen' ? 'layout.mainMateriBukaD' : 'layout.mainMateriBukaG')
      )
    : 'layout.mainMateriBukaG'
)


@section('container')
<div class="materi-subbab1" style="padding: 30px 0;">
  <div class="nextphp-kuis-guide">
    <h2 class="nextphp-kuis-title">EVALUASI</h2>
    <p class="nextphp-kuis-subtitle">Seluruh Materi</p>

    <div class="nextphp-kuis-instructions">
      <h5>Petunjuk Pengerjaan Evaluasi</h5>
      <ol>
        <li>Terdapat <strong>20 soal pilihan ganda</strong> pada kuis ini. Untuk memulai mengerjakan kuis, tekan tombol <strong>"MULAI"</strong>.</li>
        <li>Waktu pengerjaan soal adalah <strong>60 menit</strong>, terdapat timer pada bagian kanan atas.</li>
        <li>Laman kuis terbagi menjadi dua sisi. Pada sisi bagian kiri terdapat soal, progress, dan navigasi. Pada sisi bagian kanan terdapat soal dan pilihan jawaban. Pilih salah satu pilihan dan tekan tombol <strong>BERIKUTNYA</strong> setelah menjawab soal.</li>
        <li>Jika seluruh soal sudah dikerjakan, tombol <strong>"SELESAI"</strong> aktif dan dapat diklik. Jika waktu pengerjaan soal habis maka laman soal akan otomatis tertutup dan akan diarahkan ke halaman hasil.</li>
        <li>Jika keluar ketika sedang mengerjakan kuis, semua jawaban yang sudah dipilihkan <strong>tidak akan disimpan</strong> dan harus mengerjakan ulang dari awal.</li>
      </ol>
    </div>

    <div class="nextphp-kuis-btn-group">
      <a href="./b62-eval" class="nextphp-btn-mulai">MULAI</a>
      <a href="./b54-hkuis" class="nextphp-btn-kembali">KEMBALI</a>
    </div>
  </div>
</div>
@endsection
