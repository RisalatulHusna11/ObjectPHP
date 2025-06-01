@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Hewan {
    public $nama;

    final function getNama() {
        return $this->nama;
    }
}

class Anjing extends Hewan {
    function getNama() {
        return "Ini adalah anjing bernama " . $this->nama;
    }
}</code></pre>
     </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Dalam contoh ini, method <code>getNama()</code> di dalam class <code>Hewan</code> dideklarasikan sebagai <code>final</code>, sehingga class <code>Anjing</code> tidak diperbolehkan untuk menggantinya (override).
</p> 
@endsection
