@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
interface A {
    public function methodA();
}

interface B {
    public function methodB();
}

interface C extends A, B {
    public function methodC();
}

class MyClass implements C {
    public function methodA() {
        echo "Method A dipanggil";
    }
    
    public function methodB() {
        echo "Method B dipanggil";
    }
    
    public function methodC() {
        echo "Method C dipanggil";
    }
}

// Penggunaan
$obj = new MyClass();
$obj->methodA(); 
$obj->methodB(); 
$obj->methodC(); 
?&gt;</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>
  <p class="penjelasan">
  Kode ini menunjukkan bagaimana <strong>interface dapat saling diturunkan</strong> (inheritance antarmuka) dan kemudian diimplementasikan oleh sebuah class. Interface <code>C</code> mewarisi <code>A</code> dan <code>B</code>, sehingga interface <code>C</code> mewajibkan semua class yang mengimplementasikannya untuk menyediakan implementasi method <code>methodA()</code>, <code>methodB()</code>, dan <code>methodC()</code>. Class <code>MyClass</code> mengimplementasikan interface <code>C</code>, sehingga harus mendefinisikan ketiga method tersebut. Saat objek <code>$obj</code> dibuat dari <code>MyClass</code> dan masing-masing method dipanggil, akan ditampilkan output yang sesuai. Ini menegaskan bahwa PHP mendukung pewarisan interface ganda dan implementasi kontrak secara menyeluruh.
   </p>
@endsection
