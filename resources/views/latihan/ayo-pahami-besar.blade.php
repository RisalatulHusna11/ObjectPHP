@extends('layout.mainMateriA')

@section('kode')
        <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pengguna {
  public $nama, $password;

  function simpanPengguna() {
    echo "Data pengguna telah disimpan.";
  }
}

$pengguna = new Pengguna;
print_r($pengguna);
echo "&lt;br&gt;";

$pengguna->nama = "Alice";
$pengguna->password = "secret123";
print_r($pengguna);
echo "&lt;br&gt;";

$pengguna->simpanPengguna();</code></pre>
</div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Dari contoh di atas, kita bisa melihat bagaimana property dari sebuah object dapat diakses dan diubah, serta bagaimana method dalam class dijalankan untuk menampilkan suatu proses. Fungsi <code>print_r()</code> membantu menampilkan isi object dan memudahkan proses debugging.
</p> 

@endsection