@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Produk {
    public $nama = "Laptop";
    private $harga = 15000000;

    public function tampilkanProduk() {
        return "Nama Produk: " . $this->nama;
    }
}

// Mengecek apakah class Produk ada
if (class_exists("Produk")) {
    echo "Class Produk tersedia.&lt;br&gt;";
}

// Mendapatkan method dan property class Produk
$methods = get_class_methods("Produk");
$properties = get_class_vars("Produk");

echo "Method yang tersedia: ";
print_r($methods);
echo "&lt;br&gt;Property yang tersedia: ";
print_r($properties);
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Kode ini menggunakan fungsi <code>class_exists()</code>, <code>get_class_methods()</code>, dan <code>get_class_vars()</code> untuk memeriksa ketersediaan class <code>Produk</code>, serta mengambil daftar method dan property yang tersedia. Method privat seperti <code>$harga</code> tidak akan ditampilkan oleh <code>get_class_vars()</code> karena fungsinya hanya mengembalikan properti publik.
</p> 

@endsection
