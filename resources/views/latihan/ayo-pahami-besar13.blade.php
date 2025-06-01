@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class MetodePembayaran {
    public const TIPE_KARTUKREDIT = 0; // Konstanta untuk kartu kredit
    public const TIPE_TUNAI = 1;      // Konstanta untuk pembayaran tunai
}

// Mengakses konstanta dari luar class
echo MetodePembayaran::TIPE_KARTUKREDIT;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Pada contoh di atas, kita mendeklarasikan dua konstanta dalam class <code>MetodePembayaran</code> yang dapat diakses secara langsung menggunakan tanda <code>::</code>. Nilai konstanta ini tidak dapat diubah setelah didefinisikan.
   </p>
@endsection
