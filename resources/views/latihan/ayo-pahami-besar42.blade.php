@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Kendaraan {}
class Motor extends Kendaraan {}

echo get_parent_class("Motor"); 
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Fungsi <code>get_parent_class()</code> digunakan untuk mengetahui nama class induk dari suatu class turunan. Dalam contoh di atas, class <code>Motor</code> merupakan turunan dari <code>Kendaraan</code>, sehingga fungsi akan mengembalikan string <code>"Kendaraan"</code>. Fungsi ini sangat berguna dalam refleksi class atau debugging hubungan pewarisan dalam OOP.
</p> 

@endsection
