@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public $nama;  // Properti publik untuk nama mobil
    public $warna; // Properti publik untuk warna mobil
    private $kecepatan; // Properti privat untuk kecepatan mobil

    // Method untuk mengatur nama mobil
    public function setNama($namaBaru) {
        $this->nama = $namaBaru;
    }

    // Method untuk mengatur warna mobil
    public function setWarna($warnaBaru) {
        $this->warna = $warnaBaru;
    }

    // Method untuk mengatur kecepatan mobil
    private function setKecepatan($kecepatanBaru) {
        $this->kecepatan = $kecepatanBaru;
    }

    // Method untuk mendapatkan informasi mobil
    public function infoMobil() {
        return "Nama Mobil: " . $this->nama . ", Warna: " . $this->warna . ", Kecepatan: " . $this->kecepatan . " km/jam";
    }
}

// Membuat objek dari class Mobil
$mobilSaya = new Mobil();
$mobilSaya->setNama("Toyota Corolla");
$mobilSaya->setWarna("Merah");

// Akses ke properti dan method
echo $mobilSaya->infoMobil();</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Pada contoh di atas, kita memiliki properti publik ($nama dan $warna) yang dapat diakses dari luar class, dan properti privat ($kecepatan) yang hanya dapat diakses melalui method dalam class itu sendiri.
 </p> 
@endsection
