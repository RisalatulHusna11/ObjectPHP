@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Perpustakaan {
    function ambilBuku(): Buku {
        return new Buku("Pemrograman PHP");
    }
}

class Buku {
    public $judul;

    function __construct($judul) {
        $this->judul = $judul;
    }
}

$perpustakaan = new Perpustakaan();
$buku = $perpustakaan->ambilBuku();
echo "Buku yang diperoleh: " . $buku->judul;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Di sini, method <code>ambilBuku()</code> harus mengembalikan objek dari class <code>Buku</code>. Jika method ini mengembalikan tipe data lain, PHP akan menghasilkan error.
 </p> 
@endsection
