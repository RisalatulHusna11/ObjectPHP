@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Translate {
    const INDONESIA = 0;
    const KOREA = 1;
    const JEPANG = 2;
    const MALAYSIA = 3;

    public static function lookup() {
        echo self::KOREA;
    }
}

Translate::lookup();</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Pada contoh di atas, kita mendeklarasikan beberapa konstanta dalam class <code>Translate</code> dan menggunakan <code>self::KOREA</code> di dalam method statis <code>lookup</code> untuk menampilkan nilai konstanta <code>KOREA</code>. Konstanta ini diakses langsung tanpa perlu membuat object terlebih dahulu.
   </p>
@endsection
