@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
trait Logger {
    public function catatLog($pesan) {
        $className = __CLASS__;
        echo date("Y-m-d H:i:s") . " [{$className}] {$pesan}\n";
    }
}

class Pengguna {
    use Logger;
    
    public $nama;
    
    public function __construct($nama) {
        $this->nama = $nama;
        $this->catatLog("Pengguna '{$this->nama}' telah dibuat.");
    }
}

class KelompokPengguna {
    use Logger;
    
    public $daftarPengguna = [];
    
    public function tambahPengguna(Pengguna $pengguna) {
        $this->daftarPengguna[] = $pengguna;
        $this->catatLog("Pengguna '{$pengguna->nama}' ditambahkan ke kelompok.");
    }
}

// Penggunaan
$kelompok = new KelompokPengguna();
$kelompok->tambahPengguna(new Pengguna("Aldo"));
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Pada contoh di atas, <code>trait</code> <code>Logger</code> digunakan oleh class <code>Pengguna</code> dan <code>KelompokPengguna</code>, sehingga kedua class bisa menggunakan method <code>catatLog()</code> tanpa harus menulis ulang kode tersebut. Ini memudahkan pemeliharaan kode dan mendukung reuse logika yang umum digunakan di berbagai class.
   </p>
@endsection
