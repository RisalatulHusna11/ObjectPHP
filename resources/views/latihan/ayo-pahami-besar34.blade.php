@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Bangunan {
    function __destruct() {
        echo "Sebuah bangunan sedang dihancurkan!";
    }
}

// Membuat object
$rumah = new Bangunan();

// Saat script selesai atau object dihapus, destructor akan dipanggil otomatis.
unset($rumah);
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  <code>Class Bangunan</code> memiliki method khusus <code>__destruct()</code> yang akan dipanggil secara otomatis saat object <code>$rumah</code> dihancurkan, baik karena script selesai dieksekusi atau menggunakan <code>unset()</code>. Method ini berguna untuk menjalankan proses akhir seperti menutup koneksi atau menampilkan pesan. Dalam contoh ini, pemanggilan <code>unset($rumah)</code> secara eksplisit menghapus object, sehingga muncul pesan dari destructor.
</p> 

@endsection
