@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
define('NAMA_PERUSAHAAN', 'PT. Teknologi Maju');

// Mengakses konstanta global
echo NAMA_PERUSAHAAN;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Pada contoh ini, kita mendefinisikan konstanta <code>NAMA_PERUSAHAAN</code> menggunakan <code>define()</code> dan mengaksesnya tanpa perlu menggunakan class atau object.
   </p>
@endsection
