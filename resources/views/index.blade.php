@extends('template.index')
@section("title", "Jose")
@section('content')

<!-- Header -->
<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-5">
                <div class="text-container">
                    <h1 class="h1-large">My Pet, My Family</h1>
                    <p class="p-large">Berikan perawatan terbaik untuk hewan peliharaan Anda bersama kami. Memberikan pelayanan yang profesional dan berkualitas tinggi.</p>
                    <a class="btn-solid-reg" href="/user/consultation-index">Konsultasi</a>
                    <a class="btn-solid-reg" href="/user/reservation-index">Reservasi</a>
                </div>
            </div>
            <div class="col-lg-6 col-xl-7">
                <div class="image-container">
                    <img class="img-fluid" src="{{asset('bootstrap/images/header-ilustration.png')}}" alt="alternative">
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end of header -->


<!-- Consultation -->
<div id="consultation" class="consultation bg-gray py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-7">
                <div class="image-container">
                    <img class="img-fluid" src="{{asset('bootstrap/images/consultation-ilustration.jpg')}}" alt="alternative">
                </div>
            </div>
            <div class="col-lg-6 col-xl-5">
                <div class="text-container">
                    <h2><span>Konsultasi dengan dokter hewan</span><br> sekarang bisa dari rumah</h2>
                    <p>Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis. Integer id quam id tellus hendrerit laciniad binfer</p>
                    <!-- <p>Sed id dui rutrum, dictum urna eu, accumsan turpis. Fusce id auctor velit, sed viverra dui rem dina</p> -->
                    <a class="btn-solid-reg" href="/user/consultation-index">Chat dokter</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of consultation -->


<!-- Article -->
<div id="projects" class="filter py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-heading">Artikel Kesehatan</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="grid">

                    @foreach ($data_article as $dta)
                    <div class="element-item {{$dta->category_article->name}}">
                        <a href="/user/article-detail/{{$dta->id}}">
                            <img class="img-fluid" src="{{$dta->image_url}}" alt="alternative">

                        </a>
                    </div>
                    @endforeach

                </div>

                <a class="btn-solid-reg" href="/user/article-index">Lebih banyak</a>

            </div>
        </div>
    </div>
</div>
<!-- end of article -->


<!-- Invitation -->
<div class="reservation bg-blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-container">
                    <h3>Anda perlu datang ke klinik? Buat janji sekarang!</h3>
                    <p class="p-large">Layanan reservasi kunjungan klinik memberikan kemudahan kepada Anda dan hewan peliharaan Anda. Hanya dengan beberapa kali klik, Anda dapat memesan jadwal kunjungan klinik sesuai kebutuhan Anda.</p>
                    <a class="btn-outline-lg mt-5" href="reservation.html">Reservasi sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of invitation -->


<!-- Questions -->
<div id="questions" class="questions">
    <div class="container">
        <div class="row">

            <div class="col-lg-5">
                <div class="accordion" id="accordionExample">

                    <!-- Accordion 1 -->
                    <div class="accordion-item">
                        <div class="accordion-icon">
                            <span class="fas fa-solid fa-paw"></span>
                        </div>
                        <div class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Apa itu layanan konsultasi online?
                            </button>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">Layanan konsultasi online memungkinkan Anda berkonsultasi dengan dokter hewan untuk mendapatkan saran tentang kesehatan hewan secara online. Perlu diketahui bahwa layanan konsultasi online hanya tersedia untuk tujuan konsultasi dan informasi umum. Untuk keadaan darurat, Anda dapat membawa hewan peliharaan Anda ke klinik kami.</div>
                        </div>
                    </div>
                    <!-- end of accordion 1 -->

                    <!-- Accordion 2 -->
                    <div class="accordion-item">
                        <div class="accordion-icon">
                            <span class="fas fa-solid fa-paw"></span>
                        </div>
                        <div class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Bagaimana melakukan konsultasi online?
                            </button>
                        </div>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">Anda dapat menggunakan layanan konsultasi online kapan pun yang nda mau. Pilih dokter hewan yang kamu inginkan, selesaikan pembayaran, dan kami akan menghubungi Anda segera untuk melakukan konsultasi melalui aplikasi Whatsapp.</div>
                        </div>
                    </div>
                    <!-- end of accordion 2 -->

                    <!-- Accordion 3 -->
                    <div class="accordion-item">
                        <div class="accordion-icon">
                            <span class="fas fa-solid fa-paw"></span>
                        </div>
                        <div class="accordion-header" id="headingFour">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Jenis hewan apa saja yang bisa diobati?
                            </button>
                        </div>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">Jose dapat merawat berbagai jenis hewan peliharaan seperti anjing, kucing, kelinci, hamster, dan reptil.</div>
                        </div>
                    </div>
                    <!-- end of accordion  -->

                    <!-- Accordion 4 -->
                    <div class="accordion-item">
                        <div class="accordion-icon">
                            <span class="fas fa-solid fa-paw"></span>
                        </div>
                        <div class="accordion-header" id="headingFour">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Berapa biaya layanan konsultasi online?
                            </button>
                        </div>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">Untuk layanan konsultasi online dikenakan biaya sebesar Rp50.000,- setiap sesinya.</div>
                        </div>
                    </div>
                    <!-- end of accordion 4 -->

                </div>
            </div>

            <div class="col-lg-7">
                <div class="image-container">
                    <img class="img-fluid" src="{{asset('bootstrap/images/questions-image.png')}}" alt=alternative>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end of questions -->


@endsection