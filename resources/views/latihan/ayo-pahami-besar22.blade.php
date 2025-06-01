@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
interface Printable {
    public function printOutput();
}

class ImageComponent implements Printable {
    public function printOutput() {
        echo "Mencetak gambar...";
    }
}

// Penggunaan
$obj = new ImageComponent();
$obj->printOutput();
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Kode di atas menunjukkan cara mengimplementasikan interface <code>Printable</code> dalam class <code>ImageComponent</code> menggunakan kata kunci <code>implements</code>. Interface mendefinisikan method <code>printOutput()</code> yang wajib diimplementasikan oleh class mana pun yang menggunakannya. Dalam class <code>ImageComponent</code>, method tersebut diisi dengan perintah <code>echo "Mencetak gambar..."</code>. Ketika objek dari class ini dibuat dan method <code>printOutput()</code> dipanggil, maka akan ditampilkan teks <em>"Mencetak gambar..."</em>. Ini mencerminkan prinsip dasar OOP, yaitu kontrak melalui interface untuk menjamin konsistensi implementasi.
   </p>
@endsection
