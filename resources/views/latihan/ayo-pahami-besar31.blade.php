@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
trait BisaDikendarai {
    abstract function getIdentitas();

    public function bandingkanKecepatan($object) {
        return ($object->getIdentitas() < $this->getIdentitas()) ? -1 : 1;
    }
}

class Sepeda {
    use BisaDikendarai;
    private $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function getIdentitas() {
        return "Sepeda-{$this->id}";
    }
}

// Kesalahan: Class tidak mengimplementasikan method abstract
class Bus {
    use BisaDikendarai;
}

$sepeda = new Sepeda(101);
$bus = new Bus(); // Akan menyebabkan error karena `Bus` tidak mengimplementasikan `getIdentitas()`

$hasilPerbandingan = $sepeda->bandingkanKecepatan($bus);
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Trait <code>BisaDikendarai</code> mendeklarasikan <code>abstract method getIdentitas()</code>. Class <code>Sepeda</code> menggunakan trait ini dan mengimplementasikan method <code>getIdentitas()</code> sesuai kontrak. Namun, class <code>Bus</code> juga menggunakan trait tetapi tidak mengimplementasikan <code>getIdentitas()</code>, sehingga akan menyebabkan error. Hal ini menegaskan bahwa setiap class yang menggunakan trait dengan method abstract wajib mendefinisikan method tersebut secara eksplisit.
</p> 

@endsection
