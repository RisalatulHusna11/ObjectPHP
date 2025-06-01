@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
interface Kendaraan {
    public function jalankan();
}

// Membuat object dari anonymous class yang mengimplementasikan interface Kendaraan
$mobil = new class() implements Kendaraan {
    public function jalankan() {
        return "Mobil sedang berjalan...";
    }
};

// Memanggil method dari anonymous class
echo $mobil->jalankan(); // Output: Mobil sedang berjalan...
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Contoh di atas menunjukkan penggunaan <strong>anonymous class</strong> yang <code>mengimplementasikan interface</code> <code>Kendaraan</code>. Interface mendefinisikan method <code>jalankan()</code>, yang kemudian diimplementasikan dalam anonymous class tanpa membuat class terpisah. Pemanggilan <code>$mobil-&gt;jalankan()</code> akan menampilkan <code>"Mobil sedang berjalan..."</code>. Anonymous class sangat berguna untuk pembuatan object sederhana yang hanya digunakan satu kali.
</p> 

@endsection
