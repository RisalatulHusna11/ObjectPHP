@extends('layout.mainLandingPage')

@section('container')

   <section id="home" class="grid-container1">
        <div class="textBox" >
            <h2>Welcome to ObjectPHP</h2>
            <h5> Media ini dirancang untuk membantu pengguna dalam memahami prinsip-prinsip dasar Object-Oriented Programming (OOP) menggunakan PHP. Materi yang disajikan mencakup pengenalan konsep OOP, cara mendeklarasikan class, hingga pembahasan topik lanjutan seperti anonymous classes, introspection, dan serialization. Media ini sesuai bagi siapa pun yang ingin memperkuat dasar-dasar OOP serta mengembangkan keterampilan pemrograman berorientasi objek melalui pendekatan yang sistematis dan mudah dipahami.
</h5>
            <a class="btn btn-success" href="./b00-peta"><< Mulai Belajar</a>
            <a class="btn btn-success" href="./login">Masuk ke ObjectPHP >></a>
        </div>
        <div class="gambar">
            <img class="scrool" src="images/gambar.png" alt="Gambar Awal">
        </div>
    </section>

    <section id="features" class="fitur">
        <div class="textBox2">
            <h2>Fitur yang Tersedia</h2>
        </div> 
        <div class="kontainer">
            <div class="card">
                <div class="face face1">
                    <div class="kontenn">
                    <img class="scrool" src="images/04.png" alt="Gambar_Materi">
                    <h3>Materi</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="kontenn">
                        <p class="paragraf-muncul">Bagian ini menyediakan semua materi pembelajaran yang dibutuhkan. Kamu dapat mengakses berbagai topik secara mendetail yang disusun secara sistematis untuk memudahkan pemahaman</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="face face1">
                    <div class="kontenn">
                    <img class="scrool" src="images/05.png" alt="Gambar_Materi">
                    <h3>Latihan</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="kontenn">
                        <p class="paragraf-muncul">Di sini kamu bisa menemukan berbagai latihan untuk mengasah pemahamanmu terhadap materi yang telah dipelajari. Latihan-latihan ini dirancang untuk meningkatkan keterampilan dan memastikan kamu siap menghadapi soal-soal lebih lanjut</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="face face1">
                    <div class="kontenn">
                    <img class="scrool" src="images/06.png" alt="Gambar_Materi">
                    <h3>Kuis</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="kontenn">
                        <p class="paragraf-muncul">Uji pengetahuanmu dengan berbagai kuis yang interaktif dan menantang. Kuis ini membantu mengevaluasi sejauh mana pemahamanmu terhadap materi yang telah dipelajari dengan cara yang menyenangkan</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="face face1">
                    <div class="kontenn">
                    <img class="scrool" src="images/07.png" alt="Gambar_Materi">
                    <h3>Evaluasi</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="kontenn">
                        <p class="paragraf-muncul">Bagian evaluasi menyediakan tes dan penilaian menyeluruh untuk mengukur kemajuan belajarmu. Hasil evaluasi ini memberikan umpan balik yang berguna untuk mengetahui area mana yang perlu ditingkatkan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="kontak">
        <div class="kontak-container">
            <h2>Hubungi Kami</h2>
            <p>Jangan ragu untuk menghubungi kami. Kami senang mendengar dari Anda!</p>

            <div class="kontak-info">
                <div class="kontak-item">
                    <a href="mailto:objectphp11@gmail.com">
                        <i class="bi bi-envelope-fill"></i>
                        <p>Email: objectphp11@gmail.com</p>
                    </a>
                </div>
                <div class="kontak-item">
                    <a href="https://wa.me/082154073215" target="_blank">
                        <i class="bi bi-whatsapp"></i>
                        <p>WhatsApp: ObjectPHP</p>
                    </a>
                </div>
                <div class="kontak-item">
                    <a href="https://t.me/ObjectPHP" target="_blank">
                        <i class="bi bi-telegram"></i>
                        <p>Telegram: ObjectPHP</p>
                    </a>
                </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection