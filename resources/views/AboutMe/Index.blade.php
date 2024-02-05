@extends('layouts.layoutAboutMe')

@section('title', 'Beranda')

@section('content')

<style>
    /* Gaya CSS untuk garis pemisah */
    .section-divider {
        width: 100%;
        border-top: 2px solid #0059AB;
        margin: 20px 0;
    }
</style>

<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets1/css/style.css') }}" rel="stylesheet">


<section id="carousel-section">
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" style="margin-top: 70px;">
    <div class="carousel-inner" role="listbox">
        <div class='carousel-item active'>
            <img class='d-block w-100' src="{{ asset('Images/MiSelf.jpg') }}" alt="First slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<br/>
<br/>

<div class="row">
    <div class="col-lg-4" style="text-align: center; padding: 20px 0px;">
        <img src="{{ asset('Images/IMG_LogoTransformationInHarmony.png') }}" class="wow fadeInUp fast" style="width: 60%;" />
    </div>
    <div class="col-lg-4" style="text-align: center; padding: 20px 0px;">
        <img src="{{ asset('Images/IMG_LogoKampusMerdeka.png') }}" class="wow fadeInUp fast" style="width: 30%;" />
    </div>
    <div class="col-lg-4" style="text-align: center; padding: 20px 0px;">
        <img src="{{ asset('Images/IMG_LogoSatuIndonesia.png') }}" class="wow fadeInUp fast" style="width: 40%;" />
    </div>
</div>
</section>


<hr class="section-divider">
<section id="doctors" class="doctors">
    <div class="container">
        <div class="section-title">
            <h2>Konselor Politeknik Astra</h2>
        </div>

        <div class="row">
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('assets/img/doctors/doctors-1.jpg') }}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Raissa Maharani</h4>
                        <span>S1 Psikologi</span>
                        <p>Staff Departement Kemahasiswaan dan Alumni</p>
                        <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('assets/img/doctors/doctors-2.jpg') }}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Alvin Rizki Sitompul</h4>
                        <span>S1 Psikologi</span>
                        <p>Staff Departement Kemahasiswaan dan Alumni</p>
                        <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0" style="margin: auto; display: flex; justify-content: center; align-items: center;">
                <div class="member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('assets/img/doctors/doctors-3.jpg') }}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Winda Isnaeni Khasanah</h4>
                        <span>S1 Psikologi</span>
                        <p>Staff Departement Kemahasiswaan dan Alumni</p>
                        <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<hr class="section-divider">
<section id="our-values" class="our-values">
    <div class="container">
        <div class="section-title">
            <h2>Artikel Kesehatan Mental</h2>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card" style='background-image: url("assets1/img/Artikel3.jpg");'>
                    <div class="card-body">
                        <h5 class="card-title"><a href="https://www.alodokter.com/cara-meningkatkan-motivasi-untuk-diri-sendiri">Cara Meningkatkan Motivasi untuk Diri Sendiri</a></h5>
                        <p class="card-text">Terkadang, kita bisa kehilangan tujuan dan motivasi dalam hidup sehingga merasa tidak bersemangat dalam menjalani keseharian. 
                            Agar bisa kembali bersemangat, kamu perlu tahu cara untuk menemukan dan membangun motivasi untuk diri sendiri.</p>
                        <div class="read-more"><a href="https://www.alodokter.com/cara-meningkatkan-motivasi-untuk-diri-sendiri"><i class="bi bi-arrow-right"></i> Read More</a></div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                <div class="card" style='background-image: url("assets1/img/Artikel4.jpg");'>
                    <div class="card-body">
                        <h5 class="card-title"><a href="https://www.verywellmind.com/when-is-the-best-time-to-meditate-5705815">When Is the Best Time to Meditate?</a></h5>
                        <p class="card-text">Meditation is a practice that can help you relax and cope better with stress. It can also have a wide range of other health benefits. 
                            Even if you've enjoyed the practice in the past, finding the time to incorporate regular meditation into your life isn't always easy.</p>
                        <div class="read-more"><a href="https://www.verywellmind.com/when-is-the-best-time-to-meditate-5705815"><i class="bi bi-arrow-right"></i> Read More</a></div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 d-flex align-items-stretch mt-4">
                <div class="card" style='background-image: url("assets1/img/Artikel1.jpg");'>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="https://www.kompasiana.com/afiesruditsetyono0962/659f8eff12d50f2d085ec222/perlukah-kita-keluar-dari-zona-nyaman">
                                Perlukah Kita Keluar dari Zona Nyaman
                            </a>
                        </h5>
                        <p class="card-text">
                            Tentunya kita semua pernah merasa stres karena aktivitas rutin setiap hari atau merasa bosan dan jenuh dengan kegiatan atau 
                            aktivitas yang berulang-ulang sama (over and over again) ?
                        </p>
                        <div class="read-more"><a href="https://www.kompasiana.com/afiesruditsetyono0962/659f8eff12d50f2d085ec222/perlukah-kita-keluar-dari-zona-nyaman"><i class="bi bi-arrow-right" ></i> Read More</a></div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 d-flex align-items-stretch mt-4">
                <div class="card" style='background-image: url("assets1/img/Artikel2.jpg");'>
                    <div class="card-body">
                        <h5 class="card-title"><a href="https://www.faqtoids.com/health/protect-your-mental-health-social-media?utm_content=params%3Aad%3DdirN%26qo%3DserpIndex%26o%3D740006%26ag%3Dfw&ueid=8E7388B5-4AEB-415C-87B8-4C777AC91B28">How to Protect Your Mental Health on Social Media</a></h5>
                        <p class="card-text">If social media is affecting your real life, there are simple things you can do to keep yourself sane. 
                            Here's a round-up of ways to protect your mental health while using social media.</p>
                        <div class="read-more"><a href="https://www.faqtoids.com/health/protect-your-mental-health-social-media?utm_content=params%3Aad%3DdirN%26qo%3DserpIndex%26o%3D740006%26ag%3Dfw&ueid=8E7388B5-4AEB-415C-87B8-4C777AC91B28"><i class="bi bi-arrow-right"></i> Read More</a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    $(document).ready(function () {
        new WOW().init();
    });

    $(window).on("load", function () {
        setTimeout(function () {
            $("[id^='card-']").each(function (index) {
                shrinkCard($(this).attr('id'));
            })
        }, 50);
    });

    function expandCard(param) {
        $('#' + param).parent().css('height', $('#' + param + ' .back').css('height'));
    }

    function shrinkCard(param) {
        $('#' + param).parent().css('height', $('#' + param + ' .front').css('height'));
    }

    function showDeskripsi(param1, param2) {
        $('#literalJenisSeleksi').html(param1);
        $('#literalDeskripsi').html(param2);
        $('#deskripsiModal').modal();
    }
</script>
@endpush
