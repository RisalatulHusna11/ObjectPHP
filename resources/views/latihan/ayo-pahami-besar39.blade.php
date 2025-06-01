@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
$semuaClass = get_declared_classes();
if (in_array("Karyawan", $semuaClass)) {
    echo "Class Karyawan ditemukan.";
} else {
    echo "Class Karyawan tidak ditemukan.";
}
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Fungsi <code>get_declared_classes()</code> digunakan untuk mengambil semua class yang sudah dideklarasikan dalam script. Dengan <code>in_array()</code>, kita bisa memeriksa apakah sebuah class tertentu (misalnya <code>Karyawan</code>) termasuk dalam daftar tersebut. Jika class tersebut sudah ada, maka ditampilkan pesan bahwa class ditemukan; jika belum, maka ditampilkan bahwa class tidak ditemukan.
</p> 

@endsection
