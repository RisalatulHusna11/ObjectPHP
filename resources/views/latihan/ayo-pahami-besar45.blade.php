@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Hewan {
    public function bersuara() {
        return "Suara hewan";
    }
}

$kucing = new Hewan();

if (method_exists($kucing, "bersuara")) {
    echo $kucing->bersuara();
} else {
    echo "Method tidak ditemukan.";
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
  Fungsi <code>method_exists()</code> digunakan untuk memeriksa apakah suatu object memiliki method tertentu. Jika method ditemukan, maka akan dijalankan; jika tidak, program akan menampilkan pesan bahwa method tidak tersedia. Ini berguna untuk validasi sebelum memanggil method secara dinamis.
</p> 

@endsection
