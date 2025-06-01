@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
trait Perintah {
    public function jalankan() {
        echo "Menjalankan perintah.\n";
    }
}

trait Lari {
    public function jalankan() {
        echo "Berlari cepat.\n";
    }
}

class Manusia {
    use Perintah, Lari {
        Perintah::jalankan as jalankanPerintah;
        Lari::jalankan insteadof Perintah;
    }
}

$manusia = new Manusia();
$manusia->jalankan(); 
$manusia->jalankanPerintah(); 
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Kode di atas memperlihatkan cara menyelesaikan konflik <code>method</code> yang memiliki nama sama dalam dua <code>trait</code> di PHP, yaitu <code>Perintah</code> dan <code>Lari</code>, yang keduanya memiliki method <code>jalankan()</code>. Pada class <code>Manusia</code>, digunakan <code>use</code> dengan resolusi konflik melalui <code>insteadof</code> untuk menetapkan bahwa method <code>jalankan()</code> dari trait <code>Lari</code> yang akan digunakan, sementara method dari trait <code>Perintah</code> tetap dapat diakses dengan memberikan alias <code>jalankanPerintah</code> menggunakan kata kunci <code>as</code>. Akibatnya, pemanggilan <code>$manusia-&gt;jalankan()</code> akan menampilkan <em>"Berlari cepat."</em> dan <code>$manusia-&gt;jalankanPerintah()</code> akan menampilkan <em>"Menjalankan perintah."</em>.
   </p>
@endsection
