@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
if (class_exists("Karyawan")) {
    echo "Class Karyawan tersedia.";
} else {
    echo "Class Karyawan belum dideklarasikan.";
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
  Fungsi <code>class_exists()</code> digunakan untuk memeriksa apakah sebuah class telah dideklarasikan atau belum. Ini berguna untuk menghindari error jika suatu class belum tersedia. Pada contoh di atas, jika class <code>Karyawan</code> sudah didefinisikan sebelumnya, maka akan ditampilkan pesan <em>"Class Karyawan tersedia."</em>; jika belum, maka muncul <em>"Class Karyawan belum dideklarasikan."</em>.
</p> 

@endsection
