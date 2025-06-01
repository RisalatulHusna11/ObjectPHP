@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Kendaraan {}

$mobil = new Kendaraan();
echo "Object ini berasal dari class: " . get_class($mobil);
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Fungsi <code>get_class()</code> digunakan untuk mengetahui nama class dari sebuah object. Dalam contoh ini, object <code>$mobil</code> dibuat dari class <code>Kendaraan</code>, sehingga <code>get_class($mobil)</code> akan menghasilkan string <code>"Kendaraan"</code>.
</p> 

@endsection
