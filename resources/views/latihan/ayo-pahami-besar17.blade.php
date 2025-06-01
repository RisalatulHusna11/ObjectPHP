@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Manusia {
    public $nama, $alamat, $umur;

    public function __construct($nama, $alamat, $umur) {
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->umur = $umur;
    }

    public function perkenalan() {
        echo "Halo, nama saya {$this->nama}, saya berumur {$this->umur} tahun dan tinggal di {$this->alamat}.&lt;br&gt;";
    }
}

class Pekerja extends Manusia {
    public $pekerjaan, $gaji;

    public function __construct($nama, $alamat, $umur, $pekerjaan, $gaji) {
        parent::__construct($nama, $alamat, $umur);
        $this->pekerjaan = $pekerjaan;
        $this->gaji = $gaji;
    }

    public function infoPekerjaan() {
        echo "{$this->nama} bekerja sebagai {$this->pekerjaan} dengan gaji sebesar Rp.{$this->gaji}.&lt;br&gt;";
    }
}

$pekerja1 = new Pekerja("Andi", "Jakarta", 30, "Programmer", 10000000);
$pekerja1->perkenalan();
$pekerja1->infoPekerjaan();
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Class <code>Manusia</code> memiliki property <code>$nama</code>, <code>$alamat</code>, dan <code>$umur</code> serta method <code>perkenalan()</code>. Class <code>Pekerja</code> mewarisi class <code>Manusia</code> menggunakan <code>extends</code> dan menambahkan property <code>$pekerjaan</code> serta <code>$gaji</code>. Method <code>perkenalan()</code> diwarisi dari <code>Manusia</code>, sementara method <code>infoPekerjaan()</code> ditambahkan di <code>Pekerja</code>. Constructor di <code>Pekerja</code> memanggil constructor <code>Manusia</code> menggunakan <code>parent::__construct()</code> agar nilai dari class induk tetap terinisialisasi.
   </p>
@endsection
