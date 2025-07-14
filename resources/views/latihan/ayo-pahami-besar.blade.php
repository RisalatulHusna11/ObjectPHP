@extends('layout.mainMateriA')

@section('kode')
        <div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Pengguna {
  public $nama, $password;

  function simpanPengguna() {
    echo "Data pengguna telah disimpan.";
  }
} 

$pengguna = new Pengguna;
print_r($pengguna);
echo "&lt;br&gt;";

$pengguna->nama = "Alice";
$pengguna->password = "secret123";
print_r($pengguna);
echo "&lt;br&gt;";

$pengguna->simpanPengguna();</code></pre>
</div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <div class="mt-4">
    <label for="outputMahasiswa" class="form-label">Masukkan output yang kamu lihat dari program di atas:</label>
    <textarea id="outputMahasiswa" class="form-control" rows="4" placeholder="Tulis output di sini..."></textarea>

    <button onclick="cekOutputAyoPahami()" class="btn-next">Periksa Output</button>

    <div id="feedbackAyoPahami" class="mt-3"></div>
  </div> 

<script src="/js/ayo-pahami1.js"></script>
@endsection