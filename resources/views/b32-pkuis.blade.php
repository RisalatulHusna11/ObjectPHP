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
    <h2 class="nextphp-kuis-title">KUIS 3</h2>
    <p class="nextphp-kuis-subtitle">Anonymous Classes</p>

    <div class="nextphp-kuis-instructions">
      <h5>Petunjuk Pengerjaan Kuis</h5>
      <ol>
        <li>Kuis ini terdiri dari <strong>5 soal interaktif</strong> mengenai materi Anonymous Classes. Untuk memulai kuis, klik tombol <strong>"MULAI"</strong>.</li>
        <li>Waktu pengerjaan adalah <strong>30 menit</strong>. Timer dapat dilihat pada bagian kanan atas layar.</li>
        <li>Halaman kuis terdiri dari dua bagian. Bagian kiri menampilkan <strong>navigasi soal</strong> dan progres jawaban. Bagian kanan menampilkan soal dan area interaktif untuk menjawab.</li>
        <li>Setelah mengisi jawaban, klik tombol <strong>BERIKUTNYA</strong> untuk pindah ke soal selanjutnya. Jika semua soal telah dijawab, tombol <strong>"SELESAI"</strong> akan aktif.</li>
        <li>Jika waktu habis, sistem akan <strong>mengakhiri kuis secara otomatis</strong> dan mengarahkan ke halaman hasil kuis.</li>
        <li>Jika kamu keluar dari halaman ini sebelum menyelesaikan kuis, maka <strong>jawaban yang sudah diisi akan hilang</strong> dan kamu harus mengerjakan ulang dari awal.</li>
      </ol>
    </div>

    <div class="nextphp-kuis-btn-group">
      <a href="/b33-kuis" class="nextphp-btn-mulai">MULAI</a>
      <a href="/b31-konsepd" class="nextphp-btn-kembali">KEMBALI</a>
    </div>
  </div>
</div>
@endsection
