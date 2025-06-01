@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Hewan {}
class Kucing extends Hewan {}

$kucing = new Kucing();

echo "Class induknya adalah: " . get_parent_class($kucing);
</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Fungsi <code>get_parent_class()</code> digunakan untuk mengetahui class induk dari suatu object atau nama class. Jika object tersebut tidak memiliki class induk, maka fungsi ini akan mengembalikan nilai <code>false</code>.
</p> 

@endsection
