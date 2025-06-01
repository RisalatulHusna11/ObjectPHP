@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pengguna {
    final public function hakAkses() {
        echo "Hak akses ini tidak bisa diubah oleh class turunan.&lt;br&gt;";
    }
}

class Admin extends Pengguna {
    // Jika mencoba menimpa method hakAkses(), akan muncul error
    /*
    public function hakAkses() {
        echo "Ini tidak boleh dilakukan.";
    }
    */
}

$admin1 = new Admin();
$admin1->hakAkses();
?&gt;</code></pre>
     </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  <code>Final public function hakAkses()</code> dalam class <code>Pengguna</code> tidak bisa ditimpa oleh class <code>Admin</code>. Jika mencoba menulis ulang method <code>hakAkses()</code> di <code>Admin</code>, PHP akan memberikan error.
   </p>
@endsection
