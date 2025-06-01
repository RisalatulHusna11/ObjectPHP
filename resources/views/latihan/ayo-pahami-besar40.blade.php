@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pegawai {
    public function bekerja() {}
    private function istirahat() {}
}

$methods = get_class_methods("Pegawai");
print_r($methods); 
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Fungsi <code>get_class_methods()</code> digunakan untuk mengambil daftar method yang dapat diakses (hanya public) dari suatu class. Pada contoh di atas, class <code>Pegawai</code> memiliki dua method, yaitu <code>bekerja()</code> dan <code>istirahat()</code>. Namun karena <code>istirahat()</code> bersifat private, maka hanya <code>bekerja()</code> yang ditampilkan dalam hasil fungsi.
</p> 

@endsection
