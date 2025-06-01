@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Manusia {
    public $nama;
    public $umur;
}

$orang = new Manusia();
$orang->nama = "Budi";
$orang->umur = 25;

$propertyObject = get_object_vars($orang);
print_r($propertyObject);
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Fungsi <code>get_object_vars()</code> digunakan untuk mengambil semua properti yang dapat diakses secara publik dari sebuah object. Hasilnya akan dikembalikan dalam bentuk array asosiatif yang berisi nama dan nilai dari masing-masing properti.
</p> 

@endsection
