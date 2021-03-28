@extends('layouts.app')

@section('custom-style')
<link href="{{asset('css/Landing_Page.css')}}" rel="stylesheet">
<link href="{{asset('css/landing-page.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Section TOP -->

<section class="top mb-md-3 ml-md-0 ml-4 ml-sm-2">
    <div class="row ml-md-5 ml-3" style="max-width: 70%; height: auto">
        <div class="col-md-1 d-none d-md-block">

        </div>
        <div class="col-md-6 col-12 d-flex d-sm-block d-md-block justify-content-center align-self-center h1" data-aos="zoom-in-right">
            <div id="title" class="col-12 col-md landing-page__selamat">Selamat Datang</div><br>
            <p class="pharagraph-top col-12 col-md landing-page__karena" style="font-size: 22px;text-align:justify"><b>Karena berhimpun menjadi cara terampuh untuk menghapus batas potensi, merajut prestasi dan membentang bakti kepada negeri.</b></p>
        </div>

        <!-- <div class="col-md-6 col-12 mt-5 d-sm-inline-flex justify-content-center"> -->
        <div class="col-md-5 col-12 mt-3 d-md-flex d-md-block justify-content-center align-self-center landing-page__gambar-alfa-reza">
            <!-- home/assets/image/Landing_Page/ -->
            {{-- <img id="img-top" src="landing/home/assets/image/Landing_Page/alfa-reza.svg" style="top: -20em;"> --}}
            <img id="img-top" src="{{asset('images/Landing_Page/alfa-reza.svg')}}" style="top: -20em;">
        </div>
    </div>
    <div class="row ml-md-5 ml-3 d-none d-md-block socmed-row" style="height: 10px">
        <div class="col">
            <div class="socmed-rows">
                <div class="row mt-md-3 mb-md-1">
                    <img id="Text-Socmed" src="{{asset('images/Landing_Page/Text-Socmed.svg')}}">
                </div>
                <div class="row my-md-3">
                    <img id="img-Twitter" src="{{asset('images/Landing_Page/Img-Twitter.svg')}}">
                </div>
                <div class="row my-md-3">
                    <img id="img-Insta" src="{{asset('images/Landing_Page/Img-Insta.svg')}}">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section TOP END -->

<!-- Section MID -->
<div class="container-fluid">
    <section class="mid">
        <!-- KBMTI-FULL -->
        <div class="row d-md-flex justify-content-end d-md-block d-none" data-aos="fade-left">
            <img id="text-KBMTI-Full" src="{{asset('images/Landing_Page/Text-KBMTI-Full.svg')}}" alt="">
        </div>
        <!-- Embeds Video -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 col-12">
                    <div class="embed-responsive embed-responsive-16by9">
                        <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" style="z-index: -1;" allowfullscreen></iframe> -->
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/Jy9KfuwmdH4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-5 col-12 pb-sm-3 pb-md-2 phar">
                    <div class="row">
                        <div class="pharagraphs">
                            <p style="font-size: 20px;text-align:justify"><b>Kita akan bergerak tanpa batas untuk terus mengabdi, memberdayakan setiap energi keluarga besar ini. Hingga akhirnya, kita tumbuh tinggi dan saling menginspirasi. Bersama, mari meng #eksplorasi karya kita dari dini. Dari kami, gelombang kecil perubahan teknologi informasi.</b></p>
                        </div>
                    </div>
                    <div class="row mt-md-3 mt-0">
                        <a href="https://www.youtube.com/watch?v=Yi-C9okDw3A">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- KBMTI Transparent -->
        <div class="row d-md-flex justify-content-start d-md-block d-none" data-aos="fade-right">
            <img id="text-KBMTI-Tranparent" src="{{asset('Landing_Page/Text-KBMTI-Transparent.svg')}}" alt="">
        </div>
    </section>
</div>

<div class="container">
    <div class="lp__berita-title" data-aos="fade-right">Berita.</div>
</div>
<section id="carouselBerita">
    <div id="beritaCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#beritaCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#beritaCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner lp__berita-inner">
            <div class="carousel-item active">
                <div class="row lp__berita-row no-gutters">
                    <div class="col-md-6">
                        <div class="lp__berita-text">
                            <div class="lp__berita-selengkapnya">Selengkapnya.</div>
                            <div class="lp__berita-date">28.08</div>
                            <div class="lp__berita-heading">Mekanisme Pengambilan Sertifikat</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('images/misc/news/sertiftiefl_01.jpg')}}" alt="" srcset="" class="lp__berita-img">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row lp__berita-row no-gutters">
                    <div class="col-md-6">
                        <div class="lp__berita-text">
                            <div class="lp__berita-selengkapnya">Selengkapnya.</div>
                            <div class="lp__berita-date">28.08</div>
                            <div class="lp__berita-heading">Formulir Pengajuan UKT Ulang</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('images/misc/news/reupload-ukt_01.jpg')}}" alt="" srcset="" class="lp__berita-img">
                    </div>
                </div>

            </div>
        </div>
        <a class="carousel-control-prev" href="#beritaCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#beritaCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<div class="container">
    <section id="timeline">
        <div class="row">
            <div class="col-6">
                <ul class="timeline">
                    <li>
                        <div class="title">CPW x OSI :
                            <br>Career Inspiration Talks
                        </div>
                        <div class="tanggal">11 Oktober 2020</div>
                    </li>
                    <li>
                        <div class="title">FEEL - IT : A New Journey
                        </div>
                        <div class="tanggal">3 Oktober 2020</div>
                    </li>

                </ul>
            </div>
            <div class="col-6" data-aos="zoom-in">
                <img src="{{asset('images/Landing_Page/what_working.svg')}}" style="height:290px" class="timeline-img">
            </div>
        </div>

    </section>
</div>

<div class="container">
    <div class="lp__berita-title" data-aos="fade-right">Budaya Kerja.</div>
    <div class="row site-section ">
        <div class="col-lg-7 pr-lg-5 mt-5 order-2">
            <img src="{{asset('images/Landing_Page/growth.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-lg-5 order-1 order-lg-2 aos-init aos-animate" data-aos="fade-right">
            <img src="{{asset('images/Landing_Page/1.svg')}}" alt="Image" class="img-fluid float-right" style="width:7em">
        </div>

    </div>

    <div class="row site-section ">
        <div class="col-lg-5 order-1 order-lg-2 aos-init aos-animate" data-aos="fade-left">
            <img src="{{asset('images/Landing_Page/2.svg')}}" alt="Image" class="img-fluid" style="width:7em">
        </div>
        <div class="col-lg-7 pr-lg-5 mr-auto mt-5 order-2">
            <img src="{{asset('images/Landing_Page/xcelerate.svg')}}" alt="Image" class="img-fluid">
        </div>
    </div>

    <div class="row site-section ">
        <div class="col-lg-7 pr-lg-5 mr-auto mt-5 order-2">
            <img src="{{asset('images/Landing_Page/sharing.svg')}}"" alt=" Image" class="img-fluid">
        </div>
        <div class="col-lg-5 order-1 order-lg-2 aos-init aos-animate" data-aos="fade-right">
            <img src="{{asset('images/Landing_Page/3.svg')}}" alt="Image" class="img-fluid float-right" style="width:7em">
        </div>

    </div>

    <div class="row site-section ">
        <div class="col-lg-5 order-1 order-lg-2 aos-init aos-animate" data-aos="fade-left">
            <img src="{{asset('images/Landing_Page/4.svg')}}" alt="Image" class="img-fluid" style="width:7em">
        </div>
        <div class="col-lg-7 pr-lg-5 mt-5 order-2">
            <img src="{{asset('images/Landing_Page/4r.svg')}}" alt="Image" class="img-fluid">
        </div>
    </div>


</div>
@endsection

@section('custom-script')
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    function openCity(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";
    }
</script>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments)
    }
    gtag('js', new Date());
    gtag('config', 'UA-140729121-1');
</script>
{{-- <script src="home/assets/show-on-scroll.js"></script> --}}
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var y = document.getElementsByClassName("mySlides2")
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        if (n > y.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = y.length
        }
        for (i = 0; i < y.length; i++) {
            y[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex - 1].style.display = "block";
        y[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-white";
    }
</script>

<!-- For TOP -->
<script>
    // Function to Add and remove class
    (function($) {
        var $window = $(window),
            $title = $('#title');

        function resize() {
            if ($window.width() < 598) {
                return $title.addClass('text-nowrap');
            }

            $title.removeClass('text-nowrap');
        }

        $window
            .resize(resize)
            .trigger('resize');
    })(jQuery);
</script>
@endsection
