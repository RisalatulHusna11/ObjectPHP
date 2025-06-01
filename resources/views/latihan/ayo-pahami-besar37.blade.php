@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
$pesan = new class("Selamat datang!") {
    private $teks;

    public function __construct($teks) {
        $this->teks = $teks;
    }

    public function tampilkanPesan() {
        return $this->teks;
    }
};

// Memanggil method dari anonymous class
echo $pesan->tampilkanPesan(); // Output: Selamat datang!
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Contoh di atas menggunakan <strong>anonymous class</strong> dengan <code>constructor</code> yang menerima parameter <code>$teks</code>. Nilai parameter disimpan dalam property <code>$teks</code>, kemudian ditampilkan melalui method <code>tampilkanPesan()</code>. Saat objek <code>$pesan</code> dipanggil, hasil yang ditampilkan adalah <code>"Selamat datang!"</code>. Ini menunjukkan bahwa anonymous class dapat memiliki constructor dan method seperti class biasa.
</p> 

@endsection
