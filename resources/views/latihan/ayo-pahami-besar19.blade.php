@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class OrangTua {
    public $nama;

    public function __construct($nama) {
        $this->nama = $nama;
        echo "Orang tua bernama {$this->nama} telah dibuat.&lt;br&gt;";
    }
}

class Anak extends OrangTua {
    public $hobi;

    public function __construct($nama, $hobi) {
        parent::__construct($nama); // Memanggil constructor dari class induk
        $this->hobi = $hobi;
        echo "Anak bernama {$this->nama} memiliki hobi {$this->hobi}.&lt;br&gt;";
    }
}

$anak1 = new Anak("Budi", "Bermain Sepak Bola");
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Class <code>OrangTua</code> memiliki constructor yang menerima parameter <code>$nama</code>. Class <code>Anak</code> memiliki constructor sendiri yang tetap memanggil constructor <code>OrangTua</code> menggunakan <code>parent::__construct($nama)</code>. Output menampilkan pesan dari constructor <code>OrangTua</code> dan <code>Anak</code>.
   </p>
@endsection
