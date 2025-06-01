@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mahasiswa {
}

class Dosen {
}

$orang1 = new Mahasiswa();
$orang2 = new Dosen();

if ($orang1 instanceof Mahasiswa) {
    echo "Orang pertama adalah seorang Mahasiswa.&lt;br&gt;";
}

if ($orang2 instanceof Dosen) {
    echo "Orang kedua adalah seorang Dosen.&lt;br&gt;";
}
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  <code>instanceof</code> digunakan untuk memeriksa apakah <code>$orang1</code> merupakan instance dari <code>Mahasiswa</code> dan <code>$orang2</code> merupakan instance dari <code>Dosen</code>. Hasilnya akan menampilkan bahwa <code>$orang1</code> adalah Mahasiswa dan <code>$orang2</code> adalah Dosen.
   </p>
@endsection
