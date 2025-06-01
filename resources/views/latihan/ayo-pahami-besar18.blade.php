@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Ayah {
    public function motivasi() {
        echo "[Class Ayah] Nak, belajarlah dengan giat untuk masa depanmu!&lt;br&gt;";
    }
}

class Anak extends Ayah {
    public function motivasi() {
        echo "[Class Anak] Aku akan belajar dengan giat dan bekerja keras!&lt;br&gt;";
    }

    public function motivasiAyah() {
        parent::motivasi(); // Memanggil method dari class induk
    }
}

$anak1 = new Anak();
$anak1->motivasi();       // Output dari class Anak
$anak1->motivasiAyah();   // Memanggil method dari class Ayah
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Class <code>Ayah</code> memiliki method <code>motivasi()</code>. Class <code>Anak</code> mewarisi class <code>Ayah</code> tetapi menimpa method <code>motivasi()</code>. Method <code>motivasiAyah()</code> di class <code>Anak</code> menggunakan <code>parent::motivasi()</code> untuk tetap memanggil method dari class induk.
   </p>
@endsection
