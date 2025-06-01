@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pengguna {
    private $data = [];

    // Method magis __get untuk mengambil nilai properti
    public function __get($property) {
        if ($property === 'biografi') {
            return "Biografi panjang..."; // Mengambil data dari database
        }
    }

    // Method magis __set untuk menetapkan nilai properti
    public function __set($property, $value) {
        if ($property === 'biografi') {
            $this->data['biografi'] = $value; // Menyimpan data ke database
        }
    }
}

$pengguna = new Pengguna();
echo $pengguna->biografi; 
$pengguna->biografi = "Biografi baru"; // Menyimpan data baru</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Dalam contoh ini, kita menggunakan method magis <code>__get()</code> dan <code>__set()</code> untuk mengelola akses ke properti <code>biografi</code>, yang tidak dideklarasikan sebelumnya. Ini memungkinkan kita untuk menangani data secara dinamis, seperti menarik dan menyimpan informasi dari sumber eksternal (misalnya database).
   </p>
@endsection
