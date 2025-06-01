@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Orang {
    public $nama = '';

    function getNama() {
        return $this->nama;
    }
}

// Membuat object dari anonymous class yang mewarisi class Orang
$anonim = new class() extends Orang {
    public function getNama() {
        // Mengembalikan nilai tetap untuk tujuan pengujian
        return "Budi";
    }
};

// Memanggil method dari anonymous class
echo $anonim->getNama(); // Output: Budi
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  <code>Class Orang</code> memiliki properti <code>$nama</code> dan method <code>getNama()</code>. Dalam contoh ini, kita membuat <strong>anonymous class</strong> yang mewarisi <code>Orang</code> menggunakan <code>new class() extends Orang</code>. Method <code>getNama()</code> dioverride untuk selalu mengembalikan string <code>"Budi"</code>. Penting untuk diingat bahwa anonymous class harus diakhiri dengan tanda titik koma <code>;</code> karena dideklarasikan sekaligus dibuat objeknya, berbeda dengan class biasa.
</p> 

@endsection
