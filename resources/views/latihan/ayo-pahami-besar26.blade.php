@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
trait Satu {
    public function aksiSatu() {
        echo "Melakukan aksi pertama.\n";
    }
}

trait Dua {
    public function aksiDua() {
        echo "Melakukan aksi kedua.\n";
    }
}

trait Gabungan {
    use Satu, Dua;
    
    public function semuaAksi() {
        $this->aksiSatu();
        $this->aksiDua();
    }
}

class Kombinasi {
    use Gabungan;
}

$object = new Kombinasi();
$object->semuaAksi();
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Dalam contoh ini, <code>trait Gabungan</code> menggunakan <code>Satu</code> dan <code>Dua</code>, sehingga class <code>Kombinasi</code> dapat menggunakan semua method dari kedua trait tersebut. Ini menunjukkan bahwa trait bisa menggunakan trait lain untuk menyusun kembali logika yang modular dan reusable.
   </p>
@endsection
