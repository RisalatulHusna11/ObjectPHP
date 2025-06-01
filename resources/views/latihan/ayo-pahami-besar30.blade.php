@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
abstract class Kendaraan {
    protected $merk;
    protected $kecepatanMaksimal;

    public function __construct($merk, $kecepatanMaksimal) {
        $this->merk = $merk;
        $this->kecepatanMaksimal = $kecepatanMaksimal;
    }

    abstract public function deskripsi();
}

class Mobil extends Kendaraan {
    private $jumlahPintu;

    public function __construct($merk, $kecepatanMaksimal, $jumlahPintu) {
        parent::__construct($merk, $kecepatanMaksimal);
        $this->jumlahPintu = $jumlahPintu;
    }

    public function deskripsi() {
        return "Mobil merk {$this->merk} memiliki kecepatan maksimal {$this->kecepatanMaksimal} km/jam dan {$this->jumlahPintu} pintu.";
    }
}

class Motor extends Kendaraan {
    private $jenis;

    public function __construct($merk, $kecepatanMaksimal, $jenis) {
        parent::__construct($merk, $kecepatanMaksimal);
        $this->jenis = $jenis;
    }

    public function deskripsi() {
        return "Motor merk {$this->merk} berjenis {$this->jenis} dengan kecepatan maksimal {$this->kecepatanMaksimal} km/jam.";
    }
}

// Penggunaan
$mobil = new Mobil("Toyota", 200, 4);
$motor = new Motor("Honda", 150, "Sport");

echo $mobil->deskripsi() . PHP_EOL;
echo $motor->deskripsi() . PHP_EOL;
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Kode di atas mendemonstrasikan penggunaan class abstrak <code>Kendaraan</code> yang mendefinisikan struktur dasar dengan properti umum seperti <code>$merk</code> dan <code>$kecepatanMaksimal</code>, serta method abstrak <code>deskripsi()</code> yang wajib diimplementasikan oleh class turunannya. Class <code>Mobil</code> dan <code>Motor</code> merupakan turunan dari <code>Kendaraan</code> yang masing-masing menambahkan properti khusus, yaitu <code>$jumlahPintu</code> pada <code>Mobil</code> dan <code>$jenis</code> pada <code>Motor</code>, serta mengimplementasikan method <code>deskripsi()</code> sesuai karakteristiknya. Penggunaan <code>parent::__construct()</code> dalam konstruktor masing-masing turunan menunjukkan pemanfaatan pewarisan konstruktor dari class induk. Ketika objek <code>Mobil</code> dan <code>Motor</code> dibuat dan method <code>deskripsi()</code> dipanggil, masing-masing akan mengembalikan informasi spesifik sesuai atribut yang dimilikinya.
   </p>
@endsection
