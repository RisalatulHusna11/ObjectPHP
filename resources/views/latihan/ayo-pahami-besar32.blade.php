@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Kendaraan {
    public $merk;
    public $tahunProduksi;

    function __construct($merk, $tahunProduksi) {
        $this->merk = $merk;
        $this->tahunProduksi = $tahunProduksi;
    }

    function infoKendaraan() {
        return "Merk: {$this->merk}, Tahun: {$this->tahunProduksi}";
    }
}

class Mobil extends Kendaraan {
    public $jumlahPintu;

    function __construct($merk, $tahunProduksi, $jumlahPintu) {
        parent::__construct($merk, $tahunProduksi); // Memanggil constructor class induk
        $this->jumlahPintu = $jumlahPintu;
    }

    function infoMobil() {
        return parent::infoKendaraan() . ", Pintu: {$this->jumlahPintu}";
    }
}

// Membuat object dari class Mobil
$mobil1 = new Mobil("Toyota", 2022, 4);
echo $mobil1->infoMobil();
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Class <code>Kendaraan</code> memiliki constructor yang menerima <code>$merk</code> dan <code>$tahunProduksi</code>. 
    Class <code>Mobil</code> merupakan turunan dari <code>Kendaraan</code> dan memiliki constructor sendiri yang 
    menerima tambahan parameter <code>$jumlahPintu</code>. Constructor di <code>Mobil</code> menggunakan 
    <code>parent::__construct($merk, $tahunProduksi)</code> untuk memanggil constructor dari <code>Kendaraan</code>. 
    Method <code>infoMobil()</code> menampilkan informasi kendaraan dengan tambahan jumlah pintu.
</p> 

@endsection
