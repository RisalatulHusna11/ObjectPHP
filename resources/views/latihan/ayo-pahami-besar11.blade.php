@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pengguna {}

$pengguna1 = new Pengguna();
$pengguna1->nama = "Alice"; // Properti dideklarasikan secara implisit
echo $pengguna1->nama;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Pada contoh ini, kita langsung menetapkan properti <code>nama</code> di luar class <code>Pengguna</code>. Meskipun kode ini berfungsi, mendeklarasikan properti secara implisit bisa menyebabkan masalah jika ada kesalahan penulisan atau kebingungannya.
  </p>
@endsection
