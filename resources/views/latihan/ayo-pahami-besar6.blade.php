@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Karyawan {
    function berikanTugas(Tugas $tugas) {
        echo "Tugas diberikan: {$tugas->deskripsi}\n";
    }
}

class Tugas {
    public $deskripsi;
    
    function __construct($deskripsi) {
        $this->deskripsi = $deskripsi;
    }
}

$tugas = new Tugas("Menganalisis data keuangan");
$karyawan = new Karyawan();
$karyawan->berikanTugas($tugas);</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Dalam contoh ini, method <code>berikanTugas()</code> hanya menerima objek dari class <code>Tugas</code>, sehingga pemanggilan dengan tipe data lain akan menyebabkan error.
 </p> 
@endsection
