@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public static $jumlahMobil = 0; // Properti statis

    public function __construct() {
        self::$jumlahMobil++; // Setiap objek yang dibuat akan menambah jumlahMobil
    }

    public static function jumlahMobil() {
        return self::$jumlahMobil;
    }
}

$mobil1 = new Mobil();
$mobil2 = new Mobil();

echo "Jumlah Mobil: " . Mobil::jumlahMobil();</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Dalam contoh ini, kita menggunakan properti <code>static</code> <code>$jumlahMobil</code> untuk menghitung jumlah object <code>Mobil</code> yang telah dibuat. Static property ini tidak terkait dengan objek individu, melainkan dengan class itu sendiri.
  </p>
@endsection
