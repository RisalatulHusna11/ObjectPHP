@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public $merk = '';

    function getMerk() {
        return $this->merk;
    }

    function setMerk($merkBaru) {
        $this->merk = $merkBaru;
    }
}

$mobil = new Mobil();
$mobil->setMerk('Toyota');
echo $mobil->getMerk();</code></pre>
</div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Pada contoh di atas, method <code>getMerk()</code> dan <code>setMerk()</code> menggunakan <code>$this</code> untuk mengakses dan mengubah properti <code>$merk</code> pada objek yang sedang digunakan.
</p> 
@endsection
