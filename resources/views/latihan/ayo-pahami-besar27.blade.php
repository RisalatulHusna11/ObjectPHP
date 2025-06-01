@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
trait Perintah {
    public function jalankan() {
        echo "Menjalankan perintah.\n";
    }
}

trait Lari {
    public function jalankan() {
        echo "Berlari cepat.\n";
    }
}

class Manusia {
    use Perintah, Lari {
        Lari::jalankan insteadof Perintah;
    }
}

$manusia = new Manusia();
$manusia->jalankan();
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Dalam contoh ini, <code>Lari::jalankan</code> dipilih sebagai method utama, sehingga method <code>jalankan()</code> dari trait <code>Perintah</code> tidak digunakan. Ini dilakukan dengan menggunakan <code>insteadof</code> untuk menyelesaikan konflik method yang memiliki nama sama pada dua trait.
   </p>
@endsection
