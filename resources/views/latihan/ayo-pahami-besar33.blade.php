@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Produk {
    public $nama;
    public $harga;

    function __construct($nama = "Produk Tidak Diketahui", $harga = 0) {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    function infoProduk() {
        return "Nama: {$this->nama}, Harga: Rp. {$this->harga}";
    }
}

// Object dengan parameter
$produk1 = new Produk("Laptop", 8000000);
echo $produk1->infoProduk();

// Object tanpa parameter (menggunakan nilai default)
$produk2 = new Produk();
echo $produk2->infoProduk();
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Jika objek <code>Produk</code> dibuat tanpa parameter, maka constructor akan memberikan nilai default yaitu <code>"Produk Tidak Diketahui"</code> untuk <code>$nama</code> dan <code>0</code> untuk <code>$harga</code>. Namun jika parameter diberikan saat pembuatan objek, maka nilai tersebut akan menggantikan nilai default yang sudah ditetapkan.
</p> 

@endsection
