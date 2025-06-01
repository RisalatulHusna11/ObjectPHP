@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
$variabel = new stdClass();

if (is_object($variabel)) {
    echo "Variabel ini adalah object.";
} else {
    echo "Variabel ini bukan object.";
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
  Fungsi <code>is_object()</code> digunakan untuk memeriksa apakah suatu variabel merupakan object. Dalam contoh ini, <code>new stdClass()</code> digunakan untuk membuat object kosong, dan hasil dari <code>is_object()</code> akan menampilkan bahwa variabel tersebut adalah object.
</p> 

@endsection
