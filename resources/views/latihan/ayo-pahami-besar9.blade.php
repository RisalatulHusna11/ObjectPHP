@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public $nama = "Honda Civic";  // Nilai default
    public $warna = "Putih";       // Nilai default
    private $kecepatan = 0;        // Nilai default

    public function infoMobil() {
        return "Nama Mobil: " . $this->nama . ", Warna: " . $this->warna . ", Kecepatan: " . $this->kecepatan . " km/jam";
    }
}

$mobilSaya = new Mobil();
echo $mobilSaya->infoMobil();</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Pada contoh ini, jika kita tidak menetapkan nilai untuk properti <code>nama</code>, <code>warna</code>, dan <code>kecepatan</code>, mereka akan memiliki nilai default yang telah ditetapkan dalam class.
 </p>
@endsection
