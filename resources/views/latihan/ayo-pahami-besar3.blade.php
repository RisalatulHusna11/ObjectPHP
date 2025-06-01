@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class PembantuMatematika {
    static function kuadrat($angka) {
        return $angka * $angka;
    }

    static function kubus($angka) {
        return $angka * $angka * $angka;
    }
}

// Memanggil method statis tanpa membuat objek
echo PembantuMatematika::kuadrat(4); 
echo PembantuMatematika::kubus(3);</code></pre>
     </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Method <code>kuadrat()</code> dan <code>kubus()</code> dideklarasikan sebagai method statis dan dapat langsung dipanggil dengan <code>PembantuMatematika::kuadrat(4)</code> tanpa perlu membuat objek terlebih dahulu.
</p> 
@endsection
