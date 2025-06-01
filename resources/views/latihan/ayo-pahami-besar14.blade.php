@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class Orang {
    protected const KONSTANTA_PROTECTED = false;
    public const USERNAME_DEFAULT = "&lt;unknown&gt;";
    private const KODE_INTERNAL = "ABC1234";
}

// Mengakses konstanta publik
echo Orang::USERNAME_DEFAULT; 

// Akses konstanta protected atau private akan menghasilkan error
// echo Orang::KONSTANTA_PROTECTED; // Error</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Pada contoh ini, konstanta <code>USERNAME_DEFAULT</code> dapat diakses dari luar class karena dideklarasikan sebagai <code>public</code>, sedangkan <code>KONSTANTA_PROTECTED</code> hanya bisa diakses di dalam class atau class yang mewarisinya. <code>KODE_INTERNAL</code> hanya bisa diakses di dalam class yang mendeklarasikannya.
   </p>
@endsection
