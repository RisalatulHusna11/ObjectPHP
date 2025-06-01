@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Produk {
    public $nama = "Laptop";
    private $harga = 10000000;

    public function tampilkanNama() {
        return "Nama Produk: " . $this->nama;
    }
}

$barang = new Produk();

echo "Apakah ini object? " . (is_object($barang) ? "Ya" : "Tidak") . "&lt;br&gt;";
echo "Class dari object ini: " . get_class($barang) . "&lt;br&gt;";

if (method_exists($barang, "tampilkanNama")) {
    echo "Method tampilkanNama tersedia.&lt;br&gt;";
} else {
    echo "Method tampilkanNama tidak ditemukan.&lt;br&gt;";
}

$propertyBarang = get_object_vars($barang);
echo "Property dalam object:&lt;br&gt;";
print_r($propertyBarang);
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Pada contoh ini, kita menggunakan beberapa fungsi bawaan PHP:
    <code>is_object()</code> untuk memeriksa apakah sebuah variabel adalah object,
    <code>get_class()</code> untuk mengetahui nama class dari object,
    <code>method_exists()</code> untuk mengecek apakah suatu method tersedia dalam object,
    dan <code>get_object_vars()</code> untuk menampilkan daftar properti public yang dimiliki object.
  </p> 

@endsection
