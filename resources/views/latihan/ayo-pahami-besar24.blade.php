@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
interface Kendaraan {
    public function hidupkanMesin();
}

interface KendaraanDarat extends Kendaraan {
    public function jumlahRoda();
}

class Mobil implements KendaraanDarat {
    public function hidupkanMesin() {
        echo "Mesin mobil dihidupkan.";
    }
    
    public function jumlahRoda() {
        return 4;
    }
}

// Penggunaan
$myCar = new Mobil();
$myCar->hidupkanMesin(); 
echo $myCar->jumlahRoda(); 
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Kode di atas menunjukkan bagaimana kita bisa menggunakan <code>interface</code> untuk memastikan bahwa semua kendaraan memiliki method <code>hidupkanMesin()</code> dan <code>jumlahRoda()</code>, sehingga memudahkan pengembangan dan pemeliharaan kode dalam skala besar. Interface <code>KendaraanDarat</code> mewarisi <code>Kendaraan</code>, dan class <code>Mobil</code> mengimplementasikan semua kontrak method yang diperlukan.
   </p>
@endsection
