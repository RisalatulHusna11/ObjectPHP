@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Komponen {
    public function tampilkanOutput() {
        echo "Menampilkan sesuatu...";
    }
}

class GambarKomponen extends Komponen {
    function tampilkanOutput() {
        echo "Menampilkan gambar yang indah.";
    }
}

// Penggunaan
$obj = new GambarKomponen();
$obj->tampilkanOutput(); 
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Kode di atas mendefinisikan sebuah class bernama <code>GambarKomponen</code> yang merupakan turunan dari class induk <code>Komponen</code> melalui pewarisan (inheritance). Di dalamnya terdapat method <code>tampilkanOutput()</code> yang didefinisikan untuk menampilkan teks <em>"Menampilkan gambar yang indah."</em>. Ini menunjukkan bahwa class turunan dapat memiliki implementasi method sendiri, baik untuk menggantikan atau melengkapi fungsionalitas yang diwarisi dari class induknya.
   </p>
@endsection
