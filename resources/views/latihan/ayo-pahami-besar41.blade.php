@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Mobil {
    public $warna = "Merah";
    private $kecepatan = 100;
}

$properties = get_class_vars("Mobil");
print_r($properties); 
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Fungsi <code>get_class_vars()</code> digunakan untuk mengambil semua property yang memiliki visibilitas <code>public</code> dari sebuah class beserta nilai default-nya. Pada contoh di atas, class <code>Mobil</code> memiliki dua properti: <code>warna</code> (public) dan <code>kecepatan</code> (private). Hanya <code>warna</code> yang dimasukkan ke dalam array hasil karena <code>kecepatan</code> tidak bisa diakses dari luar class. <strong>Catatan:</strong> <code>get_class_vars()</code> hanya mengembalikan property yang memiliki nilai default dan dapat diakses dalam scope saat ini. Property yang belum diinisialisasi atau bersifat private tidak akan muncul.
</p> 

@endsection
