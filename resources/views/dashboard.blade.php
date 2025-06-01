@extends('layout.mainLandingPage')

@section('container')

   <section id="home" class="grid-container1">
  <div class="gambar">
    <img class="scrool" src="images/gambar.png" alt="Gambar Awal">
  </div>
  <div class="textBox">
    <h2>Welcome to NextPHP</h2>
    <h5> Media ini dirancang untuk membantu pengguna dalam memahami prinsip-prinsip dasar Object-Oriented Programming (OOP) menggunakan PHP. Materi yang disajikan mencakup pengenalan konsep OOP, cara mendeklarasikan class, hingga pembahasan topik lanjutan seperti anonymous classes, introspection, dan serialization. Media ini sesuai bagi siapa pun yang ingin memperkuat dasar-dasar OOP serta mengembangkan keterampilan pemrograman berorientasi objek melalui pendekatan yang sistematis dan mudah dipahami.</h5>
    <a class="btn btn-success" href="./login">Masuk ke NextPHP</a>
  </div>
</section>


@endsection